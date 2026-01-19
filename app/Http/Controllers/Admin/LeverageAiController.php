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
use App\Models\LeverageAi;

class LeverageAiController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.leverage_ai.';

    protected $type = 'Leverage Ai ';


    # Bind outlet
    protected $page;
    protected $leverageAi;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            LeverageAi          $leverageAi
                        )
                        {
                            $this->leverageAi = $leverageAi;
                            $this->page = config('paginate.pagination');
                        }


    #LeverageAi page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->leverageAi;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * LeverageAi store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'name'              => 'required|string|max:100',
            'short_description' => 'required|string|max:500',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {

            // Upload image
            // if ($request->hasFile('image')) {
            //     $file = $request->file('image');
            //     $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            //     $file->move(public_path('images/admin/case-studies/'), $filename);
            //     $imagePath = 'images/admin/case-studies/' . $filename;
            // }

            $LeverageAi = new LeverageAi();
            $LeverageAi->name              = $request->name;
            $LeverageAi->short_description = $request->short_description;
            // $LeverageAi->image             = $imagePath ?? null;
            $LeverageAi->created_at        = now();
            $LeverageAi->save();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Leverage Ai Added Successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }
    /**
     * edit LeverageAi page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $details['data'] = $this->leverageAi->findOrFail($id);

            return view($this->view.'edit',$details);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update LeverageAi page
    * @param Illuminate\Http\Request;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        $rules = [
            'id'                => 'required|exists:leverage_ai,id',
            'name'              => 'required|string|max:100',
            'short_description' => 'required|string|max:500',
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

            $LeverageAi = LeverageAi::findOrFail($request->id);

            // Replace image if new uploaded
            // if ($request->hasFile('image')) {

            //     if (!empty($LeverageAi->image) && file_exists(public_path($LeverageAi->image))) {
            //         unlink(public_path($LeverageAi->image));
            //     }

            //     $file = $request->file('image');
            //     $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            //     $file->move(public_path('images/admin/case-studies/'), $filename);
            //     $LeverageAi->image = 'images/admin/case-studies/' . $filename;
            // }

            // Update fields
            $LeverageAi->name              = $request->name;
            $LeverageAi->short_description = $request->short_description;
            $LeverageAi->updated_at        = now();
            $LeverageAi->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Leverage Ai Updated Successfully.',
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
    * update LeverageAi status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->leverageAi;
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
    * delete LeverageAi
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
       
        $result = $this->leverageAi->where('id', $id)->delete();

        if($result){
            
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
