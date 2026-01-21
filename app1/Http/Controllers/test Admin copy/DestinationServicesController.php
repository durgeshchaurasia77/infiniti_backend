<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use File;
use DB;
use App\Http\Traits\MessageStatusTrait;
use App\Models\DestinationServices;

class DestinationServicesController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.destination_services.';

    protected $type = 'Destination Services ';


    # Bind outlet
    protected $page;
    protected $destinationservices;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            DestinationServices       $destinationservices
                        )
                        {
                            $this->destinationservices = $destinationservices;
                            $this->page  = config('paginate.pagination');
                        }


    #destination services page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->destinationservices;

        $destinationservicesList = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'destinationservicesList'  => $destinationservicesList ?? [],
                                                ]);
    }
        /**
    * destination services create page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function create(Request $request)
    {

        return view($this->view.'create');
    }
    /**
    * destination services store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request) {
    try {
        $data = [
            'title'       => 'required|string|max:200',
            'description' => 'required|string|max:2000',
        ];

            $messages = [
                            'required' => 'The :attribute field is required.',
                        ];

            #validator
            $validator = Validator::make($request->all(), $data, $messages);

            #if validation fails
            if($validator->fails())
            {
                return response()->json([
                    'responseCode'=>(string)$this->errorStatus,
                    'responseMessage' => $validator->errors()->first()
                ]);
            }

            # check the requested sub category already exist or not
            $destinationservicesCheck = $this->destinationservices->where('title', $request->title)
                                    ->first();

            if($destinationservicesCheck)
            {

            return response()->json([
                                    'responseCode'=>(string)$this->errorStatus,
                                    'responseMessage' => 'Sorry, this Destination Services already exists'
                                ]);
            }


            $value                = new $this->destinationservices;
            $value->title         = $request->title ?? null;
            $value->description   = $request->description ?? null;
            $value->created_at    = date('Y-m-d H:i:s');
            $value->save();

            if(isset($value->id))
            {
                return response()->json([
                                (string)$this->responseCode    => (string)$this->successStatus,
                                (string)$this->responseMessage => 'Destination Services Added Successfully.',
                                'responseUrl'                  => route('destination-services-list')
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
                                    'responseCode'    =>$this->errorStatus,
                                    'responseMessage' => 'Something went wrong.'
                                    ]);
        }
    }

    /**
     * edit destination services page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $destinationservicesData['destinationservicesData'] = $this->destinationservices->findOrFail($id);

            return view($this->view.'edit',$destinationservicesData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update destination services page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update (Request $request) {

        $rules = [
            'title'       => 'required|string|max:200',
            'description' => 'required|string|max:2000',
        ];

        $messages = [
                            'required' => 'The :attribute field is required.',
                        ];

        #validator
        $validator = Validator::make($request->all(), $rules, $messages);

        #if validation fails
        if($validator->fails())
        {
            return response()->json([
                                    'responseCode'    =>(string)$this->errorStatus,
                                    'responseMessage' => $validator->errors()->first()
                                ]);
        }

        $checkDuplicate = $this->destinationservices->where('title',$request->title)
                                ->where('id','!=',$request->id)
                                ->first();
        if($checkDuplicate != '')
        {
        return response()->json([
                                            'responseCode'    => (string)$this->errorStatus,
                                            'responseMessage' => 'Sorry, this Destination Services already exists',
                                        ]);
            }

        try {

            DB::beginTransaction();


            $value                = $this->destinationservices->where('id', $request->id)->first();
            $value->title         = $request->title ?? null;
            $value->description   = $request->description ?? null;
            $value->updated_at    = date('Y-m-d H:i:s');
            $value->update();
            DB::commit();

            if(isset($value->id))
            {
                return response()->json([
                            'responseCode'    =>(string)$this->successStatus,
                            'responseMessage' => 'Destination Services Updated Successfully.',
                            'responseUrl'     => route('destination-services-list')
                        ]);
            }else
            {
                return response()->json([
                            'responseCode'    =>(string)$this->errorStatus,
                            'responseMessage' => 'Something went wrong.'
                        ]);
            }

        } catch (Exception $e) {

            return response()->json([
                'responseCode'    =>(string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first()
            ]);

        }
    }
    /**
    * update destination services status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->destinationservices;

        # get the status
        $status = $query->where('id', $id)->first()->status;

        # check status, if active
        if ($status == '1')
        {
            #message
            $message = $this->inActiveMessage($this->type);

            # deactive( update status to zero)
            $statusCode = '0';
        }
        else
        {
            #message
            $message = $this->activeMessage($this->type);

            # active( update status to one)
            $statusCode = '1';
        }

        # update status code
        $query->where('id', $id)->update(['status' => $statusCode]);

        # return success
        return [
                    $this->successKey => $this->successStatus,
                    $this->messageKey => $message
                ];
    }
    /**
    * delete destination services
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->destinationservices->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
