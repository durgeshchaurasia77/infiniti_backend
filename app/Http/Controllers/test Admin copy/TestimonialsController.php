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
use App\Models\Testimonials;

class TestimonialsController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.testimonials.';

    protected $type = 'Testimonials ';


    # Bind outlet
    protected $page;
    protected $testimonials;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            Testimonials $testimonials
                        )
                        {
                            $this->testimonials = $testimonials;
                            $this->page = config('paginate.pagination');
                        }


    #testimonials page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->testimonials;

        $testimonialsList = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'testimonialsList'  => $testimonialsList ?? [],
                                                ]);
    }
    /**
    * testimonials store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        try {
            $rules = [
                'name'        => 'required|string|min:3|max:50',
                'designation' => 'required|string|max:50',
                'rating'      => 'required|numeric|min:1|max:5',
                'video'       => 'required|mimes:mp4,mov,avi,wmv|max:20480', // 20MB
            ];

            $messages = [
                'required' => 'The :attribute field is required.',
                'video.mimes' => 'Only mp4, mov, avi, wmv videos are allowed.',
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return response()->json([
                    'responseCode'    => (string)$this->errorStatus,
                    'responseMessage' => $validator->errors()->first()
                ]);
            }

            // Upload video
            if ($request->hasFile('video')) {
                $file = $request->file('video');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('videos/admin/testimonials/'), $filename);
                $videoPath = 'videos/admin/testimonials/' . $filename;
            }

            $testimonial = new $this->testimonials;
            $testimonial->name        = $request->name;
            $testimonial->designation = $request->designation;
            $testimonial->rating      = $request->rating;
            $testimonial->video_path  = $videoPath ?? null;
            $testimonial->created_at  = now();
            $testimonial->save();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Testimonial Added Successfully.',
                'responseUrl'     => route('testimonials-list')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }


    /**
     * edit testimonials page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $testimonialsData['testimonialsData'] = $this->testimonials->findOrFail($id);

            return view($this->view.'edit',$testimonialsData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update testimonials page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'          => 'required|exists:client_testimonial,id',
            'name'        => 'required|string|min:3|max:50',
            'designation' => 'required|string|max:50',
            'rating'      => 'required|numeric|min:1|max:5',
            'video'       => 'nullable|mimes:mp4,mov,avi,wmv|max:20480', // 20MB
        ];

        $messages = [
            'required' => 'The :attribute field is required.',
            'video.mimes' => 'Only mp4, mov, avi, wmv videos are allowed.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first()
            ]);
        }

        try {
            DB::beginTransaction();

            $testimonial = $this->testimonials->find($request->id);

            // Upload new video if exists
            if ($request->hasFile('video')) {

                // Delete old video
                if (!empty($testimonial->video_path) && file_exists(public_path($testimonial->video_path))) {
                    unlink(public_path($testimonial->video_path));
                }

                $file = $request->file('video');
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('videos/admin/testimonials/'), $filename);
                $testimonial->video_path = 'videos/admin/testimonials/' . $filename;
            }

            $testimonial->name        = $request->name;
            $testimonial->designation = $request->designation;
            $testimonial->rating      = $request->rating;
            $testimonial->updated_at  = now();
            $testimonial->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Testimonials Updated Successfully.',
                'responseUrl'     => route('testimonials-list')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }

    /**
    * update testimonials status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->testimonials;

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
    * delete testimonials
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->testimonials->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
