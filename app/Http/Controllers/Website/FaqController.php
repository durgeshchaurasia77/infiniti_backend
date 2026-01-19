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
use App\Models\FAQ;
use App\Models\GetEnquiryType;
use App\Models\PageBanner;

class FaqController extends Controller
{
    use MessageStatusTrait;
    protected $faq;
    protected $getenquerytypes;
    protected $pageBanner;
        /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
        FAQ                   $faq,
        GetEnquiryType        $getenquerytypes,
        PageBanner            $pageBanner,

    ) {
        $this->faq            = $faq;
        $this->getenquerytypes= $getenquerytypes;
        $this->pageBanner     = $pageBanner;
    }
    public function index(Request $request)
    {
        $details = [];

        $details['faqDatas']         = $this->faq::where(['status' => 1])->get();
        $details['getenquerytypes']  = $this->getenquerytypes::where(['status' => 1])->get();
        $details['pageBanner']       = $this->pageBanner::select('image')->where('page_name','Faq')->first();
        return view('website.faq', $details);
    }
}
