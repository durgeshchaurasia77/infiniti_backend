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
use App\Models\CMS;
use App\Models\GetEnquiryType;
use App\Models\PageBanner;

class ContentManagementController extends Controller
{
    use MessageStatusTrait;
    protected $cms;
    protected $getenquerytypes;
    protected $pageBanner;
        /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
        CMS                   $cms,
        GetEnquiryType        $getenquerytypes,
        PageBanner            $pageBanner,

    ) {
        $this->cms            = $cms;
        $this->getenquerytypes= $getenquerytypes;
        $this->pageBanner     = $pageBanner;
    }
    public function privacypolicy(Request $request)
    {
        $details = [];

        $details['cmsprivacy']     = $this->cms::where('short_name','privacy_policy')->first();
        $details['getenquerytypes']= $this->getenquerytypes::where(['status' => 1])->get();
        $details['pageBanner']     = $this->pageBanner::select('image')->where('page_name','CMS')->first();

        return view('website.privacy_policy', $details);
    }
    public function termcondition(Request $request)
    {
        $details = [];

        $details['cmsterm']        = $this->cms::where('short_name','term_condition')->first();
        $details['getenquerytypes']= $this->getenquerytypes::where(['status' => 1])->get();
        $details['pageBanner']     = $this->pageBanner::select('image')->where('page_name','CMS')->first();

        return view('website.terms_nd_conditions', $details);
    }
    public function disclaimer(Request $request)
    {
        $details = [];

        $details['cmsdisclaimer']  = $this->cms::where('short_name','disclaimer')->first();
        $details['getenquerytypes']= $this->getenquerytypes::where(['status' => 1])->get();
        $details['pageBanner']     = $this->pageBanner::select('image')->where('page_name','CMS')->first();

        return view('website.disclaimer', $details);
    }
}
