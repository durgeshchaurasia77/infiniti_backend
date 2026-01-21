<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use App\Models\GetEnquiry;
use App\Models\GetEnquiryType;
class GetEnquiryController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.get_enquiry.';

    protected $type = 'Contact Us';
    protected $page;
    protected $GetEnquiry;
    protected $GetEnquiryTypes;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(GetEnquiry $GetEnquiry,GetEnquiryType $GetEnquiryTypes)
    {
        $this->GetEnquiry      = $GetEnquiry;
        $this->GetEnquiryTypes = $GetEnquiryTypes;
    }
        /**
      * get GetEnquiry
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
      public function index(Request $request) {

        # fetch GetEnquiry list
        $query           = $this->GetEnquiry;
        $GetEnquiryTypes = $this->GetEnquiryTypes->get();

        $GetEnquiryData  = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'GetEnquiryData'  => $GetEnquiryData ?? [],
                                                'GetEnquiryTypes' => $GetEnquiryTypes ?? [],
                                                ]);
    }
}
