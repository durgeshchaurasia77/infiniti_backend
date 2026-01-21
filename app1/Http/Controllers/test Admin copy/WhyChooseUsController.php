<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use DB;
use Validator;
use App\Models\WhyChooseUs;
use App\Models\WhyChooesDetails;
use App\Http\Traits\MessageStatusTrait;
use Illuminate\Validation\Rule;

class WhyChooseUsController extends Controller
{
    use MessageStatusTrait;
    # Bind location
    protected $view = 'admin.why_choose_us.';

    protected $type = 'Why Choose Us ';

    protected $page = 10;
    # Bind outlet
    protected $why_choose;
    protected $why_choose_details;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            WhyChooseUs          $why_choose,
                            WhyChooesDetails     $why_choose_details

                        ) {
                            $this->why_choose         = $why_choose;
                            $this->why_choose_details = $why_choose_details;
                            $this->page = config('paginate.pagination');
                        }

    #outlet page
    public function index(Request $request)
    {
        $query = $this->why_choose;

        $why_choose_list = $query->orderBy('id', 'desc')->paginate($this->page ?? 10);
        return view($this->view . 'index')->with([
            'why_chooseList'  => $why_choose_list ?? [],

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $request)
    {
        try
        {
            $why_chooseData['why_chooseData'] = $this->why_choose->first();
            return view($this->view.'edit', $why_chooseData);
        } catch (Exception $e) {
            return response()->json([
                (string)$this->responseCode    => (string)$this->errorStatus,
                (string)$this->responseMessage => 'Something went wrong.'
            ]);

        }
    }
    /**
     * update Why choose us
     * @param Illuminate\Http\Request;
     * @return Illuminate\Http\Response;
     */
    public function update(Request $request)
    {
        // Validation rules
        $rules = [
            'title'               => 'required|string|max:50',
            'description'         => 'required|string|max:255',
            'details'             => 'required|array',
            'details.*.question'  => [
                'required',
                'string','max:255',
                Rule::unique('why_choose_details', 'question')->where(function ($query) use ($request) {
                    return $query->where('why_choose_ids', $request->id);
                })->ignore($request->id, 'why_choose_ids'),
            ],
            'details.*.answer' => ['required','max:255' ],
        ];

        $messages = [
            'required'                     => 'The :attribute field is required.',
            'details.required'             => 'At least one question and YouTube Link is required.',
            'details.*.question.required'  => 'The question field is required for all entries.',
            'details.*.answer.required'=> 'The answer field is required for all entries.',
            'details.*.answer.digits'  => 'The answer must be a digits',
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
            #upload image
            $valueCheck = $this->why_choose->first();
            if ($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = ((string)(microtime(true)*10000)).'.'.$extension;
                $file->move(public_path('images/admin/why_choose/'), $filename);
                $image='images/admin/why_choose/'.$filename;
            }else{
                $image = $valueCheck->image ??'';
            }
            // Check if the record exists or create a new one
            $value = $this->why_choose->firstOrNew(['id' => $request->id]);
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
            $uniqueQuestions = [];

            foreach ($request->details as $index => $detail) {
                // Check for duplicate question within the same request
                if (in_array($detail['question'], $uniqueQuestions)) {
                    return response()->json([
                        'responseCode'    => (string)$this->errorStatus,
                        'responseMessage' => 'Duplicate question found in the request: ' . $detail['question'],
                    ]);
                }
                $uniqueQuestions[] = $detail['question'];



                // Update or create new detail
                $detailRecord = $this->why_choose_details->updateOrCreate(
                    ['id' => $detail['id'] ?? null],
                    [
                        'why_choose_ids'    => $value->id,
                        'question'          => $detail['question'],
                        'answer'            => $detail['answer'],
                        'created_at'        => isset($detail['id']) ? null : now(), // Only set created_at for new records
                        'updated_at'        => now(),
                    ]
                );

                $existingIds[] = $detailRecord->id; // Track updated or newly created IDs
            }

            // Remove any old records not in the current request
            $this->why_choose_details->where('why_choose_ids', $value->id)
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
                'responseMessage' => 'Something went wrong. Please try again. ',
            ]);
        }
    }
}
