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
use App\Models\RoadMap;

class RoadMapController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.roadmap.';

    protected $type = 'Road Map  ';


    # Bind outlet
    protected $page;
    protected $roadMap;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            RoadMap          $roadMap
                        )
                        {
                            $this->roadMap = $roadMap;
                            $this->page = config('paginate.pagination');
                        }


    #RoadMap page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->roadMap;

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
    * RoadMap store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'name'              => 'required|string|max:255',
            // 'title'             => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'details'           => 'required|array',
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


            $RoadMap = new RoadMap();
            $RoadMap->name     = $request->name;
            // $RoadMap->title     = $request->title;
            $RoadMap->details         = $request->details;
            $RoadMap->short_description = $request->short_description;
            $RoadMap->created_at      = now();
            $RoadMap->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Road Map Added Successfully.',
                'responseUrl'     => route('roadmap-list')
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
     * edit RoadMap page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $ids = base64_decode($id);
            $details['data'] = $this->roadMap->findOrFail($ids);
            return view($this->view.'edit',$details);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update RoadMap page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'               => 'required|exists:roadmap,id',
            'name'             => 'required|string|max:255',
            // 'title'             => 'required|string|max:255',
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
            $RoadMap = RoadMap::findOrFail($request->id);
            
            $RoadMap->name              = $request->name;
            // $RoadMap->title              = $request->title;
            $RoadMap->details           = $request->details;
            $RoadMap->short_description = $request->short_description;
            $RoadMap->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Road Map Updated Successfully.',
                'responseUrl'     => route('roadmap-list')
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
    * update RoadMap status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->roadMap;
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
    * delete RoadMap
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
       
        $result = $this->roadMap->where('id', $id)->delete();

        if($result){
            
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
