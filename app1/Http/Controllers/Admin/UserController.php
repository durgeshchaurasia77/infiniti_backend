<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\MessageStatusTrait;
use Illuminate\Support\Facades\Validator;
use DB;
use File;
use Exception;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\UserExport;

class UserController extends Controller
{
    use MessageStatusTrait;
    # Bind location
    protected $view = 'admin.user_management.';

    protected $type = 'User ';


    # Bind outlet
    protected $page;
    protected $user;
    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(User $user)
    {
        $this->user = $user;
        $this->page = config('paginate.pagination');
    }
    public function index(Request $request) {

        Session::forget('lotFilterDataRequestUser');
        Session::put('lotFilterDataRequestUser', $request->all());
        # fetch user  list
        $query = $this->user;

        if(($request->name == '') and ($request->email == '') and ($request->phone == ''))
        {
            # if nothing is given in input then return all
            $userList = $query->orderBy('id', 'desc')->paginate(10);
        }else{
            # Filtered Output
            $userList = $query->searchBetween($request->name, $request->email, $request->phone)
                           ->orderBy('id', 'desc')
                           ->paginate(10);
        }

        return view($this->view.'index')->with([
                                                'userList'  => $userList ?? [],
                                                'name'      => $request->name ?? '',
                                                'email'     => $request->email ?? '',
                                                'phone'     => $request->phone ?? '',
                                                ]);
    }
    // store the user data .
    public function store(Request $request) {
        try {
            // dd($request->all());
              $data = [
                  'name'  => 'required|string|max:100',
                  'email' => 'required|email|max:200',
                  'phone' => 'required|numeric|digits:10',
                  'image' => 'nullable|mimes:jpeg,png,jpg,gif',
              ];

              $messages = [ 'required' => 'The :attribute field is required.'];

              #validator
              $validator = Validator::make($request->all(), $data, $messages);

              #if validation fails
              if($validator->fails())
              {
                  return response()->json([
                      'responseCode'    => (string)$this->errorStatus,
                      'responseMessage' => $validator->errors()->first()
                  ]);
              }

              # check the requested sub category already exist or not
              $userCheck = $this->user->where('email', $request->email)->first();
              if ($userCheck) {
                  return response()->json([
                      'responseCode'    => (string)$this->errorStatus,
                      'responseMessage' => 'Sorry, this email already exists.'
                  ]);
              }
              # check the requested sub category already exist or not
              $userCheck = $this->user->where('phone', $request->phone)->first();
              if ($userCheck) {
                  return response()->json([
                       'responseCode'    => (string)$this->errorStatus,
                       'responseMessage' => 'Sorry, this Phone already exists.'
                   ]);
              }

              #upload image
              if ($request->hasfile('image'))
              {
                  $file = $request->file('image');
                  $extension = $file->getClientOriginalExtension();
                  $filename = ((string)(microtime(true)*10000)).'.'.$extension;
                  $file->move(public_path('images/admin/user/'), $filename);
                  $image='images/admin/user/'.$filename;
              }else{
                  $image = null ;
              }

              $password = rand(100000, 999999);  // Fixed the random OTP generation

                $title = 'Hi ' . $request->name;
                $subject = 'Buda App - New Password Creation!';
                $email_data = ['email' => $request->email];
                # Send password to user's email
                Mail::send('admin.user_management.email.user_registration', ['title' => $title, 'password' => $password], function ($message) use ($email_data, $subject) {
                    $message->from(env('ADMIN_FROM_EMAIL'), 'Buda App');
                    $message->to($email_data['email']);
                    $message->subject($subject);
                });

              $value                 = new $this->user;
              $value->name           = $request->name ?? null;
              $value->email          = $request->email ?? null;
              $value->phone          = $request->phone ?? null;
              $value->password       = $password ?? null;
              $value->show_password  = $password ?? null;
              $value->image          = $image ??'';
              $value->created_at     = date('Y-m-d H:i:s');
              $value->save();

              if(isset($value->id))
              {
                        return response()->json([
                                        'responseCode'    =>  (string)$this->successStatus,
                                        'responseMessage' => 'User Added Successfully.'
                                    ]);
              }else
              {
                    return response()->json([
                                        'responseCode'    =>  (string)$this->errorStatus,
                                        'responseMessage' => 'Something went wrong.'
                                      ]);
              }

          } catch (Exception $e) {
                    return response()->json([
                                        'responseCode'    =>  $this->errorStatus,
                                        'responseMessage' => 'Something went wrong.'
                                      ]);
          }
    }
        /**
      * edit user data
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function edit($id)
    {

         try
         {
            $userId = base64_decode($id);

             $userData['userData'] = $this->user->findOrFail($userId);

             return view($this->view.'edit',$userData);
         } catch (Exception $e) {
            return response()->json([
                'responseCode'    =>  $this->errorStatus,
                // 'responseMessage' => 'Something went wrong.'. $e->getMessage()
                'responseMessage' => 'Something went wrong.'
              ]);
         }
    }
    /**
      * update user data
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function update (Request $request) {
        $rules = [
            'name'  => 'required|string|max:100',
            'email' => 'required|email|max:200',
            'phone' => 'required|numeric|digits:10',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif',
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
      //   check duplicate
        $checkDuplicate = $this->user->where('email',$request->email)
                               ->where('id','!=',$request->id)
                               ->first();
          if($checkDuplicate != '')
          {
              return response()->json([
                  'responseCode'    => (string)$this->errorStatus,
                  'responseMessage' => 'Sorry, this email already exists',
              ]);
          }
        try {

            DB::beginTransaction();

            $checkUser = $this->user->where('id', $request->id)->first();


          #upload image
          if ($request->hasfile('image'))
          {
              $file = $request->file('image');
              $extension = $file->getClientOriginalExtension(); // getting image extension
              $filename = ((string)(microtime(true)*10000)).'.'.$extension;
              File::delete(public_path($request->image));
              $file->move(public_path('images/admin/user/'), $filename);
              $image = 'images/admin/user/'.$filename;
          }else{
              if($checkUser->image != '')
              {
                  $image = $checkUser->image;
              }
              else
              {
                $image = '';
              }
          }

            $value                 = $this->user->where('id', $request->id)->first();
            $value->name           = $request->name ?? null;
            $value->email          = $request->email ?? null;
            $value->phone          = $request->phone ?? null;
            $value->image          = $image ??'';
            $value->updated_at     = date('Y-m-d H:i:s');
            $value->update();
            DB::commit();

            if(isset($value->id))
            {
                return response()->json([
                            'responseCode'=>(string)$this->successStatus,
                            'responseMessage' => 'User Updated Successfully.'
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
                'responseCode'    =>  $this->errorStatus,
                'responseMessage' => 'Something went wrong.'. $e->getMessage()
                // 'responseMessage' => 'Something went wrong.'
              ]);

      }
    }
    /**
     * change the status of user data
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function status($id)
    {
        # initiate constructor
        $query = $this->user;

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
        return [$this->successKey => $this->successStatus, $this->messageKey => $message];
    }
    /**
     * delete user data
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function delete(Request $request,$id)
    {
        // dd($id);
      # delete role by id
      $result = $this->user->where('id', $id)->delete();

        if($result){
            # return success
            return  [$this->successKey  =>  $this->successStatus,  $this->messageKey  => $this->deleteMessage($this->type)];
        }
    }
    /**
     * Export user data using session with behalf of filter data
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function exportUser(Request $request)
    {
        $fileName = 'User.csv';
        $filterRequest = Session::get('lotFilterDataRequestUser');

        $name  = $filterRequest['name'] ?? '';
        $email = $filterRequest['email'] ?? '';
        $phone = $filterRequest['phone'] ?? '';

        // Start building the query
        $query = User::query();

        if ($name !== '') {
            $query->where('name', 'like', "%$name%");
        }

        if ($email !== '') {
            $query->where('email', 'like', "%$email%");
        }

        if ($phone !== '') {
            $query->where('phone', 'like', "%$phone%");
        }

        // Order the query results and get the data
        $usersData = $query->orderBy('id', 'desc')->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0",
        ];

        $columns = ['S.No', 'Name', 'Email', 'Phone', 'Created At'];

        $callback = function () use ($usersData, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($usersData as $key => $user) {
                $row = [
                    'S.No'       => $key + 1,
                    'Name'       => $user->name ?? '',
                    'Email'      => $user->email ?? '',
                    'Phone'      => $user->phone ?? '',
                    'Created At' => $user->created_at->format('Y-m-d H:i:s') ?? '',
                ];

                fputcsv($file, array_values($row));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    /**
     * Download the sample data in csv format
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function sampleExportCsv(Request $request)
    {

        return Excel::download(new UserExport, 'users.csv');
    }

    /**
     * bulk upload user data in csv format
    * @param Illuminate\Http\Request;
    * @return Illuminate\Http\Response;
    */
    public function userBulkStore(Request $request)
    {
        // Check the request method
        if ($request->method() == 'GET') {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Invalid request method',
            ]);
        }

        // Validate the uploaded file
        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:csv,txt', // Ensure the file is a valid CSV
        ]);

        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        // Get the file path
        $path = $request->file('file')->getRealPath();
        $data = array_map('str_getcsv', file($path));

        // Check if the file contains valid data
        if (empty($data) || count(array_filter($data[0])) == 0) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'The uploaded CSV file is empty or invalid',
            ]);
        }

        // Import user data
        try {
            $import = new ImportUser();
            Excel::import($import, $request->file('file'));

            // Check for aborted data
            if (count($import->allAbortData()) != 0) {
                Session::forget('allAbortData');
                Session::put('allAbortData', $import->allAbortData());

                return response()->json([
                    'responseCode'    => (string)$this->errorStatus,
                    'responseMessage' => 'Some records could not be imported',
                    'responseUrl'     => route('import.index')
                ]);

            }

            // Respond with success
            return response()->json([
                'responseCode'    => '200',
                'responseMessage' => 'User data imported successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'An error occurred during import: ' . $e->getMessage(),
                // 'responseMessage' => 'Somthing went wrong',
            ]);
        }
    }
    public function indexImport(Request $request)
    {
        $allAbortData = Session::get('allAbortData');

           return view($this->view . 'import.index')->with([

                'allAbortData' => $allAbortData ?? [],

            ]);
    }
}
