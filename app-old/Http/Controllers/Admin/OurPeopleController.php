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
use App\Models\OurPeople;

class OurPeopleController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.our_people.';

    protected $type = 'Our People ';


    # Bind outlet
    protected $page;
    protected $ourPeople;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            OurPeople          $ourPeople
                        )
                        {
                            $this->ourPeople = $ourPeople;
                            $this->page = config('paginate.pagination');
                        }


    #ourPeople page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->ourPeople;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * ourPeople store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'name'      => 'required|string|min:2|max:50',
            'title'     => 'required|string|max:100',
            'sub_title' => 'nullable|string|max:150',
            'image'     => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
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
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/ourPeople/'), $filename);
                $imagePath = 'images/admin/ourPeople/'.$filename;
            }

            $people = new OurPeople();
            $people->name      = $request->name;
            $people->title     = $request->title;
            $people->sub_title = $request->sub_title;
            $people->image     = $imagePath ?? null;
            $people->created_at = now();
            $people->save();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Our People Added Successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }



    /**
     * edit ourPeople page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $ourPeopleData['data'] = $this->ourPeople->findOrFail($id);

            return view($this->view.'edit',$ourPeopleData);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update ourPeople page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'        => 'required|exists:our_people,id',
            'name'      => 'required|string|min:2|max:50',
            'title'     => 'required|string|max:100',
            'sub_title' => 'nullable|string|max:150',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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

            $people = OurPeople::findOrFail($request->id);

            // Upload new image if exists
            if ($request->hasFile('image')) {

                // delete old image
                if (!empty($people->image) && file_exists(public_path($people->image))) {
                    unlink(public_path($people->image));
                }

                $file = $request->file('image');
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/ourPeople/'), $filename);
                $people->image = 'images/admin/ourPeople/'.$filename;
            }

            // Map fields
            $people->name      = $request->name;
            $people->title     = $request->title;
            $people->sub_title = $request->sub_title;
            $people->updated_at = now();
            $people->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Our People Updated Successfully.'
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
    * update ourPeople status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->ourPeople;

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
    * delete ourPeople
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->ourPeople->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
