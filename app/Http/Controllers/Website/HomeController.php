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
// use App\Models\OurServices;
// use App\Models\OurServicesHeader;
use App\Models\TrustedBy;
use App\Models\ExcellanceCounting;
use App\Models\TechnologyUsed;
use App\Models\OurPeople;
use App\Models\CraftingTechnology;
use App\Models\OurJourney;
use App\Models\WhyBusinessChoose;
use App\Models\CertificateSoftware;
use App\Models\TrunkeyPartner;
use App\Models\FameMobileApp;
use App\Models\Industry;
use App\Models\Blog;
use App\Models\Testimonials;
use App\Models\ContactUs;
// use App\Models\Setting;// use App\Models\AboutUs;
use App\Models\HomeBanner;
// use App\Models\HomeBannerDetails;
use App\Models\FAQ;
// use App\Models\PageBanner;

class HomeController extends Controller
{
    use MessageStatusTrait;
    protected $trunkeyPartner;
    protected $ourservices;
    protected $trustedBy;
    protected $excellanceCounting;
    protected $technologyUsed;
    protected $ourPeople;
    protected $craftingTechnology;
    protected $ourJourney;
    protected $fameMobileApp;
    protected $industry;
    protected $whyBusinessChoose;
    protected $certificateSoftware;
    // protected $blogsheader;
    protected $blogs;
    protected $testimonials;
    // protected $settingDetails;
    // protected $aboutus;
    protected $homeBanner;
    // protected $homeBannerDetails;
    protected $fAQ;
    // protected $pageBanner;

    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
        // OurServicesHeader        $ourservicesheader,
        // OurServices              $ourservices,
        TrustedBy               $trustedBy,
        TrunkeyPartner             $trunkeyPartner,
        ExcellanceCounting      $excellanceCounting,
        TechnologyUsed        $technologyUsed,
        OurPeople $ourPeople,
        CraftingTechnology  $craftingTechnology,
        OurJourney              $ourJourney,
        FameMobileApp         $fameMobileApp,
        Industry           $industry,
        WhyBusinessChoose    $whyBusinessChoose,
        CertificateSoftware              $certificateSoftware,
        Blog                 $blogs,
        Testimonials             $testimonials,
        // Setting                  $settingDetails,
        // AboutUs                  $aboutus,
        HomeBanner               $homeBanner,
        // HomeBannerDetails        $homeBannerDetails,
        FAQ           $fAQ,
        // PageBanner               $pageBanner


    ) {
        // $this->ourservicesheader          = $ourservicesheader;
        // $this->ourservices                = $ourservices;
        $this->trustedBy                = $trustedBy;
        $this->trunkeyPartner               = $trunkeyPartner;
        $this->excellanceCounting        = $excellanceCounting;
        $this->technologyUsed          = $technologyUsed;
        $this->ourPeople   = $ourPeople;
        $this->craftingTechnology             = $craftingTechnology;
        $this->ourJourney                 = $ourJourney;
        $this->fameMobileApp         = $fameMobileApp;
        $this->industry       = $industry;
        $this->whyBusinessChoose= $whyBusinessChoose;
        $this->certificateSoftware                = $certificateSoftware;
        $this->blogs                  = $blogs;
        $this->testimonials               = $testimonials;
        // $this->settingDetails             = $settingDetails;
        // $this->aboutus                    = $aboutus;
        $this->homeBanner                 = $homeBanner;
        $this->fAQ          = $fAQ;
        // $this->getenquerytypes            = $getenquerytypes;
        // $this->pageBanner                 = $pageBanner;
    }
    public function home()
    {
        $details = [];
        $details['trunkeyPartner']          = $this->trunkeyPartner::select('title','short_description','image_one','image_two')->where('status',1)->first();
        $details['ourPeopleList']                = $this->ourPeople::where('status', 1)
                                                    ->select('id','title', 'image', 'name','sub_title')
                                                    ->take(9)
                                                    ->get();
        $details['trustedByList']                = $this->trustedBy::select('image','name')->where('status',1)->get();
        $details['excellanceCounting']               = $this->excellanceCounting::first();
        $details['technologyUsedList']        = $this->technologyUsed::select('name', 'images')->where('status',1)->get();
        $details['craftingTechnologyList']          = $this->craftingTechnology::select('name','title','image')->where('status',1)->get();
        // $details['empoweringcareersdetails']   = $this->empoweringcareersdetails::select('title', 'percentage')->get();
        $details['ourJourneyList']             = $this->ourJourney::where('status', 1)
                                                                        ->select('title', 'sub_title')
                                                                        ->get();

        $details['fameMobileAppList']             = $this->fameMobileApp::where('status', 1)
                                                                        ->select('title','name','image')
                                                                        ->get();

        $details['industryList']             = $this->industry::where('status', 1)
                                                                        ->select('title','short_description','image')
                                                                        ->take(8)
                                                                        ->get();
        $details['whyBusinessChoose']                 = $this->whyBusinessChoose::select('ai_title','ai_description','scalable_title','scalable_description','reliable_title',
                                                            'reliable_description','security_title','security_description','status',)->first();
        $details['certificateSoftwareList']         = $this->certificateSoftware::select('id', 'name', 'sub_title','image')->where('status',1)->get();
        // $details['exploreopportunities']       = $this->exploreopportunities::select('title','description')->first();
        // $details['exploreopportunitiesdetails']= $this->exploreopportunitiesdetails::select('name','image')->get();
        // $details['blogsheader']                = $this->blogsheader::select('title','description')->first();
        $details['blogsList']                  = $this->blogs::where('status', 1)
                                                                 ->select('id','category_id','title','image','author', 'short_detail','publish_date','seo_slug')
                                                                 ->take(3)
                                                                 ->get();
        $details['testimonials']               = $this->testimonials::where('status', 1)
                                                                     ->select('name','video_path','designation','description','rating')
                                                                        ->get();

        $details['fAQList']                        = $this->fAQ::where('status', 1)->select('question','answer')->get();
        $details['homeBanner']                 = $this->homeBanner::select('title','detais','image')->first();
        // $details['homeBannerDetails']          = $this->homeBannerDetails::select('titles')->get();
        // $details['getenquerytypes']            = $this->getenquerytypes::where(['status' => 1])->get();
        // $details['pageBanner']                 = $this->pageBanner::select('image')->where('page_name','Home')->first();

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
            'launch' => 'required|string',
            'subject' => 'required|string'
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
                'name'    => $request->name ?? '',
                'email'   => $request->email ?? '',
                'phone'   => $request->contact ?? '',
                'launch'  => $request->launch ?? '',
                'about'   => $request->subject ?? '',
            ]);

            // Prepare the data for the admin email
            // $mailArray = [
            //     'name'          => $request->name ?? '',
            //     'email'         => $request->email ?? '',
            //     'contact'       => $request->contact ?? '',
            //     'launch'       => $request->launch ?? '',
            //     'subject'       => $request->subject ?? '',
            // ];
            // $adminEmail = 'durgesh.alobha@gmail.com';
            // $subject    = 'Request For Contact Us';

            // // Send email to admin with all details
            // \Mail::send('mail.admin_template', ['mailArray' => $mailArray], function ($message) use ($adminEmail, $subject) {
            //     $message->from('globalstudentsservices@gmail.com', 'Infiniti');
            //     $message->subject($subject);
            //     $message->to($adminEmail);
            // });

            // // Send thank-you email to the user
            // \Mail::send('mail.thankyou-email', ['mailArray' => $mailArray], function ($message) use ($request) {
            //     $message->from('globalstudentsservices@gmail.com', 'Infiniti');
            //     $message->subject('Thank You for Your Contact Us');
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
                'responseMessage' => 'Something went wrong. Please try again later.'.$e->getMessage(),
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

    public function digitalMarketing(Request $request)
    {

        return view('dubai.digital-marketing-dubai');
    }
    public function mobileDevelopement(Request $request)
    {

        return view('dubai.mobile-app-devlopment-dubai');
    }
    public function performMarketing(Request $request)
    {

        return view('dubai.performance-marketing-dubai');
    }
}
