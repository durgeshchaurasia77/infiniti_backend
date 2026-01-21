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
use App\Models\ClientSatisfation;

class ClientSatisfationController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.client_satisfaction.';
    protected $type = 'Client Satisfation ';


    # Bind outlet
    protected $page;
    protected $clientSatisfation;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            ClientSatisfation          $clientSatisfation
                        )
                        {
                            $this->clientSatisfation = $clientSatisfation;
                            $this->page = config('paginate.pagination');
                        }


    #clientSatisfation page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->clientSatisfation;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * ClientSatisfation store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'name'              => 'required|string|max:100',
            'image'        => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
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


            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'_blog_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/blogs/'), $filename);
                $imagePath = 'images/admin/blogs/'.$filename;
            }


            $ClientSatisfation = new ClientSatisfation();
            $ClientSatisfation->name              = $request->name;
            $ClientSatisfation->image             = $imagePath;
            $ClientSatisfation->short_description = $request->short_description;
            $ClientSatisfation->created_at        = now();
            $ClientSatisfation->save();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Client Satisfation Added Successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }
    /**
     * edit ClientSatisfation page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $details['data'] = $this->clientSatisfation->findOrFail($id);

            return view($this->view.'edit',$details);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update ClientSatisfation page
    * @param Illuminate\Http\Request;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        $rules = [
            'id'               => 'required|exists:client_satisfaction,id',
            'name'              => 'required|string|max:100',
            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'short_description'=> 'required|string|max:500',
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

            $ClientSatisfation = ClientSatisfation::findOrFail($request->id);


            if ($request->hasFile('image')) {
                if (!empty($ClientSatisfation->image) && file_exists(public_path($ClientSatisfation->image))) {
                    unlink(public_path($ClientSatisfation->image));
                }

                $file = $request->file('image');
                $filename = time().'_ClientSatisfation_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/ClientSatisfations/'), $filename);
                $ClientSatisfation->image = 'images/admin/ClientSatisfations/'.$filename;
            }

            // Update fields
            $ClientSatisfation->name              = $request->name;
            $ClientSatisfation->short_description = $request->short_description;
            $ClientSatisfation->updated_at        = now();
            $ClientSatisfation->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Client Satisfation Updated Successfully.',
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
    * update ClientSatisfation status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->clientSatisfation;
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
    * delete clientSatisfation
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
       
        $result = $this->clientSatisfation->where('id', $id)->delete();
        if($result){
            
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
