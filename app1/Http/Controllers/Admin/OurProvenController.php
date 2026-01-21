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
use App\Models\OurProven;

class OurProvenController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.our_proven.';
    protected $type = 'Our Proven  ';


    # Bind outlet
    protected $page;
    protected $ourProven;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            OurProven          $ourProven
                        )
                        {
                            $this->ourProven = $ourProven;
                            $this->page = config('paginate.pagination');
                        }


    #ourProven page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->ourProven;

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
    * OurProven store
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

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'_OurProven_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/our_proven/'), $filename);
                $imagePath = 'images/admin/our_proven/'.$filename;
            }


            $OurProven = new OurProven();
            $OurProven->name     = $request->name;
            // $OurProven->title     = $request->title;
            $OurProven->features         = $request->details;
            $OurProven->short_description = $request->short_description;
            // $OurProven->image           = $imagePath ?? null;
            $OurProven->created_at      = now();
            $OurProven->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Our Proven Added Successfully.',
                'responseUrl'     => route('our-proven-list')
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
     * edit OurProven page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $ids = base64_decode($id);
            $details['data'] = $this->ourProven->findOrFail($ids);
            return view($this->view.'edit',$details);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update OurProven page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'               => 'required|exists:our_proven,id',
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

            $OurProven = OurProven::findOrFail($request->id);
            


             if ($request->hasFile('image')) {

            if (!empty($OurProven->image) && file_exists(public_path($OurProven->image))) {
                unlink(public_path($OurProven->image));
            }

            $file = $request->file('image');
                $filename = time().'_OurProven_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/our_proven/'), $filename);
                $OurProven->image = 'images/admin/our_proven/'.$filename;
            }

            $OurProven->name              = $request->name;
            // $OurProven->title             = $request->title;
            $OurProven->features           = $request->details;
            $OurProven->short_description = $request->short_description;
            $OurProven->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'OurProven Updated Successfully.',
                'responseUrl'     => route('our-proven-list')
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
    * update OurProven status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->ourProven;
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
    * delete OurProven
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
       
        $result = $this->ourProven->where('id', $id)->delete();

        if($result){
            
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
