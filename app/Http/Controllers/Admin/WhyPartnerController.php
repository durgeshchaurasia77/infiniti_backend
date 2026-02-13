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
use App\Models\WhyPartner;
use Illuminate\Validation\Rule;
class WhyPartnerController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.why_partner.';

    protected $type = 'Why Partner  ';


    # Bind outlet
    protected $whyPartner;
    protected $page;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            WhyPartner        $whyPartner,
                        )
                        {
                            $this->whyPartner= $whyPartner;
                            $this->page          = config('paginate.pagination');
                        }



    /**
     * edit Home whyPartner edit page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request)
    {
        try
        {
            $details['whyPartner'] = $this->whyPartner->first();
            return view($this->view.'edit', $details);
        } catch (Exception $e) {
            return response()->json([
                'responseCode'    =>  (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }

    /**
     * update Home excellanceCounting page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        $rules = [
            'heading_one'            => 'nullable|string|max:255',
            'short_description_one'  => 'nullable|string',
            'heading_two'            => 'nullable|string|max:255',
            'short_description_two'  => 'nullable|string',
            'heading_three'          => 'nullable|string|max:255',
            'short_description_three'=> 'nullable|string',
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

            $whyPartner = WhyPartner::firstOrNew(['id' => 1]);

            $whyPartner->fill($request->only([
                'heading_one',
                'short_description_one',
                'heading_two',
                'short_description_two',
                'heading_three',
                'short_description_three',
            ]));

            $whyPartner->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Why Partner section updated successfully.',
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
