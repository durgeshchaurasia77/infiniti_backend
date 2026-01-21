<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use DB;
use Validator;
use App\Models\ExpactServices   ;
use App\Models\ExpactServicesDetails;
use App\Http\Traits\MessageStatusTrait;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ExpactServicesController extends Controller
{
    use MessageStatusTrait;
    # Bind location
    protected $view = 'admin.expact_services.';

    protected $type = 'Expact Services ';

    protected  $page = 10;
    # Bind outlet
    protected $expact_services;
    protected $expact_services_details;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            ExpactServices          $expact_services,
                            ExpactServicesDetails   $expact_services_details

                        ) {
                            $this->expact_services         = $expact_services;
                            $this->expact_services_details = $expact_services_details;
                            $this->page                    = config('paginate.pagination');
                        }

    #outlet page
        /**
      * get Expact Services index page
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function index(Request $request)
    {
        $query = $this->expact_services;

        $expact_services_list = $query->orderBy('id', 'desc')->paginate($this->page ?? 10);

        return view($this->view . 'index')->with([
            'expact_servicesList'  => $expact_services_list ?? [],

        ]);
    }
        /**
      * get Expact Services create page
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function create()
    {
        return view($this->view . 'create');
    }
    /**
      * get Expact Services store
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function store(Request $request)
    {
        return $this->handleRequest($request);
    }
    /**
     * get Expact Services edit page
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit(Request $request,$id)
     {
         try
         {
             $expact_servicesData['expact_servicesData'] = $this->expact_services->where('id',$id)->first();
             return view($this->view.'edit', $expact_servicesData);
         } catch (Exception $e) {
             return response()->json([
                 (string)$this->responseCode    => (string)$this->errorStatus,
                 (string)$this->responseMessage => 'Something went wrong.'
             ]);

         }
     }
    /**
      * get Expact Services update
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function update(Request $request)
    {
        return $this->handleRequest($request, $request->id);
    }

    /**
      * get Expact Services update and store with same function
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    private function handleRequest(Request $request, $id = null)
    {
        // Validation rules
        $rules = [
            'title'               => 'required|string|max:150|unique:expact_services,title,' . $id,
            'subtitle'            => 'required|string|max:200',
            'youtube_link'        => 'required|url|max:1000',
            'details'             => 'required|array',
            'details.*.titles'    => [
                'required',
                'string','max:255',
                Rule::unique('expact_services_details', 'titles')->where(function ($query) use ($id) {
                    return $query->where('expact_services_ids', $id);
                })->ignore($id, 'expact_services_ids'),
            ],
        ];

        $messages = [
            'required'                     => 'The :attribute field is required.',
            'details.required'             => 'At least one title and YouTube Link is required.',
            'details.*.titles.required'    => 'The titles field is required for all entries.',
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

            // Convert YouTube link to embed format
            $youtube_urlembed = $this->convertToEmbedLink($request->youtube_link);
            if (!$youtube_urlembed) {
                return response()->json([
                    'responseCode'    => (string)$this->errorStatus,
                    'responseMessage' => 'Invalid YouTube URL',
                ]);
            }

            // Create or update the main record
            $value = $this->expact_services->firstOrNew(['id' => $id]);
            $isNew = !$value->exists;

            $slug = Str::slug($request->title);

            $value->title        = $request->title;
            $value->slug         = $slug ?? '';
            $value->subtitle     = $request->subtitle;
            $value->youtube_link = $youtube_urlembed ?? null;
            $value->updated_at   = now();

            if ($isNew) {
                $value->created_at = now();
            }
            $value->save();

            $existingIds = [];
            $uniqueTitles = [];

            foreach ($request->details as $detail) {
                // Check for duplicate titles within the same request
                if (in_array($detail['titles'], $uniqueTitles)) {
                    return response()->json([
                        'responseCode'    => (string)$this->errorStatus,
                        'responseMessage' => 'Duplicate titles found in the request: ' . $detail['titles'],
                    ]);
                }
                $uniqueTitles[] = $detail['titles'];

                // Update or create new detail
                $detailRecord = $this->expact_services_details->updateOrCreate(
                    ['id' => $detail['id'] ?? null],
                    [
                        'expact_services_ids' => $value->id,
                        'titles'              => $detail['titles'],
                        'created_at'          => isset($detail['id']) ? null : now(),
                        'updated_at'          => now(),
                    ]
                );

                $existingIds[] = $detailRecord->id; // Track updated or newly created IDs
            }

            // Remove any old records not in the current request
            $this->expact_services_details->where('expact_services_ids', $value->id)
                ->whereNotIn('id', $existingIds)
                ->delete();

            DB::commit();

            $responseMessage = $isNew
                ? 'Expact Services Created Successfully.'
                : 'Expact Services Updated Successfully.';

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => $responseMessage,
                'responseUrl'     => route('expact-services-list'),
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong. Please try again.',
            ]);
        }
    }
        /**
      * convert normal youtube link to embed link
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
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
    /**
    * update expacted services status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->expact_services;

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
    * delete expacted services
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->expact_services->where('id', $id)->delete();
        $resultData = $this->expact_services_details->where('expact_services_ids', $id)->delete();
        if($result && $resultData){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }

}
