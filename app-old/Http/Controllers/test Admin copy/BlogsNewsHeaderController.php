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
use App\Models\BlogsHeader;

class BlogsNewsHeaderController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.blogs_news.header.';

    protected $type = 'Blogs&News Header ';


    # Bind outlet
    protected $blogsHeader;
    protected $page;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(
                            BlogsHeader          $blogsHeader
                        )
                        {
                            $this->blogsHeader = $blogsHeader;
                            $this->page = config('paginate.pagination');
                        }

    /**
      * edit blogsHeader
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
      public function edit(Request $request)
      {
         try
         {
            $blogsHeaderData = [];
            $blogsHeaderData['blogsHeaderData'] = $this->blogsHeader->first();

             return view($this->view.'edit',$blogsHeaderData);
         } catch (Exception $e) {

            return response()->json([
                'responseCode' => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong !'
            ]);
         }
      }
        /**
     * update blogsHeader page
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function update (Request $request) {

        $rules = [
            'title'        => 'required|max:50',
            'description'  => 'required|max:1000',

        ];

        $messages = [ 'required' => 'The :attribute field is required.'];

        #validator
        $validator = Validator::make($request->all(), $rules, $messages);

        #if validation fails
        if($validator->fails())
        {
            return response()->json([
                                    'responseCode'=>(string)$this->errorStatus,
                                    'responseMessage' => $validator->errors()->first()
                                ]);
        }

        try {

            DB::beginTransaction();


            $value = $this->blogsHeader->where('id', $request->id)->first();

            if($value != '')
            {
                $value->title       = $request->title ?? '';
                $value->description   = $request->description ?? '';
                $value->updated_at    = date('Y-m-d H:i:s');
                $value->update();
            }
            else
            {
                $value               = new $this->blogsHeader;
                $value->title      = $request->title ?? '';
                $value->description  = $request->description;
                $value->save();
            }
            DB::commit();

            if(isset($value->id))
            {
                return response()->json([
                            'responseCode'    =>(string)$this->successStatus,
                            'responseMessage' => 'Blogs&News Header Updated Successfully.',
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
                'responseCode'=>(string)$this->errorStatus,
                'responseMessage' => 'Something went wrong.'
            ]);

        }
    }
}
