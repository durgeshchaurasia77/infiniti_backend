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
    public function update (Request $request) {

        $rules = [
            'address'      => 'required|max:200',
            'email'        => 'required|email|max:200',
            'phone'        => 'required|digits:10',
            'footer_image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website_url'  => 'required|url',
            'facebook_url' => 'required|url',
            'twitter_url'  => 'required|url',
            'instagram_url'=> 'required|url',
            'linkedin_url' => 'required|url',
            'footer_about' => 'required|max:500',

        ];

        $messages = [ 'required' => 'The :attribute field is required.'];

        #validator
        $validator = Validator::make($request->all(), $rules, $messages);

        #if validation fails
        if($validator->fails())
        {
            return response()->json([
                                    'responseCode'    => (string)$this->errorStatus,
                                    'responseMessage' => $validator->errors()->first()
                                ]);
        }

        try {

            DB::beginTransaction();


            $value = $this->setting->where('id', $request->id)->first();
            #upload image
            if ($request->hasfile('footer_image'))
            {
                $file = $request->file('footer_image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = ((string)(microtime(true)*10000)).'.'.$extension;
                File::delete(public_path($request->footer_image));
                $file->move(public_path('images/admin/aboutus/'), $filename);
                $footer_image='images/admin/aboutus/'.$filename;
            }else{
                if($value->footer_image == '')
                {
                    return response()->json([
                                        'responseCode'    => (string)$this->errorStatus,
                                        'responseMessage' => 'Image field is required !'
                                    ]);
                }
                else{
                    $footer_image = $value->footer_image ?? '';
                }

            }

            if($value != '')
            {
                $value->address       = $request->address ?? '';
                $value->phone         = $request->phone ?? '';
                $value->footer_image  = $footer_image ?? '';
                $value->email         = $request->email ?? '';
                $value->website_url   = $request->website_url ?? '';
                $value->facebook_url  = $request->facebook_url ?? '';
                $value->twitter_url   = $request->twitter_url ?? '';
                $value->instagram_url = $request->instagram_url ?? '';
                $value->linkedin_url  = $request->linkedin_url ?? '';
                $value->footer_about  = $request->footer_about ?? '';
                $value->updated_at    = date('Y-m-d H:i:s');
                $value->update();
            }
            else
            {
                $value               = new $this->setting;
                $value->address      = $request->address ?? '';
                $value->phone        = $request->phone;
                $value->footer_image = $footer_image ?? '';
                $value->email        = $request->email;
                $value->website_url  = $request->website_url ?? '';
                $value->facebook_url = $request->facebook_url ?? '';
                $value->twitter_url  = $request->twitter_url ?? '';
                $value->instagram_url= $request->instagram_url ?? '';
                $value->linkedin_url = $request->linkedin_url ?? '';
                $value->footer_about = $request->footer_about ?? '';
                $value->save();
            }
            DB::commit();

            if(isset($value->id))
            {
                return response()->json([
                            'responseCode'    => (string)$this->successStatus,
                            'responseMessage' => 'Setting Updated Successfully.',
                        ]);
            }else
            {
                return response()->json([
                            'responseCode'    => (string)$this->errorStatus,
                            'responseMessage' => 'Something went wrong.'
                        ]);
            }

        } catch (Exception $e) {

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.' //$e->getMessage()
            ]);

        }
    }
}
