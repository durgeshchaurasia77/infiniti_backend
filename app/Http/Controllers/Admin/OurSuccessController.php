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
use App\Models\OurSuccess;

class OurSuccessController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.our_success.';

    protected $type = 'Our Success ';


    # Bind outlet
    protected $page;
    protected $ourSuccess;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            OurSuccess          $ourSuccess
                        )
                        {
                            $this->ourSuccess = $ourSuccess;
                            $this->page = config('paginate.pagination');
                        }


    #Oursuccess page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->ourSuccess;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * Oursuccess store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'name'  => 'required|string|max:255',
            'image' => 'required|file|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string) $this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {


            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'_blog_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/success/'), $filename);
                $imagePath = 'images/admin/success/'.$filename;
            }

            $success = new OurSuccess();
            $success->name       = $request->name;
            $success->image      = $imagePath;
            $success->status     = 1;
            $success->created_at = now();
            $success->save();

            return response()->json([
                'responseCode'    => (string) $this->successStatus,
                'responseMessage' => 'Our Success Added Successfully.',
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'responseCode'    => (string) $this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }




    /**
     * edit Oursuccess page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $OursuccessData['data'] = $this->ourSuccess->findOrFail($id);

            return view($this->view.'edit',$OursuccessData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update Oursuccess page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'                => 'required|exists:our_success,id',
            'name'             => 'required|string|max:255',
            'image'             => 'nullable|string|max:255',
            'status'            => 'required|boolean',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string) $this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {
            DB::beginTransaction();

            $success = OurSuccess::findOrFail($request->id);


            if ($request->hasFile('image')) {
                if (!empty($success->image) && file_exists(public_path($success->image))) {
                    unlink(public_path($success->image));
                }

                $file = $request->file('image');
                $filename = time().'_success_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/success/'), $filename);
                $success->image = 'images/admin/success/'.$filename;
            }

            $success->name             = $request->name;
            $success->status            = $request->status ?? $success->status;
            $success->updated_at        = now();
            $success->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string) $this->successStatus,
                'responseMessage' => 'Our Success Updated Successfully.',
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'responseCode'    => (string) $this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }


    /**
    * update Oursuccess status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->ourSuccess;
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
    * delete Oursuccess
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {

        $result = $this->ourSuccess->where('id', $id)->delete();

        if($result){
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
