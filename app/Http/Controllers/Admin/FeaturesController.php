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
use App\Models\Features;
use App\Models\Industry;
use Illuminate\Validation\Rule;
class FeaturesController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.features.';

    protected $type = 'Features  ';


    # Bind outlet
    protected $features;
    protected $page;
    protected $featuresDetails;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            Features        $features,
                        )
                        {
                            $this->features         = $features;
                            $this->page               = config('paginate.pagination');
                        }



    public function index(Request $request) {

        # fetch setting list
        $query = $this->features;
        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        $categories  = Industry::where('status',1)->get();
        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                'categories' => $categories ?? [],
                                                ]);
    }
    public function store(Request $request)
    {
        $rules = [
            'category_id'=>'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        $chekId = Features::where('category_id',$request->category_id)->first();
        if($chekId){
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'This Records already in our system',
            ]);
        }
        try {
            DB::beginTransaction();
            $whyPartner = new Features();
            $whyPartner->category_id     = $request->category_id;

            $whyPartner->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Features updated successfully.',
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
     * edit Home Banner edit page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request,$id)
    {
        try
        {
            $details['data'] = $this->features->where('id',$id)->first();
            return view($this->view.'edit', $details);
        } catch (Exception $e) {
            return response()->json([
                'responseCode'    =>  (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }

    /**
     * update Home Banner page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        $rules = [
            'id'                => 'nullable|exists:features,id',
            'name'              => 'required|string|max:100',
            'title'             => 'required|string|max:100|unique:features,title,' . $request->id,
            'short_description' => 'required|string|max:500',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'details'              => 'nullable|array',
            'details.*.heading'    => 'required|string|max:255',
            'details.*.description'=> 'required|string|max:1000',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string) $this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {
            DB::beginTransaction();

            /** Create or Update */
            $features = Features::findOrFail($request->id);

            /** Image Upload */
            if ($request->hasFile('image')) {

                if (!empty($features->image) && file_exists(public_path($features->image))) {
                    unlink(public_path($features->image));
                }
                $file = $request->file('image');
                $filename = time() . '_features_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/admin/featuress/'), $filename);
                $imagePath = 'images/admin/featuress/' . $filename;

                $features->image = $imagePath;
            }

            /** Map Fields */
            $features->name              = $request->name;
            $features->title             = $request->title;
            $features->short_description = $request->short_description;
            $features->details           = $request->details ?? [];
            $features->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string) $this->successStatus,
                'responseMessage' => $request->id
                    ? 'Features Updated Successfully.'
                    : 'Features Created Successfully.',
                'responseUrl'     => route('features-list')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string) $this->errorStatus,
                'responseMessage' => 'Something went wrong. Please try again.',
            ]);
        }
    }
    public function delete(Request $request,$id)
    {
        $result = $this->features->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }

}
