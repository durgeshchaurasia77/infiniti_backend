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
use App\Models\ServiceCategory;

class ServiceCategoryController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.service_category.';

    protected $type = 'Service Category ';


    # Bind outlet
    protected $page;
    protected $serviceCategory;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            ServiceCategory          $serviceCategory
                        )
                        {
                            $this->serviceCategory = $serviceCategory;
                            $this->page = config('paginate.pagination');
                        }


    #serviceCategory page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->serviceCategory;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * serviceCategory store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'name'     => 'required|string|max:100',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {


            $people = new ServiceCategory();
            $people->name     = $request->name;
            $people->created_at = now();
            $people->save();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Service Category Added Successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }



    /**
     * edit serviceCategory page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $serviceCategoryData['data'] = $this->serviceCategory->findOrFail($id);

            return view($this->view.'edit',$serviceCategoryData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update serviceCategory page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'        => 'required|exists:service_category,id',
            'name'     => 'required|string|max:100',
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

            $people = ServiceCategory::findOrFail($request->id);

            $people->name     = $request->name;
            $people->updated_at = now();
            $people->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Service Category Updated Successfully.'
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
    * update serviceCategory status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->serviceCategory;
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
    * delete serviceCategory
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {

        $result = $this->serviceCategory->where('id', $id)->delete();

        if($result){

            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
