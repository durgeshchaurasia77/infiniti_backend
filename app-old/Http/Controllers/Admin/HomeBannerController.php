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
use App\Models\HomeBanner;
use Illuminate\Validation\Rule;
class HomeBannerController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.home_banner.';

    protected $type = 'Home Banner  ';


    # Bind outlet
    protected $homeBanner;
    protected $page;
    protected $homeBannerDetails;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            HomeBanner        $homeBanner,
                        )
                        {
                            $this->homeBanner         = $homeBanner;
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
            $homeBannerData['homeBannerData'] = $this->homeBanner->first();
            return view($this->view.'edit', $homeBannerData);
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
            'id'              => 'nullable|exists:banners,id',
            'title'           => 'required|string|max:50|unique:banners,title,' . $request->id,
            'details'         => 'nullable|array',
            'image'           => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            // 'seo_title'       => 'nullable|string|max:255',
            // 'seo_keywords'    => 'nullable|string|max:255',
            // 'seo_description' => 'nullable|string',
            // 'seo_image'       => 'nullable|string|max:255',
        ];
// dd($request->all());
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {
            DB::beginTransaction();

            // create or update
            $banner = HomeBanner::firstOrNew(['id' => $request->id]);

            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = ((string)(microtime(true) * 10000)) . '.' . $extension;
                $file->move(public_path('images/admin/banners/'), $filename);
                $imagePath = 'images/admin/banners/' . $filename;
            }else{
                $imagePath = $banner->image ?? '';
            }

            // SEO image upload (optional)
            // if ($request->hasFile('seo_image')) {
            //     $banner->seo_image = $request->file('seo_image')
            //         ->store('seo/banners', 'public');
            // }

            // Map fields
            $banner->title  = $request->title;
            $banner->image  = $imagePath ?? '' ;
            $banner->detais = $request->details ?? '';
            // $banner->seo_title        = $request->seo_title;
            // $banner->seo_keywords     = $request->seo_keywords;
            // $banner->seo_description  = $request->seo_description;

            $banner->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => $request->id
                    ? 'Banner Updated Successfully.'
                    : 'Banner Created Successfully.',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong. Please try again.',
            ]);
        }
    }

}
