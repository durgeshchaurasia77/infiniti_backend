<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use Illuminate\Support\Facades\Validator;
use App\Models\OurServices;
use App\Models\GetEnquiryType;
use App\Models\FrroOptin;
use App\Models\FrroOptinDetails;
use App\Models\ReportConsultation;
use App\Models\PageBanner;
use Mail;
class OurServicesController extends Controller
{
    use MessageStatusTrait;
    protected $ourservices;
    protected $getenquerytypes;
    protected $frroOptin;
    protected $frroOptinDetails;
    protected $pageBanner;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
        OurServices              $ourservices,
        GetEnquiryType           $getenquerytypes,
        FrroOptin                $frroOptin,
        FrroOptinDetails         $frroOptinDetails,
        PageBanner               $pageBanner,


    ) {
        $this->ourservices       = $ourservices;
        $this->getenquerytypes   = $getenquerytypes;
        $this->frroOptin         = $frroOptin;
        $this->frroOptinDetails  = $frroOptinDetails;
        $this->pageBanner        = $pageBanner;
    }
    public function index()
    {
        $details['ourservicesdetails']   = $this->ourservices::select('id','title','description','image')->where('status',1)->get();
        $details['pageBanner']           = $this->pageBanner::select('image')->where('page_name','Our Services')->first();

        return view('website.services', $details);
    }
    public function details(Request $request,$id)
    {
        $ids = base64_decode($id);
        $details = [];
        $details['ourservicesdetails']   = $this->ourservices::select('title','description','summary')->where(['id' => $ids])->first();
        $details['getenquerytypes']      = $this->getenquerytypes::where(['status' => 1])->get();
        $details['pageBanner']           = $this->pageBanner::select('image')->where('page_name','Our Services')->first();

        return view('website.our_services_details', $details);
    }
    public function frroOptin(Request $request)
    {
        $details = [];
        $details['frroOptinData']        = $this->frroOptin->select('title','description','image')->first();
        $details['frroOptinDetails']     = $this->frroOptinDetails->select('titles')->get();
        $details['getenquerytypes']      = $this->getenquerytypes::where(['status' => 1])->get();
        $details['pageBanner']           = $this->pageBanner::select('image')->where('page_name','Our Services')->first();

        return view('website.frro_optin', $details);
    }
    public function reportsubmit(Request $request)
    {
        $rules = [
            'name' => [
                'required',
                'regex:/^[a-zA-Z\s]+$/',
                'min:2',
                'max:100',
            ],
            'phone' => [
                'required',
                'numeric',
                'digits:10',
            ],
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                'max:255',
            ],
            'question'=> 'required'
        ];

        $messages = [
            'name.required' => 'The Name field is required.',
            'name.regex'    => 'The Name must only contain letters and spaces.',
            'name.min'      => 'The Name must be at least 2 characters.',
            'name.max'      => 'The Name may not be greater than 50 characters.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => $this->errorStatus,
                'responseMessage' => $validator->messages()->first()
            ]);
        }
        try {
            // DB::beginTransaction();

            // Store the enquiry in the database
            $helpRequest         =  ReportConsultation::create([
                'name'           => $request->name ?? '',
                'email'          => $request->email ?? '',
                'phone'          => $request->phone ?? '',
                'question'       => $request->question?? '',
            ]);
            $mailArray = [
                'name'          => $request->name ?? '',
                'email'         => $request->email ?? '',
                'contact'       => $request->phone ?? '',
                'question'      => $request->question ?? 'None'
            ];
            $adminEmail = 'durgesh.alobha@gmail.com';
            $subject    = 'Request For Report & Consultation ';

            // Send email to admin with all details
            \Mail::send('mail.enquery.admin_template', ['mailArray' => $mailArray], function ($message) use ($adminEmail, $subject) {
                $message->from('globalstudentsservices@gmail.com', 'Infiniti');
                $message->subject($subject);
                $message->to($adminEmail);
            });

            // Send thank-you email to the user
            \Mail::send('mail.enquery.thankyou-email', ['mailArray' => $mailArray], function ($message) use ($request) {
                $message->from('globalstudentsservices@gmail.com', 'Infiniti');
                $message->subject('Thank You for Your Enquiry');
                $message->to($request->email);
            });

            // DB::commit();

            return response()->json([
                'responseCode'    => $this->successStatus,
                'responseMessage' => 'Thank you! Your details have been submitted successfully. We will connect with you soon.',
            ]);
        } catch (\Exception $e) {
            // DB::rollBack();
            return response()->json([
                'responseCode'    => $this->failedStatus,
                'responseMessage' => 'Something went wrong. Please try again later.',
            ]);
        }
    }
}
