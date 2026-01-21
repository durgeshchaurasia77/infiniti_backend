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
use App\Models\VideoLibrary;

class VideoLibraryController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.video_library.';

    protected $type = 'Video Library ';


    # Bind outlet
    protected $page;
    protected $videolibrary;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            VideoLibrary $videolibrary
                        )
                        {
                            $this->videolibrary = $videolibrary;
                            $this->page       = config('paginate.pagination');
                        }


    #videolibrary page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->videolibrary;

        $videolibraryList = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'videolibraryList'  => $videolibraryList ?? [],
                                                ]);
    }
    /**
    * videolibrary store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request) {
    try {
            $data = [
                'title'       => 'required|string|max:50',
                'video_url'   => 'required|url',
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
            $videolibraryCheck = $this->videolibrary->where('title', $request->title)
                                    ->first();

            if($videolibraryCheck)
            {

            return response()->json([
                                    'responseCode'=>(string)$this->errorStatus,
                                    'responseMessage' => 'Sorry, this Video Library already exist.'
                                ]);
            }
            $youtube_urlembed = $this->convertToEmbedLink($request->video_url);
            if(! $youtube_urlembed)
            {
                return response()->json([
                    'responseCode'    => (string)$this->errorStatus,
                    'responseMessage' => 'Invalid youtube url',
                ]);
            }

            $value                = new $this->videolibrary;
            $value->title         = $request->title ?? null;
            $value->video_url     = $youtube_urlembed ?? null;
            $value->created_at    = date('Y-m-d H:i:s');
            $value->save();

            if(isset($value->id))
            {
                return response()->json([
                                (string)$this->responseCode    =>(string)$this->successStatus,
                                (string)$this->responseMessage => 'Video Library Added Successfully.',
                                // 'responseUrl'     => route('videolibrary-list')
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
     * edit videolibrary page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $videolibraryData['videolibraryData'] = $this->videolibrary->findOrFail($id);

            return view($this->view.'edit',$videolibraryData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update videolibrary page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update (Request $request) {

        $rules = [
            'title'       => 'required|string|max:300',
            'video_url'   => 'required|url',
        ];

        $messages = [
                            'required' => 'The :attribute field is required.',
                        ];

        #validator
        $validator = Validator::make($request->all(), $rules, $messages);

        #if validation fails
        if($validator->fails())
        {
            return response()->json([
                                    'responseCode'    =>(string)$this->errorStatus,
                                    'responseMessage' => $validator->errors()->first()
                                ]);
        }

        $checkDuplicate = $this->videolibrary->where('title',$request->title)
                                ->where('id','!=',$request->id)
                                ->first();
        if($checkDuplicate != '')
        {
        return response()->json([
                                            'responseCode'    => (string)$this->errorStatus,
                                            'responseMessage' => 'Sorry, this Video Library already exists',
                                        ]);
            }

            $youtube_urlembed = $this->convertToEmbedLink($request->video_url);
            if(! $youtube_urlembed)
            {
                return response()->json([
                    'responseCode'    => (string)$this->errorStatus,
                    'responseMessage' => 'Invalid youtube url',
                ]);
            }
        try {

            DB::beginTransaction();

            $value              = $this->videolibrary->where('id', $request->id)->first();
            $value->title       = $request->title ?? null;
            $value->video_url   = $youtube_urlembed ?? null;
            $value->updated_at  = date('Y-m-d H:i:s');
            $value->update();
            DB::commit();

            if(isset($value->id))
            {
                return response()->json([
                            'responseCode'    =>(string)$this->successStatus,
                            'responseMessage' => 'Video Library Updated Successfully.',
                        ]);
            }else
            {
                return response()->json([
                            'responseCode'    =>(string)$this->errorStatus,
                            'responseMessage' => 'Something went wrong.'
                        ]);
            }

        } catch (Exception $e) {

            return response()->json([
                'responseCode'    =>(string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first()
            ]);

        }
    }
    /**
    * update videolibrary status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->videolibrary;

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
    * delete videolibrary
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->videolibrary->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
    #convert youtube url to embed urlx
    private function convertToEmbedLink($youtubeUrl)
    {
        // Check if the URL is already in embed format
        if (strpos($youtubeUrl, 'youtube.com/embed/') !== false) {
            return $youtubeUrl;
        }

        $parsedUrl = parse_url($youtubeUrl);
        parse_str($parsedUrl['query'] ?? '', $queryParams);

        $videoId = $queryParams['v'] ?? null;
        if ($videoId) {
            $embedLink = "https://www.youtube.com/embed/$videoId";

            // Add start time if present
            if (isset($queryParams['t'])) {
                $startSeconds = rtrim($queryParams['t'], 's');
                $embedLink .= "?start=$startSeconds";
            }

            return $embedLink;
        }

        return null;
    }
}
