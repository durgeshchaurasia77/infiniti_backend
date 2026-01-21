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
use App\Models\OurJourneys;

class OurJourneysController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.our_journeys.';

    protected $type = 'Our Journey ';


    # Bind outlet
    protected $page;
    protected $ourJourney;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            OurJourneys          $ourJourney
                        )
                        {
                            $this->ourJourney = $ourJourney;
                            $this->page = config('paginate.pagination');
                        }


    #OurJourney page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->ourJourney;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * OurJourney store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'year'              => 'required|string|max:20',
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string',
            'image'             => 'required|file|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string) $this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {


            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'_blog_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/journey/'), $filename);
                $imagePath = 'images/admin/journey/'.$filename;
            }

            $journey = new OurJourneys();
            $journey->year              = $request->year;
            $journey->title             = $request->title;
            $journey->short_description = $request->short_description;
            $journey->image             = $imagePath;
            $journey->status            = 1;
            $journey->created_at        = now();
            $journey->save();

            return response()->json([
                'responseCode'    => (string) $this->successStatus,
                'responseMessage' => 'Our Journey Added Successfully.',
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'responseCode'    => (string) $this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }




    /**
     * edit OurJourney page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $OurJourneyData['data'] = $this->ourJourney->findOrFail($id);

            return view($this->view.'edit',$OurJourneyData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update OurJourney page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'                => 'required|exists:our_journeys,id',
            'year'              => 'required|string|max:20',
            'title'             => 'required|string|max:255',
            'short_description' => 'required|string',
            'image'             => 'nullable|string|max:255',
            'status'            => 'required|boolean',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string) $this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        try {
            DB::beginTransaction();

            $journey = OurJourneys::findOrFail($request->id);


            if ($request->hasFile('image')) {
                if (!empty($journey->image) && file_exists(public_path($journey->image))) {
                    unlink(public_path($journey->image));
                }

                $file = $request->file('image');
                $filename = time().'_journey_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/journeys/'), $filename);
                $journey->image = 'images/admin/journeys/'.$filename;
            }

            $journey->year              = $request->year;
            $journey->title             = $request->title;
            $journey->short_description = $request->short_description;
            $journey->status            = $request->status ?? $journey->status;
            $journey->updated_at        = now();
            $journey->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string) $this->successStatus,
                'responseMessage' => 'Our Journey Updated Successfully.',
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'responseCode'    => (string) $this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }


    /**
    * update OurJourney status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        $query = $this->ourJourney;
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
    * delete OurJourney
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {

        $result = $this->ourJourney->where('id', $id)->delete();

        if($result){
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
