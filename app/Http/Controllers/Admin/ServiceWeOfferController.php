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
use App\Models\ServiceWeOffer;
use App\Models\ServiceCategory;

class ServiceWeOfferController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.service_we_offer.';
    protected $type = 'Service We Offer ';


    # Bind outlet
    protected $page;
    protected $serviceWeOffer;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            ServiceWeOffer          $serviceWeOffer
                        )
                        {
                            $this->serviceWeOffer = $serviceWeOffer;
                            $this->page = config('paginate.pagination');
                        }


    #ServiceWeOffer page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->serviceWeOffer;


        $categories  = ServiceCategory::where('status',1)->get();
        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                'categories' => $categories ?? [],
                                                ]);
    }
    /**
    * ServiceWeOffer store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'category_id'       => 'required',
            'name'              => 'required|string|max:100',
            'short_description' => 'required|string|max:500',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {


            $ServiceWeOffer = new ServiceWeOffer();
            $ServiceWeOffer->category_id     = $request->category_id;
            $ServiceWeOffer->name              = $request->name;
            $ServiceWeOffer->short_description = $request->short_description;
            $ServiceWeOffer->created_at        = now();
            $ServiceWeOffer->save();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Service We Offer Added Successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }
    /**
     * edit ServiceWeOffer page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $details['data'] = $this->serviceWeOffer->findOrFail($id);
            $details['categories'] = ServiceCategory::where('status',1)->get();

            return view($this->view.'edit',$details);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update ServiceWeOffer page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        $rules = [
            'id'                => 'required|exists:service_we_offer,id',
            'category_id'       => 'required',
            'name'              => 'required|string|max:100',
            'short_description' => 'required|string|max:500',
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

            $ServiceWeOffer = ServiceWeOffer::findOrFail($request->id);

            // Update fields
            $ServiceWeOffer->category_id     = $request->category_id;
            $ServiceWeOffer->name              = $request->name;
            $ServiceWeOffer->short_description = $request->short_description;
            $ServiceWeOffer->updated_at        = now();
            $ServiceWeOffer->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Service We Offer Updated Successfully.',
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
    * update ServiceWeOffer status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->serviceWeOffer;
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
    * delete ServiceWeOffer
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {

        $result = $this->serviceWeOffer->where('id', $id)->delete();
        if($result){

            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
