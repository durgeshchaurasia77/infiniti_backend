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
use App\Models\DestinationServices;
use App\Models\GetEnquiryType;
use App\Models\PageBanner;
class DestinationServicesController extends Controller
{
    use MessageStatusTrait;
    protected $destinationservices;
    protected $getenquerytypes;
    protected $pageBanner;
        /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
        DestinationServices        $destinationservices,
        GetEnquiryType             $getenquerytypes,
        PageBanner                 $pageBanner,

    ) {
        $this->destinationservices  = $destinationservices;
        $this->getenquerytypes      = $getenquerytypes;
        $this->pageBanner           = $pageBanner;
    }
    public function index(Request $request)
    {
        $details = [];
        $details['destinationservices']  = $this->destinationservices::where(['status' => 1])->get();
        $details['getenquerytypes']      = $this->getenquerytypes::where(['status' => 1])->get();
        $details['pageBanner']           = $this->pageBanner::select('image')->where('page_name','Destination')->first();

        return view('website.destination_services', $details);
    }
}
