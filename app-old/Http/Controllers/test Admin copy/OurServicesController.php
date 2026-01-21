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
use App\Models\OurServices;
use App\Models\OurServicesHeader;

class OurServicesController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.our_services.';

    protected $type = 'Our Services ';


    # Bind outlet
    protected $page;
    protected $ourServices;
    protected $ourServicesHeader;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            OurServices $ourServices,
                            OurServicesHeader $ourServicesHeader
                        )
                        {
                            $this->ourServices = $ourServices;
                            $this->page = config('paginate.pagination');
                        }


    #ourServices page
    public function index(Request $request) {

        # fetch ourServices list
        $query = $this->ourServices;

        $ourServicesList = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'ourServicesList'  => $ourServicesList ?? [],
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
    * ourServices store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request) {
    try {
            $data = [
                'title'       => 'required|string|max:50',
                'image'       => 'required|mimes:jpeg,png,jpg,gif',
                'description' => 'required|string|max:255',
                'summary'     => 'required|string|max:2000',
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
            $ourServicesCheck = $this->ourServices->where('title', $request->title)
                                    ->first();

            if($ourServicesCheck)
            {

            return response()->json([
                                    'responseCode'    => (string)$this->errorStatus,
                                    'responseMessage' => 'Sorry, this Our Services already exist.'
                                ]);
            }

            #upload image
            if ($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = ((string)(microtime(true)*10000)).'.'.$extension;
                File::delete(public_path($request->image));
                $file->move(public_path('images/admin/ourServices/'), $filename);
                $image='images/admin/ourServices/'.$filename;
            }else{
                $image = null;
            }


            $value                = new $this->ourServices;
            $value->title         = $request->title ?? null;
            $value->description   = $request->description ?? null;
            $value->summary       = $request->summary ?? null;
            $value->image         = $image;
            $value->created_at    = date('Y-m-d H:i:s');
            $value->save();

            if(isset($value->id))
            {
                return response()->json([
                                'responseCode'    =>(string)$this->successStatus,
                                'responseMessage' => 'Our Services Added Successfully.',
                                'responseUrl'     => route('ourServices-list')
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
                                    'responseCode'    => $this->errorStatus,
                                    'responseMessage' => 'Something went wrong.'
                                    ]);
        }
    }

    /**
     * edit ourServives page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $ourServicesData['ourServicesData'] = $this->ourServices->findOrFail($id);

            return view($this->view.'edit',$ourServicesData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update ourServives page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update (Request $request) {

        $rules = [
            'title'       => 'required|string|max:50',
            'image'       => 'nullable|mimes:jpeg,png,jpg,gif',
            'description' => 'required|string|max:700',
            'summary'     => 'required|string',
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

        $checkDuplicate = $this->ourServices->where('title',$request->title)
                                ->where('id','!=',$request->id)
                                ->first();
        if($checkDuplicate != '')
        {
        return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Sorry, this Our Services already exists',
            ]);
        }
        try {

            DB::beginTransaction();

            $checkourServices = $this->ourServices->where('id', $request->id)->first();


            #upload image
            if ($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = ((string)(microtime(true)*10000)).'.'.$extension;
                File::delete(public_path($request->image));
                $file->move(public_path('images/admin/ourServices/'), $filename);
                $image='images/admin/ourServices/'.$filename;
            }else{
                $image = $checkourServices->image;
            }

            $value                = $this->ourServices->where('id', $request->id)->first();
            $value->title         = $request->title ?? null;
            $value->description   = $request->description ?? null;
            $value->summary       = $request->summary ?? null;
            $value->image         = $image;
            $value->updated_at        = date('Y-m-d H:i:s');
            $value->update();
            DB::commit();

            if(isset($value->id))
            {
                return response()->json([
                            'responseCode'    =>(string)$this->successStatus,
                            'responseMessage' => 'Our Services Updated Successfully.',
                            'responseUrl'     => route('ourServices-list')
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
    * update ourServives status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->ourServices;

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
    * delete ourServives
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->ourServices->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }

}
