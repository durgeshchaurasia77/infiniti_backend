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
use App\Models\FrroOptin;
use App\Models\FrroOptinDetails;
use Illuminate\Validation\Rule;
class FrroOptinController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.our_services.frro_optin.';

    protected $type = 'Frro Optin ';


    # Bind outlet
    protected $page;
    protected $frroOptin;
    protected $frroOptinDetails;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            FrroOptin        $frroOptin,
                            FrroOptinDetails $frroOptinDetails
                        )
                        {
                            $this->frroOptin         = $frroOptin;
                            $this->frroOptinDetails  = $frroOptinDetails;
                            $this->page              = config('paginate.pagination');
                        }



    /**
     * edit frro optin page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request)
    {
        try
        {
            $frroOptinData['frroOptinData'] = $this->frroOptin->with('details')->first();
            return view($this->view.'edit', $frroOptinData);
        } catch (Exception $e) {
            return response()->json([
                'responseCode'    =>  (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }

    /**
     * update frro optin page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        // Validation rules
        $rules = [
            'title'               => 'required|string|max:50|unique:frro_optin,title,'.$request->id,
            'image'               => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description'         => 'required|string|max:255',
            'details'             => 'required|array',
            'details.*.titles'    => [
                'required',
                'string','max:255',
                Rule::unique('frro_optin_details', 'titles')->where(function ($query) use ($request) {
                    return $query->where('frro_optin_ids', $request->id);
                })->ignore($request->id, 'frro_optin_ids'),
            ],
        ];

        $messages = [
            'required'                     => 'The :attribute field is required.',
            'details.required'             => 'At least one Title and YouTube Link is required.',
            'details.*.titles.required'    => 'The Title field is required for all entries.',
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
            $valueCheck = $this->frroOptin->first();
            #upload image
            if ($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = ((string)(microtime(true)*10000)).'.'.$extension;
                $file->move(public_path('images/admin/frroOptin/'), $filename);
                $image='images/admin/frroOptin/'.$filename;
            }else{
                $image = $valueCheck->image ??'';
            }
            // Check if the record exists or create a new one
            $value = $this->frroOptin->firstOrNew(['id' => $request->id]);
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
                if (in_array($detail['titles'], $uniqueTitles)) {
                    return response()->json([
                        'responseCode'    => (string)$this->errorStatus,
                        'responseMessage' => 'Duplicate Title found in the request: ' . $detail['titles'],
                    ]);
                }
                $uniqueTitles[] = $detail['titles'];



                // Update or create new detail
                $detailRecord = $this->frroOptinDetails->updateOrCreate(
                    ['id' => $detail['id'] ?? null],
                    [
                        'frro_optin_ids'=> $value->id,
                        'titles'        => $detail['titles'],
                        'created_at'    => isset($detail['id']) ? null : now(), // Only set created_at for new records
                        'updated_at'    => now(),
                    ]
                );

                $existingIds[] = $detailRecord->id; // Track updated or newly created IDs
            }

            // Remove any old records not in the current request
            $this->frroOptinDetails->where('frro_optin_ids', $value->id)
                ->whereNotIn('id', $existingIds)
                ->delete();

            DB::commit();

            $responseMessage = $isNew
                ? 'Frro Optin Created Successfully.'
                : 'Frro Optin Updated Successfully.';

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
