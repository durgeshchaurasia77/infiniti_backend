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
use App\Models\BlogNews;

class BlogsNewsController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.blogs_news.';

    protected $type = 'Blogs&News ';


    # Bind outlet
    protected $blogs;
    protected $page;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            BlogNews       $blogs
                        )
                        {
                            $this->blogs = $blogs;
                            $this->page  = config('paginate.pagination');
                        }


    #blogs page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->blogs;

        $blogsList = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'blogsList'  => $blogsList ?? [],
                                                ]);
    }
        /**
    * blogs create page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function create(Request $request)
    {

        return view($this->view.'create');
    }
    /**
    * blogs store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request) {
    try {
        $data = [
            'title'       => 'required|string|max:50',
            'blog_image' => 'required|mimes:jpeg,png,jpg,gif',
            'name'        => 'required|string|min:3|max:30',
            'image'       => 'required|mimes:jpeg,png,jpg,gif',
            'description' => 'required|string|max:700',
            'summary'     => 'required|string',
        ];

            $messages = [
                            'required' => 'The :attribute field is required.',
                        ];

            #validator
            $validator = Validator::make($request->all(), $data, $messages);

            #if validation fails
            if($validator->fails())
            {
                return response()->json([
                    'responseCode'=>(string)$this->errorStatus,
                    'responseMessage' => $validator->errors()->first()
                ]);
            }

            # check the requested sub category already exist or not
            $blogsCheck = $this->blogs->where('title', $request->title)
                                    ->first();

            if($blogsCheck)
            {

            return response()->json([
                                    'responseCode'=>(string)$this->errorStatus,
                                    'responseMessage' => 'Sorry, this Blogs&News already exist.'
                                ]);
            }
            #upload blog image
            if ($request->hasfile('blog_image'))
            {
                $file = $request->file('blog_image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = ((string)(microtime(true)*10000)).'.'.$extension;
                $file->move(public_path('images/admin/blogs/image/'), $filename);
                $blogimage='images/admin/blogs/image/'.$filename;
            }else{
                $blogimage = null;
            }

            #upload image
            if ($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = ((string)(microtime(true)*10000)).'.'.$extension;
                $file->move(public_path('images/admin/blogs/'), $filename);
                $image='images/admin/blogs/'.$filename;
            }else{
                $image = null;
            }

            $value                = new $this->blogs;
            $value->title         = $request->title ?? null;
            $value->blog_image    = $blogimage ?? '';
            $value->name          = $request->name ?? null;
            $value->description   = $request->description ?? null;
            $value->summary       = $request->summary ?? null;
            $value->image         = $image;
            $value->created_at    = date('Y-m-d H:i:s');
            $value->save();

            if(isset($value->id))
            {
                return response()->json([
                                (string)$this->responseCode    =>(string)$this->successStatus,
                                (string)$this->responseMessage => 'Blogs&News Added Successfully.',
                                'responseUrl'                  => route('blogs-list')
                            ]);
            }else
            {
                return response()->json([
                                    'responseCode'=>(string)$this->errorStatus,
                                    'responseMessage' => 'Something went wrong.'
                                    ]);
            }

        } catch (Exception $e) {
            return response()->json([
                                    'responseCode'    =>$this->errorStatus,
                                    'responseMessage' => 'Something went wrong.'
                                    ]);
        }
    }

    /**
     * edit blogs page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $blogsData['blogsData'] = $this->blogs->findOrFail($id);

            return view($this->view.'edit',$blogsData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update blogs page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update (Request $request) {

        $rules = [
            'title'       => 'required|string|max:50',
            'blog_image'  => 'nullable|mimes:jpeg,png,jpg,gif',
            'name'        => 'required|string|min:3|max:30',
            'image'       => 'nullable|mimes:jpeg,png,jpg,gif',
            'description' => 'required|string|max:700',
            'summary'     => 'required|string',
        ];

        $messages = [
                            'required' => 'The :attribute field is required.',
                        ];

        #validator
        $validator = Validator::make($request->all(), $rules, $messages);

        #if validation fails
        if($validator->fails())
        {
            return response()->json([
                                    'responseCode'    =>(string)$this->errorStatus,
                                    'responseMessage' => $validator->errors()->first()
                                ]);
        }

        $checkDuplicate = $this->blogs->where('title',$request->title)
                                ->where('id','!=',$request->id)
                                ->first();
        if($checkDuplicate != '')
        {
        return response()->json([
                                            'responseCode'    => (string)$this->errorStatus,
                                            'responseMessage' => 'Sorry, this Blogs&News already exists',
                                        ]);
            }

        $valueData              = $this->blogs->where('id', $request->id)->first();

        if ($request->hasfile('blog_image'))
        {
            $file = $request->file('blog_image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = ((string)(microtime(true)*10000)).'.'.$extension;
            File::delete(public_path($request->image));
            $file->move(public_path('images/admin/blogs/image/'), $filename);
            $blogimage = 'images/admin/blogs/image/'.$filename;
        }else{
            $blogimage = $valueData->blog_image ?? '';
        }

        #upload image
        if ($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = ((string)(microtime(true)*10000)).'.'.$extension;
            File::delete(public_path($request->image));
            $file->move(public_path('images/admin/blogs/'), $filename);
            $image='images/admin/blogs/'.$filename;
        }else{
            $image = $valueData->image ?? '';
        }

        try {

            DB::beginTransaction();


            $value                = $this->blogs->where('id', $request->id)->first();
            $value->title         = $request->title ?? null;
            $value->blog_image    = $blogimage ?? '';
            $value->name          = $request->name ?? null;
            $value->description   = $request->description ?? null;
            $value->summary       = $request->summary ?? null;
            $value->image         = $image;
            $value->updated_at    = date('Y-m-d H:i:s');
            $value->update();
            DB::commit();

            if(isset($value->id))
            {
                return response()->json([
                            'responseCode'    =>(string)$this->successStatus,
                            'responseMessage' => 'Blogs&News Updated Successfully.',
                            'responseUrl'     => route('blogs-list')
                        ]);
            }else
            {
                return response()->json([
                            'responseCode'    =>(string)$this->errorStatus,
                            'responseMessage' => 'Something went wrong.'
                        ]);
            }

        } catch (Exception $e) {

            return response()->json([
                'responseCode'    =>(string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first()
            ]);

        }
    }
    /**
    * update blogs status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->blogs;

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
    * delete blogs
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->blogs->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
