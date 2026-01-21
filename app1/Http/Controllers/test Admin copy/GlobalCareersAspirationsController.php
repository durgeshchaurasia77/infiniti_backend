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
use App\Models\GlobalCareerAspirations;

class GlobalCareersAspirationsController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.global_careers_aspirations.';

    protected $type = 'Global Careers Aspirations ';


    # Bind outlet
    protected $page;
    protected $global_careers;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            GlobalCareerAspirations $global_careers
                        )
                        {
                            $this->global_careers = $global_careers;
                            $this->page           = config('paginate.pagination');
                        }


    #global careers page
    public function index(Request $request) {

        # fetch global careers list
        $query = $this->global_careers;

        $global_careersList = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'global_careersList'  => $global_careersList ?? [],
                                                ]);
    }
    /**
    * global careers store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request) {
    try {
            $data = [
                'title'    => 'required|string|max:40',
                'image'    => 'required|mimes:jpg,jpeg,png|max:2048',
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
            $global_careersCheck = $this->global_careers->where('title', $request->title)
                                    ->first();

            if($global_careersCheck)
            {

            return response()->json([
                                    'responseCode'    => (string)$this->errorStatus,
                                    'responseMessage' => 'Sorry, this Global Careers Aspirations already exist.'
                                ]);
            }
            #upload image
            if ($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = ((string)(microtime(true)*10000)).'.'.$extension;
                $file->move(public_path('images/admin/global_careers/'), $filename);
                $image='images/admin/global_careers/'.$filename;
            }else{
                $image = null;
            }

            $value                = new $this->global_careers;
            $value->title         = $request->title ?? null;
            $value->image         = $image ?? null;
            $value->created_at    = date('Y-m-d H:i:s');
            $value->save();

            if(isset($value->id))
            {
                return response()->json([
                                (string)$this->responseCode    => (string)$this->successStatus,
                                (string)$this->responseMessage => 'Global Careers Aspirations Added Successfully.',
                                // 'responseUrl'     => route('global_careers-list')
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
     * edit Global Carrers page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $global_careersData['global_careersData'] = $this->global_careers->findOrFail($id);

            return view($this->view.'edit',$global_careersData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update Global Carrers page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update (Request $request) {

        $rules = [
            'title'    => 'required|string|max:40',
            'image'    => 'nullable|mimes:jpg,jpeg,png|max:2048',
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

        $checkDuplicate = $this->global_careers->where('title',$request->title)
                                ->where('id','!=',$request->id)
                                ->first();
        if($checkDuplicate != '')
        {
        return response()->json([
                                            'responseCode'    => (string)$this->errorStatus,
                                            'responseMessage' => 'Sorry, this Global Careers Aspirations already exists',
                                        ]);
            }

        $valueData              = $this->global_careers->where('id', $request->id)->first();
        #upload image
        if ($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = ((string)(microtime(true)*10000)).'.'.$extension;
            File::delete(public_path($request->image));
            $file->move(public_path('images/admin/global_careers/'), $filename);
            $image='images/admin/global_careers/'.$filename;
        }else{
            $image = $valueData->image ?? '';
        }

        try {

            DB::beginTransaction();


            $value              = $this->global_careers->where('id', $request->id)->first();
            $value->title       = $request->title ?? null;
            $value->image       = $image ?? null;
            $value->updated_at  = date('Y-m-d H:i:s');
            $value->update();
            DB::commit();

            if(isset($value->id))
            {
                return response()->json([
                            'responseCode'    => (string)$this->successStatus,
                            'responseMessage' => 'Global Careers Aspirations Updated Successfully.',
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
    * update Global Carrers status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->global_careers;

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
    * delete Global Carrers
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->global_careers->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }

}
