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
use App\Models\ContactExplore;
use App\Models\ContactExploreDetails;
use Illuminate\Validation\Rule;

class ContactExploreController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.contact_explore.';

    protected $type = 'Contact Explore ';


    # Bind outlet
    protected $page;
    protected $contact_explore;
    protected $contact_explore_details;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            ContactExplore         $contact_explore,
                            ContactExploreDetails  $contact_explore_details
                        )
                        {
                            $this->contact_explore         = $contact_explore;
                            $this->contact_explore_details = $contact_explore_details;
                            $this->page            = config('paginate.pagination');
                        }


    #contact_explore page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->contact_explore;

        $contact_exploreList = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'contact_exploreList'  => $contact_exploreList ?? [],
                                                ]);
    }
    /**
    * contact_explore store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request) {
    try {
            $data = [
                'name'    => 'required|string|min:3|max:50',
                'image'   => 'required|mimes:jpg,jpeg,png,gif|max:2048',
            ];

            $messages = [
                            'required' => 'The :attribute field is required.',
                        ];

            #validator
            $validator = Validator::make($request->all(), $data, $messages);

            #if validation fails
            if($validator->fails())
            {
                return response()->json([
                    'responseCode'=>(string)$this->errorStatus,
                    'responseMessage' => $validator->errors()->first()
                ]);
            }

            # check the requested sub category already exist or not
            $contact_exploreCheck = $this->contact_explore->where('name', $request->name)
                                    ->first();

            if($contact_exploreCheck)
            {

            return response()->json([
                                    'responseCode'=>(string)$this->errorStatus,
                                    'responseMessage' => 'Sorry, this Global Careers Aspirations already exist.'
                                ]);
            }
            #upload image
            if ($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename = ((string)(microtime(true)*10000)).'.'.$extension;
                $file->move(public_path('images/admin/contact_explore/'), $filename);
                $image='images/admin/contact_explore/'.$filename;
            }else{
                $image = null;
            }

            $value                = new $this->contact_explore;
            $value->name          = $request->name ?? null;
            $value->image         = $image ?? null;
            $value->created_at    = date('Y-m-d H:i:s');
            $value->save();

            if(isset($value->id))
            {
                return response()->json([
                                (string)$this->responseCode    =>(string)$this->successStatus,
                                (string)$this->responseMessage => 'Global Careers Aspirations Added Successfully.',
                                // 'responseUrl'     => route('contact_explore-list')
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
                                    'responseCode'    =>$this->errorStatus,
                                    'responseMessage' => 'Something went wrong.'
                                    ]);
        }
    }

    /**
     * edit contact_explore page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request)
    {
        try
        {
            $contact_exploreData['contact_exploreData'] = $this->contact_explore->first();

            return view($this->view.'edit', $contact_exploreData);
        } catch (Exception $e) {
            // return back()->with('error', $e->getMessage()); // Corrected the variable from $ex to $e
            return response()->json([
                'responseCode'    =>(string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }
    /**
     * update contact_explore page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */


    public function update(Request $request)
    {
        // dd($request->title);
        // Validation rules
        $rules = [
            'title'               => 'required|string|min:3|max:200',
            'description'         => 'required|string|max:2000',
            'details'             => 'required|array',
            'details.*.name'      => [
                'required',
                'string','min:2','max:50',
                Rule::unique('explore_opportunities_details', 'name')->where(function ($query) use ($request) {
                    return $query->where('explore_opportunities_ids', $request->id);
                })->ignore($request->id, 'explore_opportunities_ids'),
            ],
            'details.*.image'     => ['nullable', 'mimes:png,jpg,jpeg,gif'], // Allow nullable if not mandatory
        ];

        $messages = [
            'required'                  => 'The :attribute field is required.',
            'details.required'          => 'At least one name and image is required.',
            'details.*.name.required'   => 'The name field is required for all entries.',
            'details.*.image.mimes'     => 'The image must be in a valid format (png, jpg, jpeg, gif).',
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

            // Check if the record exists or create a new one
            $value = $this->contact_explore->firstOrNew(['id' => $request->id]);
            $isNew = !$value->exists;

            // Fill and save the main record
            $value->fill([
                'title'       => $request->title,
                'description' => $request->description,
                'updated_at'  => now(),
            ]);

            if ($isNew) {
                $value->created_at = now(); // Set created_at for new records
            }

            $value->save();

            $existingIds = [];
            $uniqueNames = [];

            foreach ($request->details as $index => $detail) {
                // Check for duplicate names in the same request
                $name = strtolower($detail['name']);
                if (in_array($name, $uniqueNames)) {
                    return response()->json([
                        'responseCode'    => (string)$this->errorStatus,
                        'responseMessage' => 'Duplicate name found in the request: ' . $detail['name'],
                    ]);
                }
                $uniqueNames[] = $name;

                // $dataCheck = $this->contact_explore_details->find($detail['id'] ?? null);
                $image = $detail['image'] ?? null;

                if ($request->hasFile("details.$index.image")) {
                    $file = $request->file("details.$index.image");
                    $filename = microtime(true) . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/admin/contact_explore/'), $filename);
                    $image = 'images/admin/contact_explore/' . $filename;
                } else {
                    // Keep the existing image if no new one is uploaded
                    $image =  $detail['old_image'] ?? null;
                }

                // Update or create new detail record
                $detailRecord = $this->contact_explore_details->updateOrCreate(
                    ['id' => $detail['id'] ?? null],
                    [
                        'explore_opportunities_ids' => $value->id,
                        'name'                => $detail['name'],
                        'image'               => $image,
                        'created_at'          => isset($detail['id']) ? null : now(),
                        'updated_at'          => now(),
                    ]
                );

                $existingIds[] = $detailRecord->id; // Track updated or newly created IDs
            }

            // Remove any old records not in the current request
            $this->contact_explore_details->where('explore_opportunities_ids', $value->id)
                ->whereNotIn('id', $existingIds)
                ->delete();

            DB::commit();

            $responseMessage = $isNew
                ? 'Explore Opportunities Created Successfully.'
                : 'Explore Opportunities Updated Successfully.';

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => $responseMessage,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            // Log::error('Update error: ', ['message' => $e->getMessage()]); // Log the error for debugging
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.check & Please try again. ',
            ]);
        }
    }

    /**
    * update contact_explore status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->contact_explore;

        # get the status
        $status = $query->where('id', $id)->first()->status;

        # check status, if active
        if ($status == '1')
        {
            #message
            $message = $this->inActiveMessage($this->type);

            # deactive( update status to zero)
            $statusCode = '0';
        }
        else
        {
            #message
            $message = $this->activeMessage($this->type);

            # active( update status to one)
            $statusCode = '1';
        }

        # update status code
        $query->where('id', $id)->update(['status' => $statusCode]);

        # return success
        return [
                    $this->successKey => $this->successStatus,
                    $this->messageKey => $message
                ];
    }
    /**
    * delete contact_explore
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->contact_explore->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
