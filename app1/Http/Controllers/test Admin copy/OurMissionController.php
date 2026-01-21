<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurMission;
use Illuminate\Support\Facades\Validator;
use Exception;
use File;
use DB;
use App\Http\Traits\MessageStatusTrait;

class OurMissionController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.our_mission.';

    protected $type = 'Our Mission ';
    protected $our_mission;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(OurMission $our_mission)
                        {
                            $this->our_mission = $our_mission;
                        }
    /**
    * edit our_mission
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request)
    {
        try
        {
        $our_missionData = [];
        $our_missionData['our_missionData'] = $this->our_mission->first();

            return view($this->view.'edit',$our_missionData);
        } catch (Exception $e) {

        return response()->json([
            'responseCode' => (string)$this->errorStatus,
            'responseMessage' => 'Something went wrong !'
        ]);
        }
    }
    /**
    * @method to update our_mission data
    * @param Request $request
    * @return json
    */
    public function update (Request $request) {

    $rules = [
        'title'       => 'required|max:50',
        'image_one'   => 'nullable|mimes:jpeg,jpg,png|dimensions:min_width=330,min_height=420,max_width=360,max_height=500',
        'image_two'   => 'nullable|mimes:jpeg,jpg,png|dimensions:max_width=650,max_height=450',
        'image_three' => 'nullable|mimes:jpeg,jpg,png|dimensions:max_width=650,max_height=450',
        'description' => 'required|max:1000',

    ];

    $messages = [
                'required'               => 'The :attribute field is required.',
                'image_one.dimensions'   => 'The image must have dimensions between 330x420 and 360x500 pixels.',
                'image_two.dimensions'   => 'The image must have dimensions maximum 650x450 pixels.',
                'image_three.dimensions' => 'The image must have dimensions maximum 650x450 pixels.',
                ];

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
        $valueData = $this->our_mission->where('id', $request->id)->first();
        if($valueData->image_one == '')
        {
            return response()->json([
                'responseCode'=>(string)$this->errorStatus,
                'responseMessage' => 'Image One is Required!'
            ]);
        }
        if($valueData->image_two == '')
        {
            return response()->json([
                'responseCode'=>(string)$this->errorStatus,
                'responseMessage' => 'Image Two is Required!'
            ]);
        }
        if($valueData->image_three == '')
        {
            return response()->json([
                'responseCode'=>(string)$this->errorStatus,
                'responseMessage' => 'Image Three is Required!'
            ]);
        }
        #upload image one
        if ($request->hasfile('image_one'))
        {
            $file = $request->file('image_one');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = ((string)(microtime(true)*10000)).'.'.$extension;
            File::delete(public_path($request->image_one));
            $file->move(public_path('images/admin/image_one/'), $filename);
            $image_one='images/admin/image_one/'.$filename;
        }else{
            $image_one = $valueData->image_one ?? '';
        }


        #upload image two
        if ($request->hasfile('image_two'))
        {
            $file = $request->file('image_two');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename = ((string)(microtime(true)*10000)).'.'.$extension;
            File::delete(public_path($request->image_two));
            $file->move(public_path('images/admin/image_two/'), $filename);
            $image_two='images/admin/image_two/'.$filename;
        }else{
            $image_two = $valueData->image_two ?? '';
        }
        #upload image three
        if ($request->hasfile('image_three'))
        {
            $file = $request->file('image_three');
            $extension = $file->getClientOriginalExtension(); // getting image_three extension
            $filename = ((string)(microtime(true)*10000)).'.'.$extension;
            File::delete(public_path($request->image_three));
            $file->move(public_path('images/admin/image_three/'), $filename);
            $image_three='images/admin/image_three/'.$filename;
        }else{
            $image_three = $valueData->image_three ?? '';
        }

        $value = $this->our_mission->where('id', $request->id)->first();

        if($value != '')
        {
            $value->title        = $request->title ?? '';
            $value->image_one    = $image_one ?? '';
            $value->image_two    = $image_two ?? '';
            $value->image_three  = $image_three ?? '';
            $value->description  = $request->description ?? '';
            $value->updated_at   = date('Y-m-d H:i:s');
            $value->update();
        }
        else
        {
            $value              = new $this->our_mission;
            $value->title       = $request->title ?? '';
            $value->image_one   = $image_one;
            $value->image_two   = $image_two;
            $value->image_three = $image_three ?? '';
            $value->description = $request->description ?? '';
            $value->save();
        }
        DB::commit();

        if(isset($value->id))
        {
            return response()->json([
                        'responseCode'=>(string)$this->successStatus,
                        'responseMessage' => 'Our Mission Updated Successfully.',
                    ]);
        }else
        {
            return response()->json([
                        'responseCode'=>(string)$this->errorStatus,
                        'responseMessage' => 'Something went wrong.'
                    ]);
        }

    } catch (Exception $e) {

        return response()->json([
            'responseCode'=>(string)$this->errorStatus,
            'responseMessage' => 'Something went wrong.'
        ]);

    }
    }
}
