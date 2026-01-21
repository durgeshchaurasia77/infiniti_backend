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
use App\Models\HomeBanner;
use App\Models\HomeBannerDetails;
use Illuminate\Validation\Rule;
class HomeBannerController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.home_banner.';

    protected $type = 'Home Banner  ';


    # Bind outlet
    protected $homeBanner;
    protected $page;
    protected $homeBannerDetails;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            HomeBanner        $homeBanner,
                            HomeBannerDetails $homeBannerDetails
                        )
                        {
                            $this->homeBanner         = $homeBanner;
                            $this->homeBannerDetails  = $homeBannerDetails;
                            $this->page               = config('paginate.pagination');
                        }



    /**
     * edit Home Banner edit page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request)
    {
        try
        {
            $homeBannerData['homeBannerData'] = $this->homeBanner->with('details')->first();
            return view($this->view.'edit', $homeBannerData);
        } catch (Exception $e) {
            return response()->json([
                'responseCode'    =>  (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);
        }
    }

    /**
     * update Home Banner page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        // Validation rules
        $rules = [
            'title'               => 'required|string|max:50|unique:home_banner,title,'.$request->id,
            'subtitle'            => 'required|string|max:100',
            'youtube_link'        => 'required|url|max:255',
            'details'             => 'required|array',
            'details.*.titles'    => [
                'required',
                'string','max:100',
                Rule::unique('home_banner_details', 'titles')->where(function ($query) use ($request) {
                    return $query->where('home_banner_ids', $request->id);
                })->ignore($request->id, 'home_banner_ids'),
            ],
        ];

        $messages = [
            'required'                     => 'The :attribute field is required.',
            'details.required'             => 'At least one Title and YouTube Link is required.',
            'details.*.titles.required'    => 'The Title field is required for all entries.',
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
            // Check if the record exists or create a new one
            $value = $this->homeBanner->firstOrNew(['id' => $request->id]);
            $isNew = !$value->exists;

            $emededVideo = $this->convertToEmbedLink($request->youtube_link);

            $value->title        = $request->title;
            $value->subtitle     = $request->subtitle;
            $value->youtube_link = $emededVideo ?? null;
            $value->updated_at   = now();

            if ($isNew) {
                $value->created_at = now();
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
                $detailRecord = $this->homeBannerDetails->updateOrCreate(
                    ['id' => $detail['id'] ?? null],
                    [
                        'home_banner_ids'=> $value->id,
                        'titles'         => $detail['titles'],
                        'created_at'     => isset($detail['id']) ? null : now(),
                        'updated_at'     => now(),
                    ]
                );

                $existingIds[] = $detailRecord->id;
            }

            // Remove any old records not in the current request
            $this->homeBannerDetails->where('home_banner_ids', $value->id)
                ->whereNotIn('id', $existingIds)
                ->delete();

            DB::commit();

            $responseMessage = $isNew
                ? 'Home Banner Created Successfully.'
                : 'Home Banner Updated Successfully.';

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
    /**
     * update convert youtube url into embeded url
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    private function convertToEmbedLink($youtubeUrl)
    {
        // Log the URL for debugging
        \Log::info('Converting YouTube URL:', ['url' => $youtubeUrl]);

        if (preg_match('/^https:\/\/www\.youtube\.com\/embed\/([a-zA-Z0-9_-]+)(\?start=\d+)?$/', $youtubeUrl)) {
            return $youtubeUrl;
        }

        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $youtubeUrl, $matches)) {

            $videoId = $matches[1];
            return "https://www.youtube.com/embed/$videoId";
        }

        $parsedUrl = parse_url($youtubeUrl);

        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);

            $videoId = $queryParams['v'] ?? null;
            if ($videoId) {
                $embedLink = "https://www.youtube.com/embed/$videoId";

                if (isset($queryParams['t'])) {
                    $startSeconds = rtrim($queryParams['t'], 's'); // Remove 's' from time if present
                    $embedLink .= "?start=$startSeconds";
                }

                return $embedLink;
            }
        }

        return null;
    }
}
