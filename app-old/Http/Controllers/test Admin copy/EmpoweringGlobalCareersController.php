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
use App\Models\EmpoweringCareers;
use App\Models\EmpoweringCareersDetails;
use Illuminate\Validation\Rule;

class EmpoweringGlobalCareersController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.empowering_careers.';

    protected $type = 'Empowering Global Careers ';

    # Bind outlet
    protected $page;
    protected $empowering_careers;
    protected $empowering_careers_details;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            EmpoweringCareers $empowering_careers,
                            EmpoweringCareersDetails $empowering_careers_details
                        )
                        {
                            $this->empowering_careers         = $empowering_careers;
                            $this->empowering_careers_details = $empowering_careers_details;
                            $this->page          = config('paginate.pagination');
                        }



    /**
     * edit EmpoweringCareers page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request)
    {
        try
        {
            $empowering_careersData['empowering_careersData'] = $this->empowering_careers->first();
            return view($this->view.'edit', $empowering_careersData);
        } catch (Exception $e) {
            return response()->json([
                'responseCode'    =>  (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }

    /**
     * update EmpoweringCareers page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        // Validation rules
        $rules = [
            'title'               => 'required|string|max:50',
            'description'         => 'nullable|string|max:200',
            'details'             => 'required|array',
            'details.*.title'     => [
                'required',
                'string','max:255',
                Rule::unique('empowering_careers_details', 'title')->where(function ($query) use ($request) {
                    return $query->where('empowering_careers_ids', $request->id);
                })->ignore($request->id, 'empowering_careers_ids'),
            ],
            'details.*.percentage' => ['required', 'numeric', 'regex:/^\d{1,2}(\.\d)?$/', 'between:0,100'],
        ];

        $messages = [
            'required'                     => 'The :attribute field is required.',
            'details.required'             => 'At least one Title and YouTube Link is required.',
            'details.*.title.required'     => 'The Title field is required for all entries.',
            'details.*.percentage.required'=> 'The Percentage field is required for all entries.',
            'details.*.percentage.digits'  => 'The Percentage must be a digits',
        ];

        // Validator
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {
            DB::beginTransaction();
            $valueCheck = $this->empowering_careers->first();
            #upload image
            if ($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = ((string)(microtime(true)*10000)).'.'.$extension;
                $file->move(public_path('images/admin/empowering_careers/'), $filename);
                $image='images/admin/empowering_careers/'.$filename;
            }else{
                $image = $valueCheck->image ??'';
            }
            // Check if the record exists or create a new one
            $value = $this->empowering_careers->firstOrNew(['id' => $request->id]);
            $isNew = !$value->exists;

            // Update or set the values for the main record
            $value->title        = $request->title;
            $value->image        = $image;
            $value->description  = $request->description ?? null;
            $value->updated_at   = now();

            if ($isNew) {
                $value->created_at = now(); // Set created_at for new records
            }
            $value->save();

            $existingIds = [];
            $uniqueTitles = [];

            foreach ($request->details as $index => $detail) {
                // Check for duplicate titles within the same request
                if (in_array($detail['title'], $uniqueTitles)) {
                    return response()->json([
                        'responseCode'    => (string)$this->errorStatus,
                        'responseMessage' => 'Duplicate Title found in the request: ' . $detail['title'],
                    ]);
                }
                $uniqueTitles[] = $detail['title'];



                // Update or create new detail
                $detailRecord = $this->empowering_careers_details->updateOrCreate(
                    ['id' => $detail['id'] ?? null],
                    [
                        'empowering_careers_ids' => $value->id,
                        'title'             => $detail['title'],
                        'percentage'        => $detail['percentage'],
                        'created_at'        => isset($detail['id']) ? null : now(), // Only set created_at for new records
                        'updated_at'        => now(),
                    ]
                );

                $existingIds[] = $detailRecord->id; // Track updated or newly created IDs
            }

            // Remove any old records not in the current request
            $this->empowering_careers_details->where('empowering_careers_ids', $value->id)
                ->whereNotIn('id', $existingIds)
                ->delete();

            DB::commit();

            $responseMessage = $isNew
                ? 'Empowering Careers Created Successfully.'
                : 'Empowering Careers Updated Successfully.';

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => $responseMessage,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong. Please try again. ' ,
            ]);
        }
    }

}
