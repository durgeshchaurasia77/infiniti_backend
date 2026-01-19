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
use App\Models\WhyBusinessChoose;
use Illuminate\Validation\Rule;
class WhyBusinessChooseController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.why_business_choose.';

    protected $type = 'Why Business Choose  ';


    # Bind outlet
    protected $whyBusinessChoose;
    protected $page;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            WhyBusinessChoose        $whyBusinessChoose,
                        )
                        {
                            $this->whyBusinessChoose= $whyBusinessChoose;
                            $this->page          = config('paginate.pagination');
                        }



    /**
     * edit Home WhyBusinessChoose edit page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request)
    {
        try
        {
            $details['data'] = $this->whyBusinessChoose->first();
            return view($this->view.'edit', $details);
        } catch (Exception $e) {
            return response()->json([
                'responseCode'    =>  (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }

    /**
     * update Home WhyBusinessChoose page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        $rules = [
                'ai_title'               => 'required|string|max:150',
                'ai_description'         => 'required|string',
                'scalable_title'         => 'required|string|max:150',
                'scalable_description'   => 'required|string',
                'reliable_title'         => 'required|string|max:150',
                'reliable_description'   => 'required|string',
                'security_title'         => 'required|string|max:150',
                'security_description'   => 'required|string',
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

            // Always single record
            $counting = WhyBusinessChoose::firstOrNew(['id' => 1]);

            $counting->ai_title            = $request->ai_title;
            $counting->ai_description      = $request->ai_description;
            $counting->scalable_title      = $request->scalable_title;
            $counting->scalable_description= $request->scalable_description;
            $counting->reliable_title      = $request->reliable_title;
            $counting->reliable_description= $request->reliable_description;
            $counting->security_title      = $request->security_title;
            $counting->security_description= $request->security_description;

            $counting->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Why Business Choose Updated Successfully.',
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
