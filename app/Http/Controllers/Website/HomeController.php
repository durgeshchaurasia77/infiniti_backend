<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\AdvanceAi;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use Illuminate\Support\Facades\Validator;
use DB;
use File;
use Exception;
use Illuminate\Validation\Rule;
use App\Models\WeDeliver;
use App\Models\ClientSatisfation;
use App\Models\LeverageAi;
use App\Models\TrustedBy;
use App\Models\ExcellanceCounting;
use App\Models\TechnologyUsed;
use App\Models\OurPeople;
use App\Models\CraftingTechnology;
use App\Models\PowerPacked;
use App\Models\OurJourney;
use App\Models\WhyBusinessChoose;
use App\Models\CertificateSoftware;
use App\Models\TrunkeyPartner;
use App\Models\FameMobileApp;
use App\Models\Industry;
use App\Models\Features;
use App\Models\CaseStudy;
use App\Models\AdvanceTechnology;
use App\Models\Blog;
use App\Models\Testimonials;
use App\Models\ContactUs;
use App\Models\ServiceWeOffer;
use App\Models\Service;
use App\Models\HomeBanner;
use App\Models\RoadMap;
use App\Models\OurProven;
use App\Models\FAQ;
use App\Models\Setting;
use App\Models\AboutUs;
use App\Models\OurJourneys;
use App\Models\OurSuccess;
use App\Models\PortfolioBanner;
use App\Models\WhyPartner;
use App\Models\ConsultService;
use App\Models\OurProcess;
use App\Models\FeatureProduct;
use App\Models\Product;

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
    protected $settingDetails;
    protected $aboutus;
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
        Setting                  $settingDetails,
        AboutUs                  $aboutus,
        HomeBanner               $homeBanner,
        // HomeBannerDetails        $homeBannerDetails,
        FAQ           $fAQ,
        // PageBanner               $pageBanner


    ) {
        // $this->ourservicesheader          = $ourservicesheader;
        $this->aboutus                = $aboutus;
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
        $this->settingDetails             = $settingDetails;
        $this->aboutuss                    = $aboutus;
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
                                                                        ->select('title','short_description','image','seo_slug')
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

        $details['contactdata']  =  $this->settingDetails::first();
        return view('website.index', $details);
    }
    public function contact1(Request $request)
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
    public function aboutUs(Request $request)
    {
        $details = [];
        $details['aboutusData']            = $this->aboutus::first();
        // $details['ourmissions']        = $this->ourmissions::first();
        // $details['ourservicesheader']  = $this->ourservicesheader::first();
        // $details['ourservices']        = $this->ourservices::where(['status' => 1])->get();
        $details['contactdata']  =  $this->settingDetails::first();
        $details['trustedByList']                = $this->trustedBy::select('image','name')->where('status',1)->get();
        $details['ourJourneysList'] = OurJourneys::where('status',1)->orderBy('year','asc')->get();
        $details['ourSuccessList'] = OurSuccess::where('status',1)->get();
        $details['fameMobileAppList']             = $this->fameMobileApp::where('status', 1)
                                                                        ->select('title','name','image')
                                                                        ->get();

        $details['testimonials']               = $this->testimonials::where('status', 1)
                                                                     ->select('name','video_path','designation','description','rating')
                                                                        ->get();

        $details['fAQList']                        = $this->fAQ::where('status', 1)->select('question','answer')->get();
        return view('website.about', $details);
    }
    public function blog(Request $request, $cat=null)
    {
        $details = [];
        // $details['aboutus']            = $this->aboutus::first();
        // $details['ourmissions']        = $this->ourmissions::first();
        // $details['ourservicesheader']  = $this->ourservicesheader::first();
        // $details['ourservices']        = $this->ourservices::where(['status' => 1])->get();
    if ($cat) {
        $catId = base64_decode($cat);
        $details['blogsList']                  = $this->blogs::where('status', 1)
                                                      ->where('category_id', $catId)
                                                      ->select('id','category_id','title','image','author', 'short_detail','publish_date','seo_slug')
                                                      ->get();
    } else {
        $cat = null;
        $details['blogsList']                  = $this->blogs::where('status', 1)
                                                      ->select('id','category_id','title','image','author', 'short_detail','publish_date','seo_slug')
                                                      ->get();
    }

        $details['blogCategoryList'] = BlogCategory::where('status', 1)->get();
        $details['blogCateId'] = $cat;
        $details['contactdata']  =  $this->settingDetails::first();
        return view('website.blog', $details);
    }
    public function blogDetails(Request $request, $slug = null)
    {
        $details = [];
            $data   = $this->blogs::where('seo_slug', $slug)->first();
        if(!$data){
            $data   = $this->blogs::where('status', 1)->first();
        }

        $details['blogCategoryList'] = BlogCategory::where('status', 1)->whereNot('id', $data->category->id)->get();

        $details['blogsData'] = $data;
        $details['contactdata']  =  $this->settingDetails::first();
        return view('website.blog-details', $details);
    }
    public function services(Request $request, $slug = null)
    {
        $details = [];
            $data   = Service::where('seo_slug', $slug)->first();
        if(!$data){
            $data   = Service::where('status', 1)->first();
        }
        $details['serviceData'] = $data;
        $details['trustedByList']                = $this->trustedBy::select('image','name')->where('status',1)->get();
        $details['excellanceCounting']               = $this->excellanceCounting::first();
        $details['serviceWeOfferList'] = ServiceWeOffer::where('category_id',$data->id)->where('status',1)->get();
        $details['clientSatisfationList'] = ClientSatisfation::where('category_id',$data->id)->where('status',1)->get();
        $details['ourProvenList'] = OurProven::where('category_id',$data->id)->where('status',1)->get();
        $details['advanceAiList'] = AdvanceAi::where('category_id',$data->id)->where('status',1)->get();
        $details['weDeliverList'] = WeDeliver::where('category_id',$data->id)->where('status',1)->get();

        $details['testimonials']  = $this->testimonials::where('status', 1)
                                                                     ->select('name','video_path','designation','description','rating')
                                                                        ->get();
        // $details['advanceTechnologyList'] = AdvanceTechnology::where('status',1)->get();
        // $details['ourmissions']        = $this->ourmissions::first();
        // $details['ourservicesheader']  = $this->ourservicesheader::first();
        // $details['ourservices']        = $this->ourservices::where(['status' => 1])->get();

        $details['contactdata']  =  $this->settingDetails::first();
        return view( 'website.services', $details);
    }
    public function industry(Request $request, $slug)
    {
        $details = [];
            $data   = Industry::where('seo_slug', $slug)->first();
        if(!$data){
            $data   = Industry::where('status', 1)->first();
        }
        // $details['aboutus']            = $this->aboutus::first();
        // $details['ourmissions']        = $this->ourmissions::first();
        // $details['ourservicesheader']  = $this->ourservicesheader::first();
        // $details['ourservices']        = $this->ourservices::where(['status' => 1])->get();
        $details['featuresData'] = Features::first();
        $details['fameMobileAppList']             = $this->fameMobileApp::where('status', 1)
                                                                        ->select('title','name','image')
                                                                        ->get();

        $details['caseStudyList']  = CaseStudy::where('status',1)->get();
        $details['LeverageAiList'] = LeverageAi::where('category_id',$data->id)->where('status',1)->get();
        $details['testimonials']   = $this->testimonials::where('status', 1)
                                                                     ->select('name','video_path','designation','description','rating')
                                                                        ->get();

        $details['advanceTechnologyList'] = AdvanceTechnology::where('category_id',$data->id)->where('status',1)->get();
        $details['powerPackedList'] = PowerPacked::where('category_id',$data->id)->where('status',1)->get();
        $details['roadMapList'] = RoadMap::where('category_id',$data->id)->where('status',1)->get();
        $details['industryData'] = $data;
        $details['contactdata']  =  $this->settingDetails::first();
        $details['fAQList']                        = $this->fAQ::where('status', 1)->select('question','answer')->get();
        return view( 'website.industry', $details);
    }
    public function contact(Request $request)
    {
        $details = [];
        // $details['aboutus']            = $this->aboutus::first();
        // $details['ourmissions']        = $this->ourmissions::first();
        // $details['ourservicesheader']  = $this->ourservicesheader::first();
        // $details['ourservices']        = $this->ourservices::where(['status' => 1])->get();
           $details['contactdata']  =  $this->settingDetails::first();
        return view( 'website.contact', $details);
    }
    public function portfolio(Request $request)
    {
        $details = [];
        $details['contactdata']  =  $this->settingDetails::first();
        $details['featureProductList'] = FeatureProduct::where('status',1)->get();
        $details['productList'] = Product::where('status',1)->get();
        return view( 'website.portfolio', $details);
    }
    public function digitalMarketingI(Request $request , $id = null)
    {
        $details = [];
        $ids = base64_decode($id);
        $details['portfolioBannerList'] = PortfolioBanner::where('category_id',$ids)->where('status',1)->get();
        $details['contactdata']  =  $this->settingDetails::first();
        $details['excellanceCounting']   = $this->excellanceCounting::first();
        $details['whyPartnerData']       = WhyPartner::where('category_id',$ids)->first();
        // $details['consultServiceList'] = ConsultService::where('category_id',$ids)->where('status',1)->get();

        $details['ourProcessData']       = OurProcess::where('category_id',$ids)->first();

        $consultServiceList = ConsultService::where('category_id', $ids)
            ->where('status', 1)
            ->get();

        $details['firstFourServices'] = $consultServiceList->take(4);
        $details['sliderServices'] = $consultServiceList->skip(4);

        return view( 'website.digital-marketing', $details);
    }
    public function digitalMarketing(Request $request)
    {

        return view('dubai.digital-marketing-dubai');
    }
    public function mobileDevelopment(Request $request)
    {
        return view('dubai.mobile-app-devlopment-dubai');
    }
    public function performMarketing(Request $request)
    {

        return view('dubai.performance-marketing-dubai');
    }
}
