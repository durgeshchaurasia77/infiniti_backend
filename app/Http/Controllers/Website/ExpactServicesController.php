<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use App\Models\ExpactServices;
use App\Models\ExpactServicesDetails;
use App\Models\GetEnquiryType;
use App\Models\Testimonials;
use App\Models\ExpactEnquery;
use App\Models\Setting;
use App\Models\PageBanner;
use Illuminate\Support\Facades\Validator;
class ExpactServicesController extends Controller
{
    use MessageStatusTrait;
    protected $expcatServices;
    protected $expcatServicesDetails;
    protected $getenquerytypes;
    protected $testimonials;
    protected $pageBanner;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
        ExpactServices        $expcatServices,
        ExpactServicesDetails $expcatServicesDetails,
        GetEnquiryType        $getenquerytypes,
        Testimonials          $testimonials,
        PageBanner            $pageBanner,

    ) {
        $this->expcatServices        = $expcatServices;
        $this->expcatServicesDetails = $expcatServicesDetails;
        $this->getenquerytypes       = $getenquerytypes;
        $this->testimonials          = $testimonials;
        $this->pageBanner            = $pageBanner;
    }
    public function index(Request $request,$slug = null)
    {
        $expcatServices = [];
        $expcatServices    = $this->expcatServices::where('slug',$slug)->first();
        $getenquerytypes   = $this->getenquerytypes::where(['status' => 1])->get();
        // $expcatServices    = $this->expcatServicesDetails::where('id',$expcatServices)->get()
        $testimonials      = $this->testimonials::where(['status' => 1])->get();
        $settingfooter     = Setting::select('phone')->first();
        $pageBanner        = $this->pageBanner::select('image')->where('page_name','Expact Services')->first();

        return view('website.expact_services')->with([
                                                                    'expcatServices'  => $expcatServices,
                                                                    'getenquerytypes' => $getenquerytypes,
                                                                    'testimonials'    => $testimonials,
                                                                    'settingfooter'   => $settingfooter,
                                                                    'pageBanner'      => $pageBanner,
                                                                ]);
    }
    public function expactsubmit(Request $request)
    {
        $rules = [
            'name' => [
                'required',
                'regex:/^[a-zA-Z\s]+$/',
                'min:2',
                'max:100',
            ],
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                'max:255',
            ],
            'phone' => [
                'required',
                'numeric',
                'digits:10',
            ],
            'expact_type'=> 'required'
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
            $helpRequest         =  ExpactEnquery::create([
                'name'           => $request->name ?? '',
                'email'          => $request->email ?? '',
                'phone'          => $request->phone ?? '',
                'expact_type'    => $request->expact_type?? '',
            ]);
            $getenquerytypesData = $this->expcatServices::select('title')->where('id',$request->expact_type)->first();
            // Prepare the data for the admin email
            $mailArray = [
                'name'          => $request->name ?? '',
                'email'         => $request->email ?? '',
                'contact'       => $request->phone ?? '',
                'question_type' => $getenquerytypesData->title ?? 'None'
            ];
            $adminEmail = 'durgesh.alobha@gmail.com';
            $subject    = 'Request For Enquiry';

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
