<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use File;
use DB;
use App\Http\Traits\MessageStatusTrait;
use App\Models\Abbreviation;

class AbbreviationController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.abbreviation.';

    protected $type = 'Abbreviation ';


    # Bind outlet
    protected $abbreviation;
    protected $page;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            Abbreviation       $abbreviation
                        )
                        {
                            $this->abbreviation = $abbreviation;
                            $this->page  = config('paginate.pagination');
                        }


    #abbreviation page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->abbreviation;

        $abbreviationList = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'abbreviationList'  => $abbreviationList ?? [],
                                                ]);
    }
        /**
    * ourServices create page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function create(Request $request)
    {

        return view($this->view.'create');
    }
    /**
    * abbreviation store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request) {
    try {
        $data = [
            'title'       => 'required|string|max:50',
            'image'       => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            $abbreviationCheck = $this->abbreviation->where('title', $request->title)
                                    ->first();

            if($abbreviationCheck)
            {

            return response()->json([
                                    'responseCode'=>(string)$this->errorStatus,
                                    'responseMessage' => 'Sorry, this Abbreviation already exist.'
                                ]);
            }

            #upload image
            if ($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = ((string)(microtime(true)*10000)).'.'.$extension;
                $file->move(public_path('images/admin/abbreviation/'), $filename);
                $image='images/admin/abbreviation/'.$filename;
            }else{
                $image = null;
            }


            $value                = new $this->abbreviation;
            $value->title         = $request->title ?? null;
            $value->image         = $image ?? null;
            $value->description   = $request->description ?? null;
            $value->created_at    = date('Y-m-d H:i:s');
            $value->save();

            if(isset($value->id))
            {
                return response()->json([
                                (string)$this->responseCode    => (string)$this->successStatus,
                                (string)$this->responseMessage => 'Abbreviation Added Successfully.',
                                'responseUrl'                  => route('abbreviation-list')
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
                                    'responseCode'    => $this->errorStatus,
                                    'responseMessage' => 'Something went wrong.'
                                    ]);
        }
    }

    /**
     * edit abbreviation page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $abbreviationData['abbreviationData'] = $this->abbreviation->findOrFail($id);

            return view($this->view.'edit',$abbreviationData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update abbreviation page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update (Request $request) {

        $rules = [
            'title'       => 'required|string|max:50',
            'image'       => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        $checkDuplicate = $this->abbreviation->where('title',$request->title)
                                ->where('id','!=',$request->id)
                                ->first();
        if($checkDuplicate != '')
        {
        return response()->json([
                                            'responseCode'    => (string)$this->errorStatus,
                                            'responseMessage' => 'Sorry, this Abbreviation already exists',
                                        ]);
            }

        try {

            DB::beginTransaction();
            $valueData  = $this->abbreviation->where('id', $request->id)->first();

            if ($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = ((string)(microtime(true)*10000)).'.'.$extension;
                File::delete(public_path($valueData->image));
                $file->move(public_path('images/admin/abbreviation/'), $filename);
                $image='images/admin/abbreviation/'.$filename;
            }else{
                $image = $valueData->image ?? '';
            }

            $value                = $this->abbreviation->where('id', $request->id)->first();
            $value->title         = $request->title ?? null;
            $value->image         = $image ?? null;
            $value->description   = $request->description ?? null;
            $value->updated_at    = date('Y-m-d H:i:s');
            $value->update();
            DB::commit();

            if(isset($value->id))
            {
                return response()->json([
                            'responseCode'    =>(string)$this->successStatus,
                            'responseMessage' => 'Abbreviation Updated Successfully.',
                            'responseUrl'     => route('abbreviation-list')
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
    * update abbreviation status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->abbreviation;

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
    * delete abbreviation
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->abbreviation->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
