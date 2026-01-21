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
use App\Models\Blog;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.blog.';

    protected $type = 'Blog  ';


    # Bind outlet
    protected $page;
    protected $blog;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            Blog          $blog
                        )
                        {
                            $this->blog = $blog;
                            $this->page = config('paginate.pagination');
                        }


    #blog page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->blog;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }

    public function create()
    {
        try
        {
            $categories = BlogCategory::where('status',1)->get();
            return view($this->view.'create',compact('categories'));
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
    * blog store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'category_id'      => 'required|exists:blogs_category,id',
            'title'            => 'required|string|max:255',
            'author'           => 'required|string|max:150',
            'publish_date'     => 'required|date',
            'detail'          => 'required|string',

            'image'            => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'seo_image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'seo_slug'         => 'nullable|string|max:255|unique:blogs,seo_slug',
            'seo_title'        => 'nullable|string|max:255',
            'seo_keywords'     => 'nullable|string|max:255',
            'seo_description'  => 'nullable|string|max:500',
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

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'_blog_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/blogs/'), $filename);
                $imagePath = 'images/admin/blogs/'.$filename;
            }

            if ($request->hasFile('seo_image')) {
                $file = $request->file('seo_image');
                $filename = time().'_seo_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/blogs/seo/'), $filename);
                $seoImagePath = 'images/admin/blogs/seo/'.$filename;
            }

            $blog = new Blog();
            $blog->category_id     = $request->category_id;
            $blog->title           = $request->title;
            $blog->author          = $request->author;
            $blog->publish_date    = $request->publish_date;
            $blog->details         = $request->detail;
            $blog->seo_slug        = $request->seo_slug ?? \Str::slug($request->title);
            $blog->seo_title       = $request->seo_title ?? $request->title;
            $blog->seo_keywords    = $request->seo_keywords;
            $blog->seo_description = $request->seo_description;
            $blog->seo_image       = $seoImagePath ?? null;
            $blog->image           = $imagePath ?? null;
            $blog->created_at      = now();
            $blog->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Blog Added Successfully.',
                'responseUrl'     => route('blog-list')
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
     * edit blog page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $ids = base64_decode($id);
            $blogData['data'] = $this->blog->findOrFail($ids);
            
            $blogData['categories'] = BlogCategory::where('status',1)->get();
            return view($this->view.'edit',$blogData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update blog page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'               => 'required|exists:blogs,id',
            'category_id'      => 'required|exists:blogs_category,id',
            'title'            => 'required|string|max:255',
            'author'           => 'required|string|max:150',
            'publish_date'     => 'required|date',
            'short_detail'     => 'required|string|max:500',
            'detail'           => 'required|string',

            'image'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'seo_image'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'seo_slug'         => 'nullable|string|max:255|unique:blogs,seo_slug,' . $request->id,
            'seo_title'        => 'nullable|string|max:255',
            'seo_keywords'     => 'nullable|string|max:255',
            'seo_description'  => 'nullable|string|max:500',
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
            $blog = Blog::findOrFail($request->id);

            /* ================= BLOG IMAGE ================= */
            if ($request->hasFile('image')) {
                if (!empty($blog->image) && file_exists(public_path($blog->image))) {
                    unlink(public_path($blog->image));
                }

                $file = $request->file('image');
                $filename = time().'_blog_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/blogs/'), $filename);
                $blog->image = 'images/admin/blogs/'.$filename;
            }

            /* ================= SEO IMAGE ================= */
            if ($request->hasFile('seo_image')) {
                if (!empty($blog->seo_image) && file_exists(public_path($blog->seo_image))) {
                    unlink(public_path($blog->seo_image));
                }

                $file = $request->file('seo_image');
                $filename = time().'_seo_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/blogs/seo/'), $filename);
                $blog->seo_image = 'images/admin/blogs/seo/'.$filename;
            }

            /* ================= UPDATE DATA ================= */
            $blog->category_id     = $request->category_id;
            $blog->title           = $request->title;
            $blog->author          = $request->author;
            $blog->publish_date    = $request->publish_date;
            $blog->short_detail    = $request->short_detail;
            $blog->details          = $request->detail;
            // SEO
            $blog->seo_slug        = $request->seo_slug ?? \Str::slug($request->title);
            $blog->seo_title       = $request->seo_title ?? $request->title;
            $blog->seo_keywords    = $request->seo_keywords;
            $blog->seo_description = $request->seo_description;
            $blog->updated_at      = now();
            $blog->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Blog Updated Successfully.',
                'responseUrl'     => route('blog-list')
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
    * update blog status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->blog;
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
    * delete blog
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
       
        $result = $this->blog->where('id', $id)->delete();

        if($result){
            
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
