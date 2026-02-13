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
use App\Models\PortfolioBanner;

class PortfolioBannerController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.portfolio_banner.';

    protected $type = 'Portfolio Banner ';


    # Bind outlet
    protected $page;
    protected $portfolioBanner;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            PortfolioBanner          $portfolioBanner
                        )
                        {
                            $this->portfolioBanner = $portfolioBanner;
                            $this->page = config('paginate.pagination');
                        }


    #WeDeliver page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->portfolioBanner;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * WeDeliver store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'name'            => 'required|string|max:100',
            'short_description' => 'required|string|max:150',
            'image'           => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
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
                $file->move(public_path('images/admin/portfolio_banner/'), $filename);
                $imagePath = 'images/admin/portfolio_banner/'.$filename;
            }

            $deliver = new PortfolioBanner();
            $deliver->name     = $request->name;
            $deliver->growth     = $request->growth;
            $deliver->result     = $request->result;
            $deliver->short_description = $request->short_description;
            $deliver->image     = $imagePath ?? null;
            $deliver->created_at = now();
            $deliver->save();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Portfolio Banner Added Successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }



    /**
     * edit WeDeliver page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $WeDeliverData['data'] = $this->portfolioBanner->findOrFail($id);

            return view($this->view.'edit',$WeDeliverData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update WeDeliver page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'              => 'required|exists:portfolio_banner,id',
            'name'            => 'required|string|max:100',
            'short_description' => 'required|string|max:150',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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

            $deliver = PortfolioBanner::findOrFail($request->id);

            // Upload new image if exists
            if ($request->hasFile('image')) {

                // delete old image
                if (!empty($deliver->image) && file_exists(public_path($deliver->image))) {
                    unlink(public_path($deliver->image));
                }

                $file = $request->file('image');
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/portfolio_banner/'), $filename);
                $deliver->image = 'images/admin/portfolio_banner/'.$filename;
            }

            // Map fields
            $deliver->name       = $request->name;
            $deliver->growth     = $request->growth;
            $deliver->result     = $request->result;
            $deliver->short_description = $request->short_description;
            $deliver->updated_at = now();
            $deliver->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Portfolio Banner Updated Successfully.'
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
    * update WeDeliver status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->portfolioBanner;

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
    * delete WeDeliver
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        $result = $this->portfolioBanner->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
