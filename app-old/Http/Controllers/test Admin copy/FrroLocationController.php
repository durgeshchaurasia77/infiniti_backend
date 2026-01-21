<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use File;
use DB;
use App\Http\Traits\MessageStatusTrait;
use App\Models\FrroLocation;

class FrroLocationController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.frro_location.';

    protected $type = 'FRRO Location ';


    # Bind outlet
    protected $page;
    protected $frrolocation;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            FrroLocation       $frrolocation
                        )
                        {
                            $this->frrolocation = $frrolocation;
                            $this->page  = config('paginate.pagination');
                        }


    #frrolocation page
    public function index(Request $request) {

        # fetch frrolocation list
        $query = $this->frrolocation;

        $frrolocationList = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'frrolocationList'  => $frrolocationList ?? [],
                                                ]);
    }
        /**
    * frrolocations create page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function create(Request $request)
    {

        return view($this->view.'create');
    }
    /**
    * frrolocation store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request) {
    try {
        $data = [
            'title'       => 'required|string|regex:/^[a-zA-Z\s]+$/|max:50',
            'latitude'    => 'required|numeric|between:-90,90',    // Latitude must be numeric and within -90 to 90
            'longitude'   => 'required|numeric|between:-180,180',   // Longitude must be numeric and within -180 to 180
            'description' => 'required|string|max:2000',
        ];

            $messages = [
                            'required'    => 'The :attribute field is required.',
                            'title.regex' => 'The :attribute field must contain only alphabets.',
                        ];

            #validator
            $validator = Validator::make($request->all(), $data, $messages);

            #if validation fails
            if($validator->fails())
            {
                return response()->json([
                    'responseCode'    => (string)$this->errorStatus,
                    'responseMessage' => $validator->errors()->first()
                ]);
            }

            # check the requested sub category already exist or not
            $frrolocationCheck = $this->frrolocation->where('title', $request->title)
                                    ->first();

            if($frrolocationCheck)
            {

            return response()->json([
                                    'responseCode'    =>  (string)$this->errorStatus,
                                    'responseMessage' => 'Sorry, this FRRO Location already exist.'
                                ]);
            }


            $value                = new $this->frrolocation;
            $value->title         = $request->title ?? null;
            $value->latitude      = $request->latitude ?? null;
            $value->longitude     = $request->longitude ?? null;
            $value->description   = $request->description ?? null;
            $value->created_at    = date('Y-m-d H:i:s');
            $value->save();

            if(isset($value->id))
            {
                return response()->json([
                                (string)$this->responseCode    => (string)$this->successStatus,
                                (string)$this->responseMessage => 'FRRO Location Added Successfully.',
                                'responseUrl'                  => route('frro-location-list')
                            ]);
            }else
            {
                return response()->json([
                                    'responseCode'    =>  (string)$this->errorStatus,
                                    'responseMessage' => 'Something went wrong.'
                                    ]);
            }

        } catch (Exception $e) {
            return response()->json([
                                    'responseCode'    => $this->errorStatus,
                                    'responseMessage' => 'Something went wrong.'
                                    ]);
        }
    }

    /**
     * edit frrolocation page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $frrolocationData['frrolocationData'] = $this->frrolocation->findOrFail($id);

            return view($this->view.'edit',$frrolocationData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update frrolocation page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update (Request $request) {

        $rules = [
            'title'       => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'latitude'    => 'required|numeric|between:-90,90',    // Latitude must be numeric and within -90 to 90
            'longitude'   => 'required|numeric|between:-180,180',   // Longitude must be numeric and within -180 to 180
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
                                    'responseCode'    => (string)$this->errorStatus,
                                    'responseMessage' => $validator->errors()->first()
                                ]);
        }

        $checkDuplicate = $this->frrolocation->where('title',$request->title)
                                ->where('id','!=',$request->id)
                                ->first();
        if($checkDuplicate != '')
        {
        return response()->json([
                                            'responseCode'    => (string)$this->errorStatus,
                                            'responseMessage' => 'Sorry, this FRRO Location already exists',
                                        ]);
            }

        try {

            DB::beginTransaction();


            $value                = $this->frrolocation->where('id', $request->id)->first();
            $value->title         = $request->title ?? null;
            $value->latitude      = $request->latitude ?? null;
            $value->longitude     = $request->longitude ?? null;
            $value->description   = $request->description ?? null;
            $value->updated_at    = date('Y-m-d H:i:s');
            $value->update();
            DB::commit();

            if(isset($value->id))
            {
                return response()->json([
                            'responseCode'    =>(string)$this->successStatus,
                            'responseMessage' => 'FRRO Location Updated Successfully.',
                            'responseUrl'     => route('frro-location-list')
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
    * update frrolocation status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->frrolocation;

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
    * delete frrolocation
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->frrolocation->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
