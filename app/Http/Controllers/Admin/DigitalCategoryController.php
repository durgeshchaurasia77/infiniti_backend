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
use App\Models\DigitalCategory;

class DigitalCategoryController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.digital_category.';

    protected $type = 'Digital Category ';


    # Bind outlet
    protected $page;
    protected $digitalCategory;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            DigitalCategory          $digitalCategory
                        )
                        {
                            $this->digitalCategory = $digitalCategory;
                            $this->page = config('paginate.pagination');
                        }


    #digitalCategory page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->digitalCategory;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * digitalCategory store
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


            $people = new DigitalCategory();
            $people->name     = $request->name;
            $people->created_at = now();
            $people->save();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Digital Category Added Successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }



    /**
     * edit digitalCategory page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $digitalCategoryData['data'] = $this->digitalCategory->findOrFail($id);

            return view($this->view.'edit',$digitalCategoryData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update digitalCategory page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'        => 'required|exists:digital_category,id',
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

            $people = DigitalCategory::findOrFail($request->id);

            $people->name     = $request->name;
            $people->updated_at = now();
            $people->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Digital Category Updated Successfully.'
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
    * update digitalCategory status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->digitalCategory;
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
    * delete digitalCategory
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {

        $result = $this->digitalCategory->where('id', $id)->delete();

        if($result){

            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
