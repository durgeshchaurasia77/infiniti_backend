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
use App\Models\TechnologyUsed;

class TechnologyUsedController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.technologies_used.';

    protected $type = 'Technology Used ';


    # Bind outlet
    protected $page;
    protected $technologiesUsed;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            TechnologyUsed $technologiesUsed
                        )
                        {
                            $this->technologiesUsed = $technologiesUsed;
                            $this->page = config('paginate.pagination');
                        }


    #technologiesUsed page
    public function index(Request $request) {

        # fetch setting list
        $query = $this->technologiesUsed;

        $lists = $query->orderBy('id','desc')->paginate($this->page ?? 10);

        return view($this->view.'index')->with([
                                                'lists'  => $lists ?? [],
                                                ]);
    }
    /**
    * technologiesUsed store
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function storeUpdate(Request $request)
    {
        $rules = [
            'id'        => 'nullable|exists:technologies_used,id',
            'name'      => 'required|string|max:100',
            'images.*'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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

            $technology = TechnologyUsed::firstOrNew(['id' => $request->id]);

            $storedImages = $technology->images ?? [];

            // Upload new images
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('images/admin/technologies/'), $filename);
                    $storedImages[] = 'images/admin/technologies/' . $filename;
                }
            }

            $technology->name   = $request->name;
            $technology->images = $storedImages;
            $technology->save();

            DB::commit();

            return response()->json([
                'responseCode'    => (string)$this->successStatus,
                'responseMessage' => $request->id
                    ? 'Technology Updated Successfully.'
                    : 'Technology Created Successfully.',
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
     * edit technologiesUsed page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function edit($id)
    {
        try
        {
            $details['technology'] = $this->technologiesUsed->findOrFail($id);

            return view($this->view.'edit',$details);
        } catch (Exception $e) {
            return back()->with('error', $ex->getMessage());
        }
    }

    /**
    * update technologiesUsed status
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->technologiesUsed;

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
    * delete technologiesUsed
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
        # delete role by id
        $result = $this->technologiesUsed->where('id', $id)->delete();

        if($result){
            # return success
            return  [
                        $this->successKey   =>  $this->successStatus,
                         $this->messageKey  => $this->deleteMessage($this->type)
                   ];
        }
    }

    public function deleteImage(Request $request, $id)
    {
        try {
            $technology = TechnologyUsed::findOrFail($id);

            $image = $request->image;
            $images = $technology->images ?? [];

            // Remove image from array
            $updatedImages = array_values(array_filter($images, function ($img) use ($image) {
                return $img !== $image;
            }));

            // Delete file
            if ($image && file_exists(public_path($image))) {
                unlink(public_path($image));
            }

            $technology->images = $updatedImages;
            $technology->save();

            return response()->json([
                'success' => 200,
                'message' => 'Image deleted successfully.',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => 400,
                'message' => 'Something went wrong.',
            ]);
        }
    }
}
