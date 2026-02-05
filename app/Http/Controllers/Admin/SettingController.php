<?php

namespace App\Http\Controllers\Admin;
use App\Http\Traits\MessageStatusTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Exception;
use File;
use DB;

class SettingController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.setting.';

    protected $type = 'Setting ';
    protected $setting;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    /**
      * edit setting
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function edit(Request $request)
    {
         try
         {
            $settingData = [];
            $settingData['settingData'] = $this->setting->first();

             return view($this->view.'edit',$settingData);
         } catch (Exception $e) {

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong !'
            ]);
         }
    }
    /**
    * @method to update setting data
    * @param Request $request
    * @return json
    */
    public function update(Request $request)
    {
        $rules = [
            'address'        => 'required|max:200',
            'email'          => 'required|email|max:200',
            'phone'          => 'required|digits:10',
            'header_logo'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'footer_logo'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon'        => 'nullable|image|mimes:jpeg,png,jpg,svg,ico|max:1024',
            // 'website_url'    => 'required|url',
            'facebook_url'   => 'required|url',
            'twitter_url'    => 'required|url',
            'instagram_url'  => 'required|url',
            'linkedin_url'   => 'required|url',
            'footer_about'   => 'required|max:500',
            'details'                  => 'nullable|array',
            'details.*.name'            => 'required|string|max:255',
            'details.*.address'         => 'required|string|max:1000',
            'details.*.address_logo'    => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules, [
            'required' => 'The :attribute field is required.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {
            DB::beginTransaction();

            // single settings row
            $value = $this->setting->firstOrNew(['id' => $request->id]);

            /* ================= HEADER LOGO ================= */
            if ($request->hasFile('header_logo')) {
                if (!empty($value->header_logo) && file_exists(public_path($value->header_logo))) {
                    unlink(public_path($value->header_logo));
                }

                $file = $request->file('header_logo');
                $filename = time().'_header_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/aboutus/'), $filename);
                $value->header_logo = 'images/admin/aboutus/'.$filename;
            }

            /* ================= FOOTER LOGO ================= */
            if ($request->hasFile('footer_logo')) {
                if (!empty($value->footer_logo) && file_exists(public_path($value->footer_logo))) {
                    unlink(public_path($value->footer_logo));
                }

                $file = $request->file('footer_logo');
                $filename = time().'_footer_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/aboutus/'), $filename);
                $value->footer_logo = 'images/admin/aboutus/'.$filename;
            }

            /* ================= FAVICON ================= */
            if ($request->hasFile('favicon')) {
                if (!empty($value->favicon) && file_exists(public_path($value->favicon))) {
                    unlink(public_path($value->favicon));
                }

                $file = $request->file('favicon');
                $filename = time().'_favicon_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/aboutus/'), $filename);
                $value->favicon = 'images/admin/aboutus/'.$filename;
            }

            if ($request->hasFile('office_map_image_one')) {
                if (!empty($value->office_map_image_one) && file_exists(public_path($value->office_map_image_one))) {
                    unlink(public_path($value->office_map_image_one));
                }

                $file = $request->file('office_map_image_one');
                $filename = time().'_office_map_image_one_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/aboutus/'), $filename);
                $value->office_map_image_one = 'images/admin/aboutus/'.$filename;
            }

            if ($request->hasFile('office_map_image_two')) {
                if (!empty($value->office_map_image_two) && file_exists(public_path($value->office_map_image_two))) {
                    unlink(public_path($value->office_map_image_two));
                }

                $file = $request->file('office_map_image_two');
                $filename = time().'_office_map_image_two_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/aboutus/'), $filename);
                $value->office_map_image_two = 'images/admin/aboutus/'.$filename;
            }
            $addresses = [];
            if ($request->has('details')) {
                foreach ($request->details as $key => $detail) {
                    // keep old logo if exists
                    $oldLogo = $value->multiple_address[$key]['address_logo'] ?? null;

                    if ($request->hasFile("details.$key.address_logo")) {

                        // delete old logo
                        if ($oldLogo && file_exists(public_path($oldLogo))) {
                            unlink(public_path($oldLogo));
                        }

                        $file = $request->file("details.$key.address_logo");
                        $filename = time().'_address_'.uniqid().'.'.$file->getClientOriginalExtension();
                        $file->move(public_path('images/admin/addresses'), $filename);

                        $logoPath = 'images/admin/addresses/'.$filename;
                    } else {
                        $logoPath = $oldLogo;
                    }

                    $addresses[] = [
                        'name'         => $detail['name'],
                        'address'      => $detail['address'],
                        'address_logo' => $logoPath,
                    ];
                }
            }

            $value->multiple_address = $addresses;


            /* ================= SAVE FIELDS ================= */
            $value->address       = $request->address;
            $value->phone         = $request->phone;
            $value->email         = $request->email;
            // $value->website_url   = $request->website_url;
            $value->facebook_url  = $request->facebook_url;
            $value->twitter_url   = $request->twitter_url;
            $value->instagram_url = $request->instagram_url;
            $value->linkedin_url  = $request->linkedin_url;
            $value->footer_about  = $request->footer_about;
            $value->office_about  = $request->office_about;
            $value->updated_at    = now();

            $value->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Setting Updated Successfully.',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }

}
