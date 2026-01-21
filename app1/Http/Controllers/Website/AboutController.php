<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use App\Models\OurServices;
use App\Models\OurServicesHeader;
use App\Models\OurMission;
use App\Models\AboutUs;
use App\Models\PageBanner;

class AboutController extends Controller
{
    use MessageStatusTrait;
    protected $ourservicesheader;
    protected $ourservices;
    protected $aboutus;
    protected $ourmissions;
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
        AboutUs                  $aboutus,
        PageBanner               $pageBanner,

    ) {
        $this->ourservicesheader          = $ourservicesheader;
        $this->ourservices                = $ourservices;
        $this->ourmissions                = $ourmissions;
        $this->aboutus                    = $aboutus;
        $this->pageBanner                 = $pageBanner;
    }
    public function index(Request $request)
    {
        $details = [];
        $details['aboutus']            = $this->aboutus::first();
        $details['ourmissions']        = $this->ourmissions::first();
        $details['ourservicesheader']  = $this->ourservicesheader::first();
        $details['ourservices']        = $this->ourservices::where(['status' => 1])->get();
        $details['pageBanner']         = $this->pageBanner::select('image')->where('page_name','About')->first();

        return view('website.about', $details);
    }
}
