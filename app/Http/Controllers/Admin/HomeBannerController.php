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
    // dd($request->all());
    $rules = [
        'id'      => 'nullable|exists:banners,id',
        'title'   => 'required|string|max:50|unique:banners,title,' . $request->id,
        'details' => 'nullable|array',
        'video'=> 'nullable|max',
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
dd($request->file('video'));
        $banner = HomeBanner::firstOrNew(['id' => $request->id]);
        /* ========= VIDEO UPLOAD (SAVED IN IMAGE COLUMN) ========= */
        if ($request->hasFile('video')) {

            $file = $request->file('video');

            // if (!$file->isValid()) {
            //     throw new \Exception('Invalid video file');
            // }

            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $destination = public_path('videos/admin/banners');

            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }

            $file->move($destination, $filename);

            $mediaPath = 'videos/admin/banners/' . $filename;

        } else {
            // keep old video
            $mediaPath = $banner->image ?? '';
        }
        /* ========= SAVE ========= */
        $banner->title   = $request->title;
        $banner->image   = $mediaPath;   // ✅ VIDEO PATH SAVED IN IMAGE COLUMN
        $banner->detais = $request->details ?? [];

        $banner->save();

        DB::commit();

        return response()->json([
            'responseCode'    => (string) $this->successStatus,
            'responseMessage' => $request->id
                ? 'Banner Updated Successfully.'
                : 'Banner Created Successfully.',
        ]);

    } catch (\Exception $e) {
        DB::rollBack();

        return response()->json([
            'responseCode'    => (string) $this->errorStatus,
            'responseMessage' => $e->getMessage().'dd', // show real error while testing
        ]);
    }
}


}
