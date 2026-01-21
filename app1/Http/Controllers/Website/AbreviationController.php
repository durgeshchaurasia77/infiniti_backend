<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use App\Models\Abbreviation;
use App\Models\GetEnquiryType;
use App\Models\PageBanner;
class AbreviationController extends Controller
{
    use MessageStatusTrait;
    protected $abbreviation;
    protected $getenquerytypes;
    protected $pageBanner;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
        Abbreviation        $abbreviation,
        GetEnquiryType      $getenquerytypes,
        PageBanner          $pageBanner,

    ) {
        $this->abbreviation    = $abbreviation;
        $this->getenquerytypes = $getenquerytypes;
        $this->pageBanner      = $pageBanner;
    }
    public function index(Request $request)
    {
        $details = [];
        $details['abbreviation']     = $this->abbreviation::where(['status' => 1])->get();
        $details['getenquerytypes']  = $this->getenquerytypes::where(['status' => 1])->get();
        $details['pageBanner']       = $this->pageBanner::select('image')->where('page_name','Abreviation')->first();

        return view('website.abbreviation', $details);
    }
}
