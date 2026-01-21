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



    /**
     * edit Home Banner edit page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request)
    {
        try
        {
            $details['data'] = $this->features->first();
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
            $features = Features::firstOrNew(['id' => $request->id]);

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
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string) $this->errorStatus,
                'responseMessage' => 'Something went wrong. Please try again.'.$e->getMessage(),
            ]);
        }
    }


}
