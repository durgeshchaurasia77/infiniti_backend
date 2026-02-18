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
use App\Models\WhyPartner;
use App\Models\DigitalCategory;
use Illuminate\Validation\Rule;
class WhyPartnerController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.why_partner.';

    protected $type = 'Why Partner  ';


    # Bind outlet
    protected $whyPartner;
    protected $page;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            WhyPartner        $whyPartner,
                        )
                        {
                            $this->whyPartner= $whyPartner;
                            $this->page          = config('paginate.pagination');
                        }




    public function index(Request $request) {

        # fetch setting list
        $query = $this->whyPartner;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        $categories  = DigitalCategory::where('status',1)->get();
        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                'categories' => $categories ?? [],
                                                ]);
    }
    public function store(Request $request)
    {
        $rules = [
            'category_id'=>'required',
            'heading_one'            => 'nullable|string|max:255',
            'short_description_one'  => 'nullable|string',
            'heading_two'            => 'nullable|string|max:255',
            'short_description_two'  => 'nullable|string',
            'heading_three'          => 'nullable|string|max:255',
            'short_description_three'=> 'nullable|string',
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

            // $whyPartner = WhyPartner::firstOrNew(['id' => 1]);

            // $whyPartner->fill($request->only([
            //     'heading_one',
            //     'short_description_one',
            //     'heading_two',
            //     'short_description_two',
            //     'heading_three',
            //     'short_description_three',
            // ]));

            $whyPartner = new WhyPartner();
            $whyPartner->category_id     = $request->category_id;
            $whyPartner->heading_one     = $request->heading_one;
            $whyPartner->short_description_one     = $request->short_description_one;
            $whyPartner->heading_two     = $request->heading_two;
            $whyPartner->short_description_two     = $request->short_description_two;
            $whyPartner->heading_three     = $request->heading_three;
            $whyPartner->short_description_three     = $request->short_description_three;

            $whyPartner->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Why Partner section updated successfully.',
                'responseUrl'     => route('why-partner-list')
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
     * edit Home whyPartner edit page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request ,$id)
    {
        try
        {
            $details['whyPartner'] = $this->whyPartner->where('id',$id)->first();
            $details['categories']  = DigitalCategory::where('status',1)->get();
            return view($this->view.'edit', $details);
        } catch (Exception $e) {
            return response()->json([
                'responseCode'    =>  (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }

    /**
     * update Home excellanceCounting page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        $rules = [
            'heading_one'            => 'nullable|string|max:255',
            'short_description_one'  => 'nullable|string',
            'heading_two'            => 'nullable|string|max:255',
            'short_description_two'  => 'nullable|string',
            'heading_three'          => 'nullable|string|max:255',
            'short_description_three'=> 'nullable|string',
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
            $whyPartner = whyPartner::findOrFail($request->id);

            $whyPartner->category_id     = $request->category_id;
            $whyPartner->heading_one     = $request->heading_one;
            $whyPartner->short_description_one     = $request->short_description_one;
            $whyPartner->heading_two     = $request->heading_two;
            $whyPartner->short_description_two     = $request->short_description_two;
            $whyPartner->heading_three     = $request->heading_three;
            $whyPartner->short_description_three     = $request->short_description_three;

            $whyPartner->save();

            // $whyPartner->fill($request->only([
            //     'heading_one',
            //     'short_description_one',
            //     'heading_two',
            //     'short_description_two',
            //     'heading_three',
            //     'short_description_three',
            // ]));

            // $whyPartner->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Why Partner section updated successfully.',
                'responseUrl'     => route('why-partner-list')
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
    * update certificateSoftware status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->whyPartner;

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
    * delete certificateSoftware
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        $result = $this->whyPartner->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }



}
