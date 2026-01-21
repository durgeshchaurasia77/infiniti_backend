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
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.blog_category.';

    protected $type = 'Blog Category ';


    # Bind outlet
    protected $page;
    protected $blogCategory;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            BlogCategory          $blogCategory
                        )
                        {
                            $this->blogCategory = $blogCategory;
                            $this->page = config('paginate.pagination');
                        }


    #blogCategory page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->blogCategory;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * blogCategory store
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


            $people = new BlogCategory();
            $people->name     = $request->name;
            $people->created_at = now();
            $people->save();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Blog Category Added Successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'.$e->getMessage(),
            ]);
        }
    }



    /**
     * edit blogCategory page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $blogCategoryData['data'] = $this->blogCategory->findOrFail($id);

            return view($this->view.'edit',$blogCategoryData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update blogCategory page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'        => 'required|exists:blogs_category,id',
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

            $people = BlogCategory::findOrFail($request->id);

            $people->name     = $request->name;
            $people->updated_at = now();
            $people->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Blog Category Updated Successfully.'
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
    * update blogCategory status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->blogCategory;
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
    * delete blogCategory
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
       
        $result = $this->blogCategory->where('id', $id)->delete();

        if($result){
            
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
