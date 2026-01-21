<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use App\Models\VideoLibrary;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use DB;
use File;
use Exception;
use App\Models\PageBanner;
class VideoLibraryController extends Controller
{
    use MessageStatusTrait;
    protected $VideoLibrary;
    protected $comments;
    protected $pageBanner;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
        VideoLibrary    $VideoLibrary,
        Comment         $comments,
        PageBanner      $pageBanner,

    ) {
        $this->VideoLibrary = $VideoLibrary;
        $this->comments     = $comments;
        $this->pageBanner   = $pageBanner;
    }
    public function index(Request $request)
    {
        $details = [];
        $details['VideoLibrary']     = $this->VideoLibrary::where(['status' => 1])->get();
        // $details['comments']  = $this->comments::where(['status' => 1])->get();
        $details['pageBanner']       = $this->pageBanner::select('image')->where('page_name','Video Library')->first();

        return view('website.video_library', $details);
    }
    public function commentsubmit(Request $request)
    {
        $rules = [
            'name' => [
                'required',
                'regex:/^[a-zA-Z\s]+$/',
                'min:2',
                'max:100',
            ],
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                'max:255',
            ],
            'website' => [
                'required',
                'url',
            ],
            'comment' => 'required|string',
        ];

        $messages = [
            'name.required' => 'The Name field is required.',
            'name.regex'    => 'The Name must only contain letters and spaces.',
            'name.min'      => 'The Name must be at least 2 characters.',
            'name.max'      => 'The Name may not be greater than 50 characters.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => $this->errorStatus,
                'responseMessage' => $validator->messages()->first()
            ]);
        }
        try {
            // DB::beginTransaction();

            // Store the enquiry in the database
            $helpRequest    =  $this->comments::create([
                'name'      => $request->name ?? '',
                'email'     => $request->email ?? '',
                'website'   => $request->website ?? '',
                'comment'   => $request->comment ?? '',
            ]);
            if($helpRequest->id)
            {
                return response()->json([
                    'responseCode'    => $this->successStatus,
                    'responseMessage' => 'Thank you! your comment has been submitted successfully.',
                ]);
            }
            else
            {
                return response()->json([
                    'responseCode'    => $this->failedStatus,
                    'responseMessage' => 'Something went wrong. Please try again later..',
                ]);
            }
            // DB::commit();
        } catch (\Exception $e) {
            // DB::rollBack();
            return response()->json([
                'responseCode'    => $this->failedStatus,
                'responseMessage' => 'Something went wrong. Please try again later.',
            ]);
        }
    }
}
