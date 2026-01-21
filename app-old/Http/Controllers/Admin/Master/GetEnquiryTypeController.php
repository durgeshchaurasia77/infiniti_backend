<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use File;
use Exception;
use App\Models\GetEnquiryType;
class GetEnquiryTypeController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.master.get_question_type.';

    protected $type = 'Get Enquiry Type ';


    # Bind outlet
    protected $gettype;
    protected $page;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            GetEnquiryType $gettype
                        )
                        {
                            $this->gettype = $gettype;
                            $this->page    = config('paginate.pagination');
                        }


    #gettype page
    public function index(Request $request) {

        # fetch gettype list
        $query = $this->gettype;

        $gettypeList = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'gettypeList'  => $gettypeList ?? [],
                                                ]);
    }
    /**
    * gettype store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request) {
    try {
            $data = [
                'name'       => 'required|string|max:50',
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
                    'responseCode'    => (string)$this->errorStatus,
                    'responseMessage' => $validator->errors()->first()
                ]);
            }

            # check the requested sub category already exist or not
            $gettypeCheck = $this->gettype->where('name', $request->name)
                                    ->first();

            if($gettypeCheck)
            {

            return response()->json([
                                    'responseCode'    => (string)$this->errorStatus,
                                    'responseMessage' => 'Sorry, this Get Question Type already exist.'
                                ]);
            }

            $value                = new $this->gettype;
            $value->name          = $request->name ?? null;
            $value->created_at    = date('Y-m-d H:i:s');
            $value->save();

            if(isset($value->id))
            {
                return response()->json([
                                (string)$this->responseCode    => (string)$this->successStatus,
                                (string)$this->responseMessage => 'Get Question Type Added Successfully.',
                                // 'responseUrl'     => route('gettype-list')
                            ]);
            }else
            {
                return response()->json([
                                    'responseCode'    => (string)$this->errorStatus,
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
     * edit gettype page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $gettypeData['gettypeData'] = $this->gettype->findOrFail($id);

            return view($this->view.'edit',$gettypeData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update gettype page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update (Request $request) {

        $rules = [
            'name'       => 'required|string|max:50',
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

        $checkDuplicate = $this->gettype->where('name',$request->name)
                                ->where('id','!=',$request->id)
                                ->first();
        if($checkDuplicate != '')
        {
        return response()->json([
                                            'responseCode'    => (string)$this->errorStatus,
                                            'responseMessage' => 'Sorry, this Get Question Type already exists',
                                        ]);
            }

        try {

            DB::beginTransaction();

            $value             = $this->gettype->where('id', $request->id)->first();
            $value->name       = $request->name ?? null;
            $value->updated_at = date('Y-m-d H:i:s');
            $value->update();
            DB::commit();

            if(isset($value->id))
            {
                return response()->json([
                            'responseCode'    => (string)$this->successStatus,
                            'responseMessage' => 'Get Question Type Updated Successfully.',
                        ]);
            }else
            {
                return response()->json([
                            'responseCode'    => (string)$this->errorStatus,
                            'responseMessage' => 'Something went wrong.'
                        ]);
            }

        } catch (Exception $e) {

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first()
            ]);

        }
    }
    /**
    * update gettype status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->gettype;

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
    * delete gettype
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->gettype->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   => $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
