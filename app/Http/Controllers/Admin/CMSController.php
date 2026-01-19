<?php

namespace App\Http\Controllers\Admin;
use App\Http\Traits\MessageStatusTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CMS;
use Validator;
class CMSController extends Controller
{
    use MessageStatusTrait;

    # Bind location
    protected $view = 'admin.cms.';
    protected $type = 'CMS ';


    # Bind
    protected $contentManagement;

    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            CMS $contentManagement
                        )
                        {
                            $this->contentManagement   = $contentManagement;
                        }

    #index page
    public function index(Request $request)
    {

        $cms_list = $this->contentManagement->paginate(10);

        return view($this->view . 'index')->with([
            'cms_list'   => $cms_list
        ]);
    }
    /**
     * edit
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($type)
    {
        # initiate constructor
        $cms = $this->contentManagement->where('short_name', $type)->first();
        if ($cms != '') {

            return view($this->view . 'edit')->with(['cms' => $cms]);
        } else {
            return  redirect()->route('cms');
        }
    }
    /**
    * @method to update cms data
    * @param Request $request
    * @return json
    */
     public function update(Request $request)
     {

        $rules = [
            'name'    => 'required|string|max:100',
            'details' => 'required|string',
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

         try {
             # initiate constructor
             $query = $this->contentManagement;

             # get the status
             $query = $query->where('id', $request->id)->first();

             if (!$query) {
                 return response()->json([
                     'responseCode'    => (string)$this->errorStatus,
                     'responseMessage' => 'Content not found.',
                 ]);
             }

             $data = [
                 'name'      => $request->name,
                 'details'   => $request->details,
             ];

             # update
             $query->update($data);

             return response()->json([
                 'responseCode'    => (string)$this->successStatus,
                 'responseMessage' => 'CMS updated successfully.',
                 'responseUrl'     => route('cms')
             ]);
         } catch (\Exception $e) {
             return response()->json([
                 'responseCode'    => (string)$this->errorStatus,
                 'responseMessage' => 'Something went wrong.',
                 'error'           => $e->getMessage(),
             ]);
         }
     }
}
