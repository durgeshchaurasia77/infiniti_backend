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
use App\Models\CaseStudy;

class CaseStudyController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.case_study.';

    protected $type = 'Case Study ';


    # Bind outlet
    protected $page;
    protected $caseStudy;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            CaseStudy          $caseStudy
                        )
                        {
                            $this->caseStudy = $caseStudy;
                            $this->page = config('paginate.pagination');
                        }


    #CaseStudy page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->caseStudy;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * caseStudy store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'name'              => 'required|string|max:100',
            'country'           => 'required|string|max:100',
            'short_description' => 'required|string|max:500',
            'plateform'         => 'required|string|max:100',
            'image'             => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {

            // Upload image
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/admin/case-studies/'), $filename);
                $imagePath = 'images/admin/case-studies/' . $filename;
            }

            $caseStudy = new CaseStudy();
            $caseStudy->name              = $request->name;
            $caseStudy->country           = $request->country;
            $caseStudy->short_description = $request->short_description;
            $caseStudy->plateform         = $request->plateform;
            $caseStudy->image             = $imagePath ?? null;
            $caseStudy->created_at        = now();
            $caseStudy->save();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Case Study Added Successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }
    /**
     * edit CaseStudy page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $details['data'] = $this->caseStudy->findOrFail($id);

            return view($this->view.'edit',$details);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update CaseStudy page
    * @param Illuminate\Http\Request;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        $rules = [
            'id'                => 'required|exists:case_study,id',
            'name'              => 'required|string|max:100',
            'country'           => 'required|string|max:100',
            'short_description' => 'required|string|max:500',
            'plateform'         => 'required|string|max:100',
            'image'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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

            $caseStudy = CaseStudy::findOrFail($request->id);

            // Replace image if new uploaded
            if ($request->hasFile('image')) {

                if (!empty($caseStudy->image) && file_exists(public_path($caseStudy->image))) {
                    unlink(public_path($caseStudy->image));
                }

                $file = $request->file('image');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/admin/case-studies/'), $filename);
                $caseStudy->image = 'images/admin/case-studies/' . $filename;
            }

            // Update fields
            $caseStudy->name              = $request->name;
            $caseStudy->country           = $request->country;
            $caseStudy->short_description = $request->short_description;
            $caseStudy->plateform         = $request->plateform;
            $caseStudy->updated_at        = now();
            $caseStudy->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Case Study Updated Successfully.',
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
    * update CaseStudy status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->caseStudy;
        $status = $query->where('id', $id)->first()->status;

        if ($status == '1')
        {
            $message = $this->inActiveMessage($this->type);
            $statusCode = '0';
        }
        else
        {
            $message = $this->activeMessage($this->type);
            $statusCode = '1';
        }

        $query->where('id', $id)->update(['status' => $statusCode]);

        return [
                    $this->successKey => $this->successStatus,
                    $this->messageKey => $message
                ];
    }
    /**
    * delete CaseStudy
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
       
        $result = $this->caseStudy->where('id', $id)->delete();

        if($result){
            
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
