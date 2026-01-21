<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use Illuminate\Support\Facades\Validator;
use Exception;
use File;
use DB;
use App\Http\Traits\MessageStatusTrait;
class AboutUsController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.about_us.';

    protected $type = 'aboutus ';
    protected $aboutus;
    protected $page;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(AboutUs $aboutus)
    {
        $this->aboutus = $aboutus;
    }
        /**
      * edit aboutus
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
      public function edit(Request $request)
      {
         try
         {
            $aboutusData = [];
            $aboutusData['aboutusData'] = $this->aboutus->first();

             return view($this->view.'edit',$aboutusData);
         } catch (Exception $e) {

            return response()->json([
                'responseCode' => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong !'
            ]);
         }
      }
    /**
    * @method to update aboutus data
    * @param Request $request
    * @return json
    */
      public function update (Request $request) {

        $rules = [
            'title'        => 'required|max:200',
            'experties'    => 'required|digits:2',
            'contact_no'   => 'required|digits:10',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'achievement'  => 'required|max:200',
            'description'  => 'required|max:1000',

        ];

        $messages = [ 'required' => 'The :attribute field is required.'];

        #validator
        $validator = Validator::make($request->all(), $rules, $messages);

        #if validation fails
        if($validator->fails())
        {
            return response()->json([
                                    'responseCode'=>(string)$this->errorStatus,
                                    'responseMessage' => $validator->errors()->first()
                                ]);
        }

        try {

            DB::beginTransaction();

            $checkaboutus = $this->aboutus->where('id', $request->id)->first();

            #upload image
            if ($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = ((string)(microtime(true)*10000)).'.'.$extension;
                File::delete(public_path($request->image));
                $file->move(public_path('images/admin/aboutus/'), $filename);
                $image='images/admin/aboutus/'.$filename;
            }else{
                if($checkaboutus->image == '')
                {
                    return response()->json([
                                        'responseCode' => (string)$this->errorStatus,
                                        'responseMessage' => 'Image field is required !'
                                    ]);
                }
                else{
                    $image = $checkaboutus->image ?? '';
                }

            }



            $value = $this->aboutus->where('id', $request->id)->first();

            if($value != '')
            {
                $value->title       = $request->title ?? '';
                $value->contact_no  = $request->contact_no ?? '';
                $value->image       = $image ?? '';
                $value->experties   = $request->experties ?? '';
                $value->achievement= $request->achievement ?? '';
                $value->description = $request->description ?? '';
                $value->updated_at  = date('Y-m-d H:i:s');
                $value->update();
            }
            else
            {
                $value              = new $this->aboutus;
                $value->title       = $request->title ?? '';
                $value->contact_no  = $request->contact_no;
                $value->image       = $image ?? '';
                $value->experties   = $request->experties;
                $value->achievement= $request->achievement ?? '';
                $value->description = $request->description ?? '';
                $value->save();
            }
            DB::commit();

            if(isset($value->id))
            {
                return response()->json([
                            'responseCode'    => (string)$this->successStatus,
                            'responseMessage' => 'About Us Updated Successfully.',
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
                'responseMessage' => 'Something went wrong.'
            ]);

        }
      }
}
