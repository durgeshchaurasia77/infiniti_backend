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
use App\Models\AdvanceAi;

class AdvanceAiController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.advance_ai.';
    protected $type = 'Advance Ai  ';


    # Bind outlet
    protected $page;
    protected $advanceAi;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            AdvanceAi          $advanceAi
                        )
                        {
                            $this->advanceAi = $advanceAi;
                            $this->page = config('paginate.pagination');
                        }


    #advanceAi page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->advanceAi;

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
    * AdvanceAi store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'name'   => 'required|string|max:255',
            'image'  => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            // 'title'             => 'required|string|max:255',
            // 'short_description' => 'required|string|max:500',
            'details'=> 'required|array',

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
                $filename = time().'_advance_ai_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/advance_ai/'), $filename);
                $imagePath = 'images/admin/advance_ai/'.$filename;
            }


            $AdvanceAi = new AdvanceAi();
            $AdvanceAi->name     = $request->name;
            // $AdvanceAi->title     = $request->title;
            $AdvanceAi->features         = $request->details;
            // $AdvanceAi->short_description = $request->short_description;
            $AdvanceAi->image           = $imagePath ?? null;
            $AdvanceAi->created_at      = now();
            $AdvanceAi->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Advance Ai Added Successfully.',
                'responseUrl'     => route('advance-ai-list')
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
     * edit AdvanceAi page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $ids = base64_decode($id);
            $details['data'] = $this->advanceAi->findOrFail($ids);
            return view($this->view.'edit',$details);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update AdvanceAi page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'      => 'required|exists:advance_ai,id',
            'name'    => 'required|string|max:255',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            // 'title'             => 'required|string|max:255',
            // 'short_description'=> 'required|string|max:500',
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

            $AdvanceAi = AdvanceAi::findOrFail($request->id);
            


             if ($request->hasFile('image')) {

            if (!empty($AdvanceAi->image) && file_exists(public_path($AdvanceAi->image))) {
                unlink(public_path($AdvanceAi->image));
            }

            $file = $request->file('image');
                $filename = time().'_AdvanceAi_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/advance_ai/'), $filename);
                $AdvanceAi->image = 'images/admin/advance_ai/'.$filename;
            }

            $AdvanceAi->name              = $request->name;
            // $AdvanceAi->title             = $request->title;
            $AdvanceAi->features           = $request->details;
            // $AdvanceAi->short_description = $request->short_description;
            $AdvanceAi->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Advance Ai Updated Successfully.',
                'responseUrl'     => route('advance-ai-list')
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
    * update AdvanceAi status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->advanceAi;
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
    * delete advanceAiadvanceAi
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
       
        $result = $this->advanceAi->where('id', $id)->delete();

        if($result){
            
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
