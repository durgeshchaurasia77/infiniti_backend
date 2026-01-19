<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use File;
use Exception;
use App\Models\OurServicesHeader;

class OurServicesHeaderController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.our_services.header.';

    protected $type = 'Our Services Header ';


    # Bind outlet
    protected $page;
    protected $ourServicesHeader;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            OurServicesHeader $ourServicesHeader
                        )
                        {
                            $this->ourServicesHeader = $ourServicesHeader;
                            $this->page = config('paginate.pagination');
                        }

    /**
    * edit ourServicesHeader
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request)
    {
        try
        {
        $ourServicesHeaderData = [];
        $ourServicesHeaderData['ourServicesHeaderData'] = $this->ourServicesHeader->first();

            return view($this->view.'edit',$ourServicesHeaderData);
        } catch (Exception $e) {

        return response()->json([
            'responseCode' => (string)$this->errorStatus,
            'responseMessage' => 'Something went wrong !'
        ]);
        }
    }
    /**
    * update ourServives page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update (Request $request) {

        $rules = [
            'heading'      => 'required|max:255',
            'description'  => 'required|max:255',

        ];

        $messages = [ 'required' => 'The :attribute field is required.'];

        #validator
        $validator = Validator::make($request->all(), $rules, $messages);

        #if validation fails
        if($validator->fails())
        {
            return response()->json([
                                    'responseCode'=>(string)$this->errorStatus,
                                    'responseMessage' => $validator->errors()->first()
                                ]);
        }

        try {

            DB::beginTransaction();


            $value = $this->ourServicesHeader->where('id', $request->id)->first();

            if($value != '')
            {
                $value->heading       = $request->heading ?? '';
                $value->description   = $request->description ?? '';
                $value->updated_at    = date('Y-m-d H:i:s');
                $value->update();
            }
            else
            {
                $value               = new $this->ourServicesHeader;
                $value->heading      = $request->heading ?? '';
                $value->description  = $request->description;
                $value->save();
            }
            DB::commit();

            if(isset($value->id))
            {
                return response()->json([
                            'responseCode'    =>(string)$this->successStatus,
                            'responseMessage' => 'Our Services Header Updated Successfully.',
                        ]);
            }else
            {
                return response()->json([
                            'responseCode'=>(string)$this->errorStatus,
                            'responseMessage' => 'Something went wrong.'
                        ]);
            }

        } catch (Exception $e) {

            return response()->json([
                'responseCode'=>(string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);

        }
    }
}
