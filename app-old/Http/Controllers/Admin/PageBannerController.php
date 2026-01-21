<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use File;
use Exception;
use App\Models\PageBanner;

class PageBannerController extends Controller
{
    use MessageStatusTrait;
    # Bind location
    protected $view = 'admin.page_banner.';

    protected $type = 'Page Banner ';

    protected $page;

    # Bind outlet
    protected $pageBanner;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(PageBanner $pageBanner)
    {
        $this->pageBanner = $pageBanner;
        $this->page = config('paginate.pagination');
    }


    #page Banner page
    public function index(Request $request)
    {

        # fetch page Banner list
        $query = $this->pageBanner;

        $pageBanners = $query->orderBy('id', 'desc')->paginate($this->page ?? 10);

        return view($this->view . 'index')->with([
            'pageBanners'  => $pageBanners ?? [],
        ]);
    }
    /**
     * store page Banner
     * @param Illuminate\Http\Request;
     * @return Illuminate\Http\Response;
     */
    public function store(Request $request)
    {
        try {
            $data = [
                'page_name' => 'required|string|max:200',
                'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];

            $messages = ['required' => 'The :attribute field is required.'];

            $validator = Validator::make($request->all(), $data, $messages);

            #if validation fails
            if ($validator->fails()) {
                return response()->json([
                    (string)$this->responseCode    => (string)$this->errorStatus,
                    (string)$this->responseMessage => $validator->errors()->first()
                ]);
            }

            # check the requested sub category already exist or not
            $pageBanner = $this->pageBanner->where('page_name', $request->page_name)
                ->first();

            if ($pageBanner) {
                return response()->json([
                    (string)$this->responseCode    => (string)$this->errorStatus,
                    (string)$this->responseMessage => 'Sorry, this Page Banner already exist.'
                ]);
            }

            $imagePath = null;

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = ((string)(microtime(true) * 10000)) . '.' . $extension;
                $file->move(public_path('images/admin/page_banner/'), $filename);
                $imagePath = 'images/admin/page_banner/' . $filename;
            }


            $value      = new $this->pageBanner;
            $value->page_name = $request->page_name ?? null;
            $value->image     = $imagePath ?? null;
            $value->save();

            if (isset($value->id)) {
                return response()->json([
                    (string)$this->responseCode    => (string)$this->successStatus,
                    (string)$this->responseMessage => 'Page Banner Added Successfully.'
                ]);
            } else {
                return response()->json([
                    (string)$this->responseCode    => (string)$this->errorStatus,
                    (string)$this->responseMessage => 'Something went wrong.'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'responseCode'    => $this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }

    /**
     * edit page Banner
     * @param Illuminate\Http\Request;
     * @return Illuminate\Http\Response;
     */
    public function edit($id)
    {
        try {
            $pageBannerData['pageBannerData'] = PageBanner::findOrFail($id);

            return view($this->view . 'edit', $pageBannerData);
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    /**
     * update Banner
     * @param Illuminate\Http\Request;
     * @return Illuminate\Http\Response;
     */
    public function update(Request $request)
    {
        $rules = [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $messages = ['required' => 'The :attribute field is required.'];

        #validator
        $validator = Validator::make($request->all(), $rules, $messages);

        #if validation fails
        if ($validator->fails()) {
            return response()->json([
                (string)$this->responseCode    => (string)$this->errorStatus,
                (string)$this->responseMessage => $validator->errors()->first()
            ]);
        }
        //   check duplicate

        try {

            DB::beginTransaction();

            $value = PageBanner::where('id', $request->id)->first();

            $imagePath = $value->image;
            if ($request->hasfile('image')) {

                if (!empty($value->image) && file_exists(public_path($value->image))) {
                    unlink(public_path($value->image));
                }
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = ((string)(microtime(true) * 10000)) . '.' . $extension;
                $file->move(public_path('images/admin/page_banner/'), $filename);
                $imagePath = 'images/admin/page_banner/' . $filename;
            }

            $value->image  = $imagePath ?? null;
            $value->update();
            DB::commit();

            if (isset($value->id)) {
                return response()->json([
                    (string)$this->responseCode    => (string)$this->successStatus,
                    (string)$this->responseMessage => 'Page Banner Updated Successfully.'
                ]);
            } else {
                return response()->json([
                    (string)$this->responseCode    => (string)$this->errorStatus,
                    (string)$this->responseMessage => 'Something went wrong.'
                ]);
            }
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                (string)$this->responseCode    => (string)$this->errorStatus,
                (string)$this->responseMessage => $validator->errors()->first(),
                // 'error' => $e->getMessage()
            ]);
        }
    }
    /**
     * update status of page Banner
     * @param Illuminate\Http\Request;
     * @return Illuminate\Http\Response;
     */
    public function status($id)
    {
        # initiate constructor
        $query = $this->pageBanner;

        # get the status
        $status = $query->where('id', $id)->first()->status;

        # check status, if active
        if ($status == '1') {
            #message
            $message = $this->inActiveMessage($this->type);

            # deactive( update status to zero)
            $statusCode = '0';
        } else {
            #message
            $message = $this->activeMessage($this->type);

            # active( update status to one)
            $statusCode = '1';
        }

        # update status code
        $query->where('id', $id)->update(['status' => $statusCode]);

        # return success
        return [$this->successKey => $this->successStatus, $this->messageKey => $message];
    }
    /**
     * delete page Banner
     * @param Illuminate\Http\Request;
     * @return Illuminate\Http\Response;
     */
    public function delete(Request $request, $id)
    {
        // dd($id);
        # delete role by id
        $result = $this->pageBanner->where('id', $id)->first();
        if (!empty($result->image)   && file_exists(public_path($result->image))) {
            unlink(public_path($result->image));
        }

        $result = $this->pageBanner->where('id', $id)->delete();

        if ($result) {
            # return success
            return  [$this->successKey  =>  $this->successStatus,  $this->messageKey  => $this->deleteMessage($this->type)];
        } else {
            return  [$this->successKey  =>  $this->errorStatus,  $this->messageKey  => $this->deleteMessage($this->type)];
        }
    }
}
