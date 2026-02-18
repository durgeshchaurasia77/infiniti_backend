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
use App\Models\OurProcess;
use App\Models\DigitalCategory;
use Illuminate\Validation\Rule;
class OurProcessController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.our_process.';

    protected $type = 'Our Process  ';


    # Bind outlet
    protected $ourProcess;
    protected $page;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            OurProcess        $ourProcess,
                        )
                        {
                            $this->ourProcess= $ourProcess;
                            $this->page          = config('paginate.pagination');
                        }



    public function index(Request $request) {

        # fetch setting list
        $query = $this->ourProcess;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);
        $categories  = DigitalCategory::where('status',1)->get();
        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                'categories' => $categories ?? [],
                                                ]);
    }
    public function store(Request $request)
    {
        $rules = [
            'category_id'=>'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        $chekId = OurProcess::where('category_id',$request->category_id)->first();
        if($chekId){
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'This Records already in our system',
            ]);
        }
        try {
            DB::beginTransaction();
            $whyPartner = new OurProcess();
            $whyPartner->category_id     = $request->category_id;

            $whyPartner->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'our Process updated successfully.',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }

    /**
     * edit Home ourProcess edit page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request,$id)
    {
        try
        {
            $details['ourProcess'] = $this->ourProcess->where('id',$id)->first();
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
            'title_header_one'              => 'required|string|max:255',
            'title_step_one'                => 'required|string|max:255',
            'image_step_one'                => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'short_description_step_one'    => 'required|string',

            'title_step_two'                => 'required|string|max:255',
            'image_step_two'                => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'short_description_step_two'    => 'required|string',

            'title_step_three'                => 'required|string|max:255',
            'image_step_three'              => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'short_description_step_three'  => 'required|string',

            'title_header_two'              => 'required|string|max:255',
            'short_description_two'         => 'required|string',
            'title_step_four'               => 'required|string|max:255',
            'image_step_four'               => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'short_description_step_four'   => 'nullable|string',
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

            $ourProcess = OurProcess::firstOrNew(['id' => $request->id]);

            // Fill text fields
            $ourProcess->fill($request->only([
                'title_header_one',
                'title_step_one',
                'short_description_step_one',
                'title_step_two',
                'short_description_step_two',
                'title_step_three',
                'short_description_step_three',
                'title_step_four',
                'short_description_step_four',
                'title_header_two',
                'short_description_two',
            ]));

            $uploadPath = public_path('images/admin/ourprocess/');

            // Step One Image
            if ($request->hasFile('image_step_one')) {
                if (!empty($ourProcess->image_step_one) && file_exists(public_path($ourProcess->image_step_one))) {
                    unlink(public_path($ourProcess->image_step_one));
                }

                $file = $request->file('image_step_one');
                $filename = time().'_image_step_one_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move($uploadPath, $filename);

                $ourProcess->image_step_one = 'images/admin/ourprocess/'.$filename;
            }

            // Step Two Image
            if ($request->hasFile('image_step_two')) {
                if (!empty($ourProcess->image_step_two) && file_exists(public_path($ourProcess->image_step_two))) {
                    unlink(public_path($ourProcess->image_step_two));
                }

                $file = $request->file('image_step_two');
                $filename = time().'_image_step_two_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move($uploadPath, $filename);

                $ourProcess->image_step_two = 'images/admin/ourprocess/'.$filename;
            }

            // Step Three Image
            if ($request->hasFile('image_step_three')) {
                if (!empty($ourProcess->image_step_three) && file_exists(public_path($ourProcess->image_step_three))) {
                    unlink(public_path($ourProcess->image_step_three));
                }

                $file = $request->file('image_step_three');
                $filename = time().'_image_step_three_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move($uploadPath, $filename);

                $ourProcess->image_step_three = 'images/admin/ourprocess/'.$filename;
            }

            if ($request->hasFile('image_step_four')) {
                if (!empty($ourProcess->image_step_four) && file_exists(public_path($ourProcess->image_step_four))) {
                    unlink(public_path($ourProcess->image_step_four));
                }

                $file = $request->file('image_step_four');
                $filename = time().'_image_step_four_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move($uploadPath, $filename);

                $ourProcess->image_step_four = 'images/admin/ourprocess/'.$filename;
            }

            $ourProcess->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Our Process section updated successfully.',
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }
    public function delete(Request $request,$id)
    {
        $result = $this->ourProcess->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }




}
