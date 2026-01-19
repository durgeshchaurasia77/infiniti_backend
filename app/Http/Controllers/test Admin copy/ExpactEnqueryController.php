<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use App\Models\ExpactEnquery;
use App\Models\ExpactServices;

class ExpactEnqueryController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.get_expact_enquery.';

    protected $type = 'Expact Enquery ';
    protected $expactEnquery;
    protected $page;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            ExpactEnquery           $expactEnquery
                        )
                        {
                            $this->expactEnquery = $expactEnquery;
                        }
        /**
      * get expact Enquery
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
      public function index(Request $request) {

        # fetch expact Enquery list
        $query = $this->expactEnquery;

        $expactEnqueryData = $query->orderBy('id','desc')->paginate($this->page ?? 10);
        $GetExpactServices    = ExpactServices::select('id','title')->get();

        return view($this->view.'index')->with([
                                                'expactEnqueryData'  => $expactEnqueryData ?? [],
                                                'GetExpactServices'  => $GetExpactServices ?? [],
                                                ]);
    }
}
