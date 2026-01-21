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
use App\Models\CertificateSoftware;

class CertificateSoftwareController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.certificate_software.';

    protected $type = 'Certificate Software ';


    # Bind outlet
    protected $page;
    protected $certificateSoftware;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            CertificateSoftware          $certificateSoftware
                        )
                        {
                            $this->certificateSoftware = $certificateSoftware;
                            $this->page = config('paginate.pagination');
                        }


    #certificateSoftware page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->certificateSoftware;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * certificateSoftware store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'name'     => 'required|string|max:100',
            'sub_title' => 'nullable|string|max:150',
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
                $file->move(public_path('images/admin/certificateSoftware/'), $filename);
                $imagePath = 'images/admin/certificateSoftware/'.$filename;
            }

            $people = new CertificateSoftware();
            $people->name     = $request->name;
            $people->sub_title = $request->sub_title;
            $people->image     = $imagePath ?? null;
            $people->created_at = now();
            $people->save();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Certificate Software Added Successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }



    /**
     * edit certificateSoftware page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $certificateSoftwareData['data'] = $this->certificateSoftware->findOrFail($id);

            return view($this->view.'edit',$certificateSoftwareData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update certificateSoftware page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'        => 'required|exists:certificate_software,id',
            'name'     => 'required|string|max:100',
            'sub_title' => 'nullable|string|max:150',
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

            $people = CertificateSoftware::findOrFail($request->id);

            // Upload new image if exists
            if ($request->hasFile('image')) {

                // delete old image
                if (!empty($people->image) && file_exists(public_path($people->image))) {
                    unlink(public_path($people->image));
                }

                $file = $request->file('image');
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/certificateSoftware/'), $filename);
                $people->image = 'images/admin/certificateSoftware/'.$filename;
            }

            // Map fields
            $people->name     = $request->name;
            $people->sub_title = $request->sub_title;
            $people->updated_at = now();
            $people->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Certificate Software Updated Successfully.'
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
    * update certificateSoftware status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->certificateSoftware;

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
    * delete certificateSoftware
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        $result = $this->certificateSoftware->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
