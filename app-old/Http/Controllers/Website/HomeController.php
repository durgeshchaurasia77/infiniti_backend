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
use App\Models\OurServices;
use App\Models\OurServicesHeader;
use App\Models\OurMission;
use App\Models\OurExperties;
use App\Models\OurExpertiesDetails;
use App\Models\EmpoweringCareers;
use App\Models\EmpoweringCareersDetails;
use App\Models\GlobalCareerAspirations;
use App\Models\WhyChooseUs;
use App\Models\WhyChooesDetails;
use App\Models\ContactExplore;
use App\Models\ContactExploreDetails;
use App\Models\BlogsHeader;
use App\Models\BlogNews;
use App\Models\Testimonials;
use App\Models\ContactUs;
use App\Models\Setting;
use App\Models\AboutUs;
use App\Models\HomeBanner;
use App\Models\HomeBannerDetails;
use App\Models\GetEnquiryType;
use App\Models\PageBanner;

class HomeController extends Controller
{
    use MessageStatusTrait;
    protected $ourservicesheader;
    protected $ourservices;
    protected $ourmissions;
    protected $ourexperties;
    protected $ourexpertiesdetails;
    protected $empoweringcareers;
    protected $empoweringcareersdetails;
    protected $global_careers;
    protected $why_choose;
    protected $why_choose_details;
    protected $exploreopportunities;
    protected $exploreopportunitiesdetails;
    protected $blogsheader;
    protected $blogsnews;
    protected $testimonials;
    protected $settingDetails;
    protected $aboutus;
    protected $homeBanner;
    protected $homeBannerDetails;
    protected $getenquerytypes;
    protected $pageBanner;

    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
        OurServicesHeader        $ourservicesheader,
        OurServices              $ourservices,
        OurMission               $ourmissions,
        OurExperties             $ourexperties,
        OurExpertiesDetails      $ourexpertiesdetails,
        EmpoweringCareers        $empoweringcareers,
        EmpoweringCareersDetails $empoweringcareersdetails,
        GlobalCareerAspirations  $global_careers,
        WhyChooseUs              $why_choose,
        WhyChooesDetails         $why_choose_details,
        ContactExplore           $exploreopportunities,
        ContactExploreDetails    $exploreopportunitiesdetails,
        BlogsHeader              $blogsheader,
        BlogNews                 $blogsnews,
        Testimonials             $testimonials,
        Setting                  $settingDetails,
        AboutUs                  $aboutus,
        HomeBanner               $homeBanner,
        HomeBannerDetails        $homeBannerDetails,
        GetEnquiryType           $getenquerytypes,
        PageBanner               $pageBanner


    ) {
        $this->ourservicesheader          = $ourservicesheader;
        $this->ourservices                = $ourservices;
        $this->ourmissions                = $ourmissions;
        $this->ourexperties               = $ourexperties;
        $this->ourexpertiesdetails        = $ourexpertiesdetails;
        $this->empoweringcareers          = $empoweringcareers;
        $this->empoweringcareersdetails   = $empoweringcareersdetails;
        $this->global_careers             = $global_careers;
        $this->why_choose                 = $why_choose;
        $this->why_choose_details         = $why_choose_details;
        $this->exploreopportunities       = $exploreopportunities;
        $this->exploreopportunitiesdetails= $exploreopportunitiesdetails;
        $this->blogsheader                = $blogsheader;
        $this->blogsnews                  = $blogsnews;
        $this->testimonials               = $testimonials;
        $this->settingDetails             = $settingDetails;
        $this->aboutus                    = $aboutus;
        $this->homeBanner                 = $homeBanner;
        $this->homeBannerDetails          = $homeBannerDetails;
        $this->getenquerytypes            = $getenquerytypes;
        $this->pageBanner                 = $pageBanner;
    }
    public function home()
    {
        $details = [];
        $details['ourservicesheader']          = $this->ourservicesheader::select('heading','description' )->first();
        $details['ourservices']                = $this->ourservices::where('status', 1)
                                                    ->select('id','title', 'image', 'description')
                                                    ->take(6)
                                                    ->get();
        $details['ourmissions']                = $this->ourmissions::select('image_one','image_two','image_three','title','description')->first();
        $details['ourexperties']               = $this->ourexperties::select('title','description')->first();
        $details['ourexpertiesdetails']        = $this->ourexpertiesdetails::select('id', 'title', 'video_url')->get();
        $details['empoweringcareers']          = $this->empoweringcareers::select('title','image','description')->first();
        $details['empoweringcareersdetails']   = $this->empoweringcareersdetails::select('title', 'percentage')->get();
        $details['global_careers']             = $this->global_careers::where('status', 1)
                                                                        ->select('title', 'image')
                                                                        ->get();
        $details['why_choose']                 = $this->why_choose::select('title','image','description')->first();
        $details['why_choose_details']         = $this->why_choose_details::select('id', 'question', 'answer')->get();
        $details['exploreopportunities']       = $this->exploreopportunities::select('title','description')->first();
        $details['exploreopportunitiesdetails']= $this->exploreopportunitiesdetails::select('name','image')->get();
        $details['blogsheader']                = $this->blogsheader::select('title','description')->first();
        $details['blogsnews']                  = $this->blogsnews::where('status', 1)
                                                                 ->select('id','title','name','image','blog_image', 'description','updated_at')
                                                                 ->take(6)
                                                                 ->get();
        $details['testimonials']               = $this->testimonials::where('status', 1)
                                                                     ->select('name','image','designation','description','rating')
                                                                        ->get();
        $details['homeBanner']                 = $this->homeBanner::select('title','subtitle','youtube_link')->first();
        $details['homeBannerDetails']          = $this->homeBannerDetails::select('titles')->get();
        $details['getenquerytypes']            = $this->getenquerytypes::where(['status' => 1])->get();
        $details['pageBanner']                 = $this->pageBanner::select('image')->where('page_name','Home')->first();

        return view('website.index', $details);
    }
    public function contact(Request $request)
    {
        $details['settingDetails'] = $this->settingDetails::first();
        $details['pageBanner']     = $this->pageBanner::select('image')->where('page_name','Contact Us')->first();

        return view('website.contactUs', $details);
    }
    public function contactsubmit(Request $request)
    {
        $rules = [
            'name' => [
                'required',
                'regex:/^[a-zA-Z\s]+$/',
                'min:2',
                'max:100',
            ],
            'contact' => [
                'required',
                'numeric',
                'digits:10',
            ],
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                'max:255',
            ],
            'subject' => 'required|string',
            'message' => 'required|string'
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
            $helpRequest        =  ContactUs::create([
                'name'          => $request->name ?? '',
                'email'         => $request->email ?? '',
                'phone'         => $request->contact ?? '',
                'subject'       => $request->subject ?? '',
                'message'       => $request->message ?? '',
            ]);

            // Prepare the data for the admin email
            $mailArray = [
                'name'          => $request->name ?? '',
                'email'         => $request->email ?? '',
                'contact'       => $request->contact ?? '',
                'subject'       => $request->subject ?? '',
                'message'       => $request->message ?? '',
            ];
            $adminEmail = 'durgesh.alobha@gmail.com';
            $subject    = 'Request For Contact Us';

            // Send email to admin with all details
            \Mail::send('mail.admin_template', ['mailArray' => $mailArray], function ($message) use ($adminEmail, $subject) {
                $message->from('globalstudentsservices@gmail.com', 'Infiniti');
                $message->subject($subject);
                $message->to($adminEmail);
            });

            // Send thank-you email to the user
            \Mail::send('mail.thankyou-email', ['mailArray' => $mailArray], function ($message) use ($request) {
                $message->from('globalstudentsservices@gmail.com', 'Infiniti');
                $message->subject('Thank You for Your Contact Us');
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
    public function about(Request $request)
    {
        $details = [];
        $details['aboutus']            = $this->aboutus::first();
        $details['ourmissions']        = $this->ourmissions::first();
        $details['ourservicesheader']  = $this->ourservicesheader::first();
        $details['ourservices']        = $this->ourservices::where(['status' => 1])->get();

        return view('website.about', $details);
    }
}
