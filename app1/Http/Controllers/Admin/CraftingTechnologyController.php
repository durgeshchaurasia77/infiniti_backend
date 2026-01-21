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
use App\Models\CraftingTechnology;

class CraftingTechnologyController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.crafting_technology.';

    protected $type = 'Crafting Technology ';


    # Bind outlet
    protected $page;
    protected $craftingTechnology;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            CraftingTechnology          $craftingTechnology
                        )
                        {
                            $this->craftingTechnology = $craftingTechnology;
                            $this->page = config('paginate.pagination');
                        }


    #CraftingTechnology page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->craftingTechnology;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * CraftingTechnology store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function store(Request $request)
    {
        $rules = [
            'name'      => 'required|string|min:2|max:50',
            'title'     => 'required|string|max:100',
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
                $file->move(public_path('images/admin/crafting_technology/'), $filename);
                $imagePath = 'images/admin/crafting_technology/'.$filename;
            }

            $people = new CraftingTechnology();
            $people->name      = $request->name;
            $people->title     = $request->title;
            $people->image     = $imagePath ?? null;
            $people->created_at = now();
            $people->save();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Crafting Technology Added Successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.',
            ]);
        }
    }



    /**
     * edit CraftingTechnology page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $details['data'] = $this->craftingTechnology->findOrFail($id);

            return view($this->view.'edit',$details);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }
    /**
     * update CraftingTechnology page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update(Request $request)
    {
        $rules = [
            'id'        => 'required|exists:crafting_technology,id',
            'name'      => 'required|string|min:2|max:50',
            'title'     => 'required|string|max:100',
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

            $people = CraftingTechnology::findOrFail($request->id);

            // Upload new image if exists
            if ($request->hasFile('image')) {

                // delete old image
                if (!empty($people->image) && file_exists(public_path($people->image))) {
                    unlink(public_path($people->image));
                }

                $file = $request->file('image');
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/admin/crafting_technology/'), $filename);
                $people->image = 'images/admin/crafting_technology/'.$filename;
            }

            // Map fields
            $people->name      = $request->name;
            $people->title     = $request->title;
            $people->updated_at = now();
            $people->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => 'Crafting Technology Updated Successfully.'
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
    * update CraftingTechnology status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->craftingTechnology;

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
    * delete CraftingTechnology
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->craftingTechnology->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }
}
