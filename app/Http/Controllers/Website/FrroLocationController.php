<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use Illuminate\Support\Facades\Validator;
use DB;
use File;
use Exception;
use Illuminate\Validation\Rule;
// use App\Models\FrroLocation;
use App\Models\GetEnquiry;
use App\Models\GetEnquiryType;
// use App\Models\PageBanner;

class FrroLocationController extends Controller
{
    use MessageStatusTrait;
    protected $frrolocation;
    protected $getenquerytypes;
    protected $pageBanner;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
        // FrroLocation                  $frrolocation,
        GetEnquiryType                $getenquerytypes,
        // PageBanner                    $pageBanner
    ) {
        // $this->frrolocation         = $frrolocation;
        $this->getenquerytypes      = $getenquerytypes;
        // $this->pageBanner           = $pageBanner;
    }
    // public function index(Request $request)
    // {
    //     $details = [];
    //     $details['frrolocation']        = $this->frrolocation::where(['status' => 1])->get();
    //     $details['getenquerytypes']     = $this->getenquerytypes::where(['status' => 1])->get();
    //     $details['pageBanner']          = $this->pageBanner::select('image')->where('page_name','FFRO Location')->first();

    //     return view('website.frro_loc', $details);
    // }
    public function getenquerysubmit(Request $request)
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
            'subject' => 'required|string',
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
            $helpRequest         =  GetEnquiry::create([
                'name'           => $request->name ?? '',
                'email'          => $request->email ?? '',
                'phone'          => $request->phone ?? '',
                'subject'       => $request->subject ?? '',
            ]);
            // $getenquerytypesData = GetEnquiryType::where('id',$request->query_type)->first();
            // // Prepare the data for the admin email
            // $mailArray = [
            //     'name'          => $request->name ?? '',
            //     'email'         => $request->email ?? '',
            //     'contact'       => $request->phone ?? '',
            //     'question'      => $request->question ?? '',
            //     'question_type' => $getenquerytypesData->name ?? 'None'
            // ];
            // $adminEmail = 'durgesh.alobha@gmail.com';
            // $subject    = 'Request For Enquiry';

            // // Send email to admin with all details
            // \Mail::send('mail.enquery.admin_template', ['mailArray' => $mailArray], function ($message) use ($adminEmail, $subject) {
            //     $message->from('globalstudentsservices@gmail.com', 'Infiniti');
            //     $message->subject($subject);
            //     $message->to($adminEmail);
            // });

            // // Send thank-you email to the user
            // \Mail::send('mail.enquery.thankyou-email', ['mailArray' => $mailArray], function ($message) use ($request) {
            //     $message->from('globalstudentsservices@gmail.com', 'Infiniti');
            //     $message->subject('Thank You for Your Enquiry');
            //     $message->to($request->email);
            // });

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
