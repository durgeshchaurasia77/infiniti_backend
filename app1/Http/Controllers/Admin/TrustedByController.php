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
use App\Models\TrustedBy;

class TrustedByController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.trusted_by.';

    protected $type = 'Trusted By ';


    # Bind outlet
    protected $page;
    protected $data;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            TrustedBy $data
                        )
                        {
                            $this->data = $data;
                            $this->page = config('paginate.pagination');
                        }


    #data page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->data;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * data store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        try {
            $rules = [
                'name'  => 'required|string|min:3|max:50',
                'image' => 'required|mimes:jpeg,png,jpg,webp|max:20480',
            ];

            $messages = [
                'required' => 'The :attribute field is required.',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'responseCode'    => (string)$this->errorStatus,
                    'responseMessage' => $validator->errors()->first()
                ]);
            }

            // Upload image
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/admin/data/'), $filename);
                $imagePath = 'images/admin/data/' . $filename;
            }

            $data = new $this->data;
            $data->name   = $request->name;
            $data->image  = $imagePath ?? null;
            $data->created_at  = now();
            $data->save();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Item Added Successfully.',
                'responseUrl'     => route('trustedby-list')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }


    /**
     * edit data page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $data['data'] = $this->data->findOrFail($id);

            return view($this->view.'edit',$data);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update data page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'    => 'required|exists:trusted_by,id',
            'name'  => 'required|string|min:3|max:50',
            'image' => 'nullable|mimes:jpeg,png,jpg,webp|max:20480',
        ];

        $messages = [
            'required' => 'The :attribute field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first()
            ]);
        }

        try {
            DB::beginTransaction();

            $data = $this->data->find($request->id);

            if ($request->hasFile('image')) {
                if (!empty($data->image) && file_exists(public_path($data->image))) {
                    unlink(public_path($data->image));
                }
                $file = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/admin/data/'), $filename);
                $data->image = 'images/admin/data/' . $filename;
            }

            $data->name        = $request->name;
            $data->updated_at  = now();
            $data->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Item Updated Successfully.',
                'responseUrl'     => route('trustedby-list')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }
    /**
    * update data status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->data;

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
    * delete data
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->data->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
