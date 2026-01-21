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
use App\Models\OurExperties;
use App\Models\OurExpertiesDetails;
use Illuminate\Validation\Rule;

class OurExpertiesController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.our_experties.';

    protected $type = 'Our Experties ';


    # Bind outlet
    protected $page;
    protected $our_experties;
    protected $our_experties_details;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            OurExperties $our_experties,
                            OurExpertiesDetails $our_experties_details
                        )
                        {
                            $this->our_experties         = $our_experties;
                            $this->our_experties_details = $our_experties_details;
                            $this->page          = config('paginate.pagination');
                        }



    /**
     * edit Our Experties page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit(Request $request)
    {
        try
        {
            $our_expertiesData['our_expertiesData'] = $this->our_experties->first();
            return view($this->view.'edit', $our_expertiesData);
        } catch (Exception $e) {

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Somthing went wrong.',
            ]);
        }
    }

    /**
     * update Our Experties page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */

    public function update(Request $request)
    {
        // Validation rules
        $rules = [
            'title'               => 'required|string|max:50',
            'description'         => 'nullable|string|max:150',
            'details'             => 'required|array',
            'details.*.title'     => [
                'required',
                'string','max:80',
                Rule::unique('our_experties_details', 'title')->where(function ($query) use ($request) {
                    return $query->where('our_experties_ids', $request->id);
                })->ignore($request->id, 'our_experties_ids'),
            ],
            'details.*.video_url' => ['required', 'url'],
        ];

        $messages = [
            'required'                     => 'The :attribute field is required.',
            'details.required'             => 'At least one Title and YouTube Link is required.',
            'details.*.title.required'     => 'The Title field is required for all entries.',
            'details.*.video_url.required' => 'The YouTube Link field is required for all entries.',
            'details.*.video_url.url'      => 'The YouTube Link must be a valid URL.',
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
            $value = $this->our_experties->firstOrNew(['id' => $request->id]);
            $isNew = !$value->exists;

            // Update or set the values for the main record
            $value->title        = $request->title;
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
                if (in_array($detail['title'], $uniqueTitles)) {
                    return response()->json([
                        'responseCode'    => (string)$this->errorStatus,
                        'responseMessage' => 'Duplicate Title found in the request: ' . $detail['title'],
                    ]);
                }
                $uniqueTitles[] = $detail['title'];

                // Convert YouTube link to embed URL
                $youtubeEmbedUrl = $this->convertToEmbedLink($detail['video_url']);
                if (!$youtubeEmbedUrl) {
                    return response()->json([
                        'responseCode'    => (string)$this->errorStatus,
                        'responseMessage' => 'Invalid YouTube URL at entry #' . ($index + 1),
                    ]);
                }

                // Update or create new detail
                $detailRecord = $this->our_experties_details->updateOrCreate(
                    ['id' => $detail['id'] ?? null],
                    [
                        'our_experties_ids' => $value->id,
                        'title'             => $detail['title'],
                        'video_url'         => $youtubeEmbedUrl,
                        'created_at'        => isset($detail['id']) ? null : now(), // Only set created_at for new records
                        'updated_at'        => now(),
                    ]
                );

                $existingIds[] = $detailRecord->id; // Track updated or newly created IDs
            }

            // Remove any old records not in the current request
            $this->our_experties_details->where('our_experties_ids', $value->id)
                ->whereNotIn('id', $existingIds)
                ->delete();

            DB::commit();

            $responseMessage = $isNew
                ? 'Our Experties Created Successfully.'
                : 'Our Experties Updated Successfully.';

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => $responseMessage,
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong. Please try again. '
            ]);
        }
    }


    #convert youtube url to embed url
    private function convertToEmbedLink($youtubeUrl)
    {
        // Log the URL for debugging
        \Log::info('Converting YouTube URL:', ['url' => $youtubeUrl]);

        // If the URL is already in embed format (https://www.youtube.com/embed/...), return it as is
        if (preg_match('/^https:\/\/www\.youtube\.com\/embed\/([a-zA-Z0-9_-]+)(\?start=\d+)?$/', $youtubeUrl)) {
            return $youtubeUrl; // No need to convert, return the original embed URL
        }

        // Check if the URL is a shortened YouTube URL (youtu.be format)
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $youtubeUrl, $matches)) {
            // If it is, use the short URL's video ID directly
            $videoId = $matches[1];
            return "https://www.youtube.com/embed/$videoId";
        }

        // Otherwise, parse the standard YouTube URL
        $parsedUrl = parse_url($youtubeUrl);

        // Check if URL has a query part (it should for YouTube watch URLs)
        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);

            $videoId = $queryParams['v'] ?? null;
            if ($videoId) {
                $embedLink = "https://www.youtube.com/embed/$videoId";

                // Add start time if present (e.g., t=15s for 15 seconds)
                if (isset($queryParams['t'])) {
                    $startSeconds = rtrim($queryParams['t'], 's'); // Remove 's' from time if present
                    $embedLink .= "?start=$startSeconds";
                }

                return $embedLink;
            }
        }

        // If the URL doesn't match any of the expected formats, return null
        return null; // Invalid YouTube URL
    }

}
