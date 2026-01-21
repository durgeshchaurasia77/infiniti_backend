<?php

namespace App\Http\Controllers\Admin;

use App\Http\Traits\MessageStatusTrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Validator;
use Hash;
#Models
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.auth.';

    # Bind admin
    protected $admin;

    /**
     * default constructor
     * @param
     * @return
     */

    function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }
    /**
    * @method to Login Page
    * @param Request $request
    * @return json
    */
    public function index(Request $request)
    {

        return view($this->view . 'login');
    }
    /**
    * @method to Login to account
    * @param Request $request
    * @return json
    */
    public function login(Request $request)
    {
        #  Validate field Data
        $validator = Validator::make($request->all(), [
            'email'        => 'required',
            'password'     => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }
        #
        $credentials = $request->only('email',  'password');
        try {
            if (!Auth::guard('admin')->attempt($credentials))
            {
                return response()->json([
                    'responseCode'    => (string) $this->errorStatus,
                    'responseMessage' => 'Given credential are not matched'
                ]);

            } else {
                $user = Auth::guard('admin')->user();
                if ($user->user_type = 'admin')
                {
                    return response()->json([
                        'responseCode'    =>(string)$this->successStatus,
                        'responseMessage' => 'You have successfully logged in',
                        'responseUrl'     =>   route('home')
                    ]);

                } else {

                    Auth::guard('admin')->logout();
                    return response()->json([
                        'responseCode'    =>(string)$this->errorStatus,
                        'responseMessage' => 'Your Account is InActive',
                    ]);

                }
            }
        } catch (\Exception $e) {

            # return response
            return response()->json([
                'responseCode'    =>(string)$this->errorStatus,
                'responseMessage' => 'Something Went Wrong',
            ]);
        }
    }
    /**
    * @method to Forgot Password Page
    * @param Request $request
    * @return json
    */
    public function forgotPassword(Request $request)
    {
        return view($this->view . 'send_otp');
    }
    /**
    * @method to Send Otp
    * @param Request $request
    * @return json
    */
    public function sendOTP(Request $request)
    {

        $data = ['email' => 'required'];
        # validation check
        $validator = Validator::make($request->all(), $data);
        if ($validator->fails()) {

            if ($validator->fails()) {
                return response()->json([
                    'responseCode' => (string)$this->errorStatus,
                    'responseMessage' => $validator->errors()->first(),
                ]);
            }

        }

        try {

            $count = $this->admin->where('email', $request->email)->count();

            if ($count > 0) {

                $user = $this->admin->where(['email' => $request->email])->first();

                if ($user)
                {


                    $url       = url('/admin_verify_otp') . '/' . base64_encode($request->otp ?? '');
                    $otp       = rand('1000', '9999');
                    $data      = $this->admin->where('email', $request->email)->update(['otp' => $otp]);

                    $arrayData = ['otp' =>  $otp,'name'=>$user->name];
                    $title     = 'Hi '.$user->name;
                    $subject   = 'Request for Forgot Passord please verify your OTP!';
                    $email_data = array('email' =>$user->email);

                    $mail=\Mail::send('admin.emails.forget-template', ['title' => $title,'postData' => $arrayData], function ($message) use ($email_data,$subject)
                    {

                        $message->subject($subject);
                        $message->to($email_data['email']);

                    });

                    return response()->json([
                        'responseCode' => (string)$this->successStatus,
                        'responseMessage' => 'Send OTP successfully!',
                        'responseUrl'   =>   route('admin_verify_otp', encrypt($request->email))
                    ]);
                }
            } else {
                return response()->json([
                    'responseCode' => (string)$this->errorStatus,
                    'responseMessage' => 'Sorry email not registered our records'
                ]);


            }
        } catch (\Exception $e) {

            return response()->json([
                'responseCode' => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong !'
            ]);
        }
    }
    /**
    * @method to Verify otp page
    * @param Request $request
    * @return json
    */
    public function verifyOTP($email)
    {

        $data['email'] = decrypt($email);
        return view($this->view . 'verify_otp', $data);
    }
    /**
    * @method to match the otp
    * @param Request $request
    * @return json
    */
    public function matchOTP(Request $request)
    {
        // dd($request->all());
        if ($request->submit_type == 'Submit') {
            $user = $this->admin->where('otp', $request->otp)->where('email', $request->email)->first();

            if ($user) {
                return response()->json([
                    'responseCode' => (string)$this->successStatus,
                    // 'responseMessage' => 'Welcome for Reset Password',
                    'responseUrl'     => route('reset_password')
                ]);
            } else {
                return response()->json([
                    'responseCode' => (string)$this->errorStatus,
                    'responseMessage' => 'Please, Enter valid Otp',
                ]);
            }
        } else {
            $count = $this->admin->where('email', $request->email)->count();

            if ($count > 0) {
                $user = $this->admin->where(['email' => $request->email])->first();
                if ($user) {
                    $otp = rand('1000', '9999');

                    $data = $this->admin->where('email', $request->email)->update(['otp' => $otp]);
                    $arrayData = ['otp' =>  $otp,'name'=>$user->name];
                    $title     = 'Hi '.$user->name;
                    $subject   = 'Request for Forgot Passord please verify your OTP!';
                    $email_data = array('email' =>$user->email);

                    $mail=\Mail::send('admin.emails.forget-template', ['title' => $title,'postData' => $arrayData], function ($message) use ($email_data,$subject)
                    {

                        $message->subject($subject);
                        $message->to($email_data['email']);

                    });

                    return response()->json([
                        'responseCode' => (string)$this->successStatus,
                        'responseMessage1' => 'Send OTP successfully!',
                        'responseUrl'   =>   route('admin_verify_otp', encrypt($request->email))
                    ]);


                }
            }
        }
    }
    /**
    * @method to after match the otp open reset Password page
    * @param Request $request
    * @return json
    */
    public function resetPassword()
    {
        // $user = Auth::guard('admin')->user();
        $user = $this->admin->first();
        $data['email'] = $user->email;
        return view($this->view . 'reset_password',$data);
    }
    /**
    * @method to reset the password and store
    * @param Request $request
    * @return json
    */
    public function resetSubmitPassword(Request $request, $email)
    {


        try {
            # Validate request data
            $data = [
                'password'     => 'required|same:confirm_password',
            ];

            # validation check
            $validator = Validator::make($request->all(), $data);
            if ($validator->fails()) {

                return response()->json([
                    'responseCode' => (string)$this->errorStatus,
                    'responseMessage' => $validator->errors()->first(),
                ]);
            }
            $user = $this->admin->where('email', $email)->first();

            if (Hash::check($request->password, $user->password)) {
                return response()->json([
                    'responseCode' => (string)$this->errorStatus,
                    'responseMessage' => 'Old Password And New Password Can Not be Same!'
                ]);
            } else {


                $arrayData = [
                    'password'            => Hash::make($request->password),
                    'password_text'       => $request->password,
                ];

                $createUser = $user->update($arrayData);
                return response()->json([
                    'responseMessage' => 'Password updated successfully',
                    'responseCode'    =>  $this->successStatus,
                    'responseUrl'     =>  route('admin_login')
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'responseCode' => (string)$this->errorStatus,
                'responseMessage' => 'Something went wrong !'
            ]);
        }
    }

}
