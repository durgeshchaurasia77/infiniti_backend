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
use App\Models\AboutUs;
use Illuminate\Validation\Rule;
class AboutUsController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.about_us.';

    protected $type = 'About Us  ';


    # Bind outlet
    protected $aboutUs;
    protected $page;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            AboutUs        $aboutUs,
                        )
                        {
                            $this->aboutUs= $aboutUs;
                            $this->page          = config('paginate.pagination');
                        }



    /**
     * edit Home AboutUs edit page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request)
    {
        try
        {
            $details['data'] = $this->aboutUs->first();
            return view($this->view.'edit', $details);
        } catch (Exception $e) {
            return response()->json([
                'responseCode'    =>  (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }

    /**
     * update Home AboutUs page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        $rules = [
            'title'                             => 'required|string|max:255',
            'sub_title'                         => 'required|string|max:255',
            'short_description'                 => 'required|string',
            'experience'                        => 'required|string|max:255',
            'countries'                         => 'required|string|max:255',
            'delivered'                         => 'required|string|max:255',
            'enthusiasts'                       => 'required|string|max:255',
            'image'                             => 'nullable|string|max:255',
            'human_centric_title'               => 'required|string|max:255',
            'human_centric_description'         => 'required|string',
            'exceptional_expertis_title'        => 'required|string|max:255',
            'exceptional_expertise_description' => 'required|string',
            'end_to_end_support_title'          => 'required|string|max:255',
            'end_to_end_support_description'    => 'required|string',
            'status'                            => 'required|boolean',
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

            $aboutUs = AboutUs::firstOrNew(['id' => 1]);

            $aboutUs->fill($request->only([
                'title',
                'sub_title',
                'short_description',
                'experience',
                'countries',
                'delivered',
                'enthusiasts',
                'image',
                'human_centric_title',
                'human_centric_description',
                'exceptional_expertis_title',
                'exceptional_expertise_description',
                'end_to_end_support_title',
                'end_to_end_support_description',
                'status',
            ]));

            $aboutUs->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string) $this->successStatus,
                'responseMessage' => 'About Us Updated Successfully.',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string) $this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }




}
