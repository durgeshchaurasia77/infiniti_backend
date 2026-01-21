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
use App\Models\FameMobileApp;

class FameMobileAppController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.fame_mobile_app.';

    protected $type = 'Fame Mobile App ';

    # Bind outlet
    protected $page;
    protected $fameMobileApp;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            FameMobileApp          $fameMobileApp
                        )
                        {
                            $this->fameMobileApp = $fameMobileApp;
                            $this->page = config('paginate.pagination');
                        }


    #fameMobileApp page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->fameMobileApp;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * fameMobileApp store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'name'      => 'required|string|min:2|max:50',
            'title'     => 'required|string|max:100',
            'image'     => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
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
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/fame_mobile_app/'), $filename);
                $imagePath = 'images/admin/fame_mobile_app/'.$filename;
            }

            $people = new FameMobileApp();
            $people->name      = $request->name;
            $people->title     = $request->title;
            // $people->sub_title = $request->sub_title;
            $people->image     = $imagePath ?? null;
            $people->created_at = now();
            $people->save();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Fame Mobile App Added Successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }



    /**
     * edit fameMobileApp page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $fameMobileAppData['data'] = $this->fameMobileApp->findOrFail($id);

            return view($this->view.'edit',$fameMobileAppData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update fameMobileApp page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'        => 'required|exists:fame_mobile_app,id',
            'name'      => 'required|string|min:2|max:50',
            'title'     => 'required|string|max:100',
            // 'sub_title' => 'nullable|string|max:150',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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

            $people = fameMobileApp::findOrFail($request->id);

            // Upload new image if exists
            if ($request->hasFile('image')) {

                // delete old image
                if (!empty($people->image) && file_exists(public_path($people->image))) {
                    unlink(public_path($people->image));
                }

                $file = $request->file('image');
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/fame_mobile_app/'), $filename);
                $people->image = 'images/admin/fame_mobile_app/'.$filename;
            }

            // Map fields
            $people->name      = $request->name;
            $people->title     = $request->title;
            // $people->sub_title = $request->sub_title;
            $people->updated_at = now();
            $people->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Fame Mobile App Updated Successfully.'
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
    * update fameMobileApp status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->fameMobileApp;
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
    * delete fameMobileApp
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
       
        $result = $this->fameMobileApp->where('id', $id)->delete();
        if($result){
            
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
