<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use App\Models\ContactUs;
class ContactUsController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.contact_us.';

    protected $type = 'Contact Us';
    protected $contactus;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(ContactUs $contactus)
    {
        $this->contactus = $contactus;
    }
        /**
      * get contactus
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
      public function index(Request $request) {

        # fetch contactus list
        $query = $this->contactus;

        $contactusData = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'contactusData'  => $contactusData ?? [],
                                                ]);
    }
}
