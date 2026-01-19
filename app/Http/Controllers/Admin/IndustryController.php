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
use App\Models\Industry;

class IndustryController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.industry.';

    protected $type = 'Industry  ';


    # Bind outlet
    protected $page;
    protected $industry;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            Industry          $industry
                        )
                        {
                            $this->industry = $industry;
                            $this->page = config('paginate.pagination');
                        }


    #industry page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->industry;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }

    public function create()
    {
        try
        {
            return view($this->view.'create');
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
    * industry store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'header_title'             => 'required|string|max:255',
            'header_short_description' => 'required|string|max:500',

            'title'        => 'required|string|max:255',
            'publish_date' => 'required|date',
            'short_description' => 'required|string',

            'image'        => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video'        => 'nullable|string|max:255',

            'seo_slug'        => 'nullable|string|max:255|unique:industry,seo_slug',
            'seo_title'       => 'nullable|string|max:255',
            'seo_keywords'    => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'seo_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'status' => 'required|in:0,1',
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

            /** Industry Image */
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'_industry_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/industrys/'), $filename);
                $imagePath = 'images/admin/industrys/'.$filename;
            }

            /** SEO Image */
            if ($request->hasFile('seo_image')) {
                $file = $request->file('seo_image');
                $filename = time().'_seo_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/industrys/seo/'), $filename);
                $seoImagePath = 'images/admin/industrys/seo/'.$filename;
            }

            $industry = new Industry();
            $industry->header_title             = $request->header_title;
            $industry->header_short_description = $request->header_short_description;
            $industry->title                    = $request->title;
            // $industry->publish_date             = $request->publish_date;
            $industry->short_description        = $request->short_description;
            $industry->video                    = $request->video;
            $industry->status                   = $request->status;

            $industry->seo_slug        = $request->seo_slug ?? \Str::slug($request->title);
            $industry->seo_title       = $request->seo_title ?? $request->title;
            $industry->seo_keywords    = $request->seo_keywords;
            $industry->seo_description = $request->seo_description;
            $industry->seo_image       = $seoImagePath ?? null;
            $industry->image           = $imagePath ?? null;

            $industry->created_at = now();
            $industry->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Industry added successfully.',
                'responseUrl'     => route('industry-list')
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
     * edit industry page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $ids = base64_decode($id);
            $details['data'] = $this->industry->findOrFail($ids);
            
            return view($this->view.'edit',$details);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update industry page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
public function update(Request $request, $id)
{
    $industry = Industry::findOrFail($id);

    $rules = [
        'header_title'             => 'required|string|max:255',
        'header_short_description' => 'required|string|max:500',

        'title'        => 'required|string|max:255',
        'publish_date' => 'required|date',
        'short_description' => 'required|string',

        'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'video'     => 'nullable|string|max:255',

        'seo_slug'        => 'nullable|string|max:255|unique:industry,seo_slug,' . $industry->id,
        'seo_title'       => 'nullable|string|max:255',
        'seo_keywords'    => 'nullable|string|max:255',
        'seo_description' => 'nullable|string|max:500',
        'seo_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        'status' => 'required|in:0,1',
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

        /** Industry Image */
        if ($request->hasFile('image')) {

            if (!empty($industry->image) && file_exists(public_path($industry->image))) {
                unlink(public_path($industry->image));
            }

            $file = $request->file('image');
            $filename = time().'_industry_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/admin/industrys/'), $filename);
            $industry->image = 'images/admin/industrys/'.$filename;
        }

        /** SEO Image */
        if ($request->hasFile('seo_image')) {

            if (!empty($industry->seo_image) && file_exists(public_path($industry->seo_image))) {
                unlink(public_path($industry->seo_image));
            }

            $file = $request->file('seo_image');
            $filename = time().'_seo_'.uniqid().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('images/admin/industrys/seo/'), $filename);
            $industry->seo_image = 'images/admin/industrys/seo/'.$filename;
        }

        $industry->header_title             = $request->header_title;
        $industry->header_short_description = $request->header_short_description;
        $industry->title                    = $request->title;
        // $industry->publish_date             = $request->publish_date;
        $industry->short_description        = $request->short_description;
        $industry->video                    = $request->video;
        $industry->status                   = $request->status;

        $industry->seo_slug        = $request->seo_slug ?? \Str::slug($request->title);
        $industry->seo_title       = $request->seo_title ?? $request->title;
        $industry->seo_keywords    = $request->seo_keywords;
        $industry->seo_description = $request->seo_description;

        $industry->updated_at = now();
        $industry->save();

        DB::commit();

        return response()->json([
            'responseCode'    => (string)$this->successStatus,
            'responseMessage' => 'Industry updated successfully.',
            'responseUrl'     => route('industry-list')
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
    * update industry status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->industry;
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
    * delete industry
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
       
        $result = $this->industry->where('id', $id)->delete();

        if($result){
            
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
