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
use App\Models\Service;

class ServiceController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.service.';
    protected $type = 'Service  ';


    # Bind outlet
    protected $page;
    protected $service;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            Service          $service
                        )
                        {
                            $this->service = $service;
                            $this->page = config('paginate.pagination');
                        }


    #service page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->service;

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
    * service store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'name'              => 'required|string|max:255',
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'details'           => 'required|array',

            'seo_slug'        => 'nullable|string|max:255|unique:services,seo_slug',
            'seo_title'       => 'nullable|string|max:255',
            'seo_keywords'    => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'seo_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

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
                $filename = time().'_service_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/services/'), $filename);
                $imagePath = 'images/admin/services/'.$filename;
            }

            /** SEO Image */
            if ($request->hasFile('seo_image')) {
                $file = $request->file('seo_image');
                $filename = time().'_seo_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/services/seo/'), $filename);
                $seoImagePath = 'images/admin/services/seo/'.$filename;
            }

            $service = new Service();
            $service->name     = $request->name;
            $service->title     = $request->title;
            $service->features         = $request->details;
            $service->short_description = $request->short_description;

            $service->seo_slug        = $request->seo_slug ?? \Str::slug($request->title);
            $service->seo_title       = $request->seo_title ?? $request->title;
            $service->seo_keywords    = $request->seo_keywords;
            $service->seo_description = $request->seo_description;
            $service->seo_image       = $seoImagePath ?? null;
            $service->image           = $imagePath ?? null;
            $service->created_at      = now();
            $service->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Service Added Successfully.',
                'responseUrl'     => route('service-list')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'.$e->getMessage(),
            ]);
        }
    }

    /**
     * edit service page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $ids = base64_decode($id);
            $details['data'] = $this->service->findOrFail($ids);
            return view($this->view.'edit',$details);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update service page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'               => 'required|exists:services,id',
            'name'             => 'required|string|max:255',
            'title'             => 'required|string|max:255',
            'short_description'=> 'required|string|max:500',
            'details'          => 'required|array',
            'seo_slug'        => 'nullable|string|max:255',
            'seo_title'       => 'nullable|string|max:255',
            'seo_keywords'    => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:500',
            'seo_image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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

            $service = Service::findOrFail($request->id);
            


             if ($request->hasFile('image')) {

            if (!empty($service->image) && file_exists(public_path($service->image))) {
                unlink(public_path($service->image));
            }

            $file = $request->file('image');
                $filename = time().'_service_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/services/'), $filename);
                $service->image = 'images/admin/services/'.$filename;
            }

            if ($request->hasFile('seo_image')) {

            if (!empty($service->seo_image) && file_exists(public_path($service->seo_image))) {
                unlink(public_path($service->seo_image));
            }

                $file = $request->file('seo_image');
                $filename = time().'_seo_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/services/seo/'), $filename);
                $service->seo_image = 'images/admin/services/seo/'.$filename;
            }

            $service->name              = $request->name;
            $service->title             = $request->title;
            $service->features           = $request->details;
            $service->short_description = $request->short_description;
            $service->seo_slug        = $request->seo_slug ?? \Str::slug($request->title);
            $service->seo_title       = $request->seo_title ?? $request->title;
            $service->seo_keywords    = $request->seo_keywords;
            $service->seo_description = $request->seo_description;
            $service->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Service Updated Successfully.',
                'responseUrl'     => route('service-list')
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
    * update service status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->service;
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
    * delete service
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
       
        $result = $this->service->where('id', $id)->delete();

        if($result){
            
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
