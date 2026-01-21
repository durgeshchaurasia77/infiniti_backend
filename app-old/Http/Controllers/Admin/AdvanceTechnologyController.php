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
use App\Models\AdvanceTechnology;

class AdvanceTechnologyController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.advance_technologies.';

    protected $type = 'Advance Technology  ';


    # Bind outlet
    protected $page;
    protected $advanceTechnology;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            AdvanceTechnology          $advanceTechnology
                        )
                        {
                            $this->advanceTechnology = $advanceTechnology;
                            $this->page = config('paginate.pagination');
                        }


    #AdvanceTechnology page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->advanceTechnology;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }

    public function create()
    {
        try
        {
            
            return view($this->view.'create');
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
    * AdvanceTechnology store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'name'            => 'required|string|max:255',
            'short_description'  => 'required|string|max:500',
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


            $AdvanceTechnology = new AdvanceTechnology();
            $AdvanceTechnology->name     = $request->name;
            $AdvanceTechnology->details         = $request->details;
            $AdvanceTechnology->short_description = $request->short_description;
            $AdvanceTechnology->created_at      = now();
            $AdvanceTechnology->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Advance Technology Added Successfully.',
                'responseUrl'     => route('advance-technologies-list')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'.$e->getMessage(),
            ]);
        }
    }

    /**
     * edit AdvanceTechnology page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $ids = base64_decode($id);
            $details['data'] = $this->advanceTechnology->findOrFail($ids);
            return view($this->view.'edit',$details);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update AdvanceTechnology page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'               => 'required|exists:advance_technologies,id',
            'name'             => 'required|string|max:255',
            'short_description'=> 'required|string|max:500',
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
            $AdvanceTechnology = AdvanceTechnology::findOrFail($request->id);
            
            $AdvanceTechnology->name              = $request->name;
            $AdvanceTechnology->details           = $request->details;
            $AdvanceTechnology->short_description = $request->short_description;
            $AdvanceTechnology->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Advance Technology Updated Successfully.',
                'responseUrl'     => route('advance-technologies-list')
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
    * update AdvanceTechnology status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->advanceTechnology;
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
    * delete AdvanceTechnology
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
       
        $result = $this->advanceTechnology->where('id', $id)->delete();

        if($result){
            
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
