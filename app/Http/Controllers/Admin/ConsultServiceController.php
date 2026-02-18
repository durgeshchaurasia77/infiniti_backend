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
use App\Models\ConsultService;
use App\Models\DigitalCategory;

class ConsultServiceController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.consult_service.';
    protected $type = 'Consult Service  ';


    # Bind outlet
    protected $page;
    protected $consultService;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            ConsultService          $consultService
                        )
                        {
                            $this->consultService = $consultService;
                            $this->page = config('paginate.pagination');
                        }


    #consultService page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->consultService;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }

    public function create()
    {
        try
        {

            $categories  = DigitalCategory::where('status',1)->get();
            return view($this->view.'create',compact('categories'));
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
    * ConsultService store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'category_id' =>'required',
            'name'    => 'required|string|max:255',
            'title'   => 'required|string|max:255',
            'image'   => 'required|file:jpeg,png,webp,jpg',
            'details' => 'required|array',

        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'_ConsultService_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/consult_service/'), $filename);
                $imagePath = 'images/admin/consult_service/'.$filename;
            }


            $ConsultService = new ConsultService();
            $ConsultService->category_id     = $request->category_id;
            $ConsultService->name     = $request->name;
            $ConsultService->title     = $request->title;
            $ConsultService->features         = $request->details;
            // $ConsultService->short_description = $request->short_description;
            $ConsultService->image           = $imagePath ?? null;
            $ConsultService->created_at      = now();
            $ConsultService->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Consult Service Added Successfully.',
                'responseUrl'     => route('consult-service-list')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }

    /**
     * edit ConsultService page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $ids = base64_decode($id);
            $details['data'] = $this->consultService->findOrFail($ids);

            $details['categories']  = DigitalCategory::where('status',1)->get();

            return view($this->view.'edit',$details);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update ConsultService page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'               => 'required|exists:consult_service,id',
            'category_id' =>'required',
            'name'             => 'required|string|max:255',
            'title'             => 'required|string|max:255',
            'image' => 'nullable',
            'details'          => 'required|array',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {

            DB::beginTransaction();

            $ConsultService = ConsultService::findOrFail($request->id);

             if ($request->hasFile('image')) {

            if (!empty($ConsultService->image) && file_exists(public_path($ConsultService->image))) {
                unlink(public_path($ConsultService->image));
            }

            $file = $request->file('image');
                $filename = time().'_ConsultService_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/consult_service/'), $filename);
                $ConsultService->image = 'images/admin/consult_service/'.$filename;
            }

            $ConsultService->category_id     = $request->category_id;
            $ConsultService->name              = $request->name;
            $ConsultService->title             = $request->title;
            $ConsultService->features          = $request->details;
            // $ConsultService->short_description = $request->short_description;
            $ConsultService->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Consult Service Updated Successfully.',
                'responseUrl'     => route('consult-service-list')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }


    /**
    * update ConsultService status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */

    public function status($id)
    {
        $query = $this->consultService;
        $status = $query->where('id', $id)->first()->status;

        if ($status == '1')
        {
            $message = $this->inActiveMessage($this->type);
            $statusCode = '0';
        }
        else
        {
            $message = $this->activeMessage($this->type);
            $statusCode = '1';
        }

        $query->where('id', $id)->update(['status' => $statusCode]);

        return [
                    $this->successKey => $this->successStatus,
                    $this->messageKey => $message
                ];
    }

    /**
    * delete ConsultService
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {

        $result = $this->consultService->where('id', $id)->delete();

        if($result){

            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
