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
use App\Models\BlogNews;
use App\Models\GetEnquiryType;
use App\Models\PageBanner;

class BlogsNewsController extends Controller
{
    use MessageStatusTrait;
    protected $blogsnews;
    protected $getenquerytypes;
    protected $pageBanner;
        /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
        BlogNews                   $blogsnews,
        GetEnquiryType             $getenquerytypes,
        PageBanner                 $pageBanner,

    ) {
        $this->blogsnews            = $blogsnews;
        $this->getenquerytypes      = $getenquerytypes;
        $this->pageBanner           = $pageBanner;
    }
    public function index(Request $request)
    {
        $details = [];
        $details['blogsnews']            = $this->blogsnews::where(['status' => 1])->get();
        $details['getenquerytypes']      = $this->getenquerytypes::where(['status' => 1])->get();
        $details['pageBanner']           = $this->pageBanner::select('image')->where('page_name','Blog News')->first();

        return view('website.blog', $details);
    }
    public function details(Request $request,$id)
    {
        $ids = base64_decode($id);
        $details = [];
        $details['blogsnewsdetails']     = $this->blogsnews::where(['id' => $ids])->first();
        $details['getenquerytypes']      = $this->getenquerytypes::where(['status' => 1])->get();
        $details['pageBanner']           = $this->pageBanner::select('image')->where('page_name','Blog News')->first();

        return view('website.blog_details', $details);
    }
}
