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
use App\Models\BlogNews;
use App\Models\OurServices;
use App\Models\Testimonials;
use App\Models\ContactUs;
use App\Models\GetEnquiry;
use App\Models\ExpactEnquery;
use App\Models\Comment;
use App\Models\VideoLibrary;
use App\Models\ReportConsultation;

class DashboardController extends Controller
{
    use MessageStatusTrait;
    protected $view = 'admin.auth.';

    # Bind banner
    protected $admin;
    protected $page;
    protected $blogsNews;
    protected $ourServices;
    protected $testimonials;
    protected $contactUs;
    protected $getEnquiry;
    protected $expactEnquery;
    protected $comment;
    protected $videoLibrary;
    protected $reportConsultation;

    /**
     * default constructor
     * @param
     * @return
     */
    function __construct(   Admin         $admin,
                            BlogNews      $blogsNews,
                            OurServices   $ourServices,
                            Testimonials  $testimonials,
                            ContactUs     $contactUs,
                            GetEnquiry    $getEnquiry,
                            ExpactEnquery $expactEnquery,
                            Comment     $comment,
                            VideoLibrary    $videoLibrary,
                            ReportConsultation $reportConsultation
                        )
                        {
                            $this->admin              = $admin;
                            $this->blogsNews          = $blogsNews;
                            $this->ourServices        = $ourServices;
                            $this->testimonials       = $testimonials;
                            $this->contactUs          = $contactUs;
                            $this->getEnquiry         = $getEnquiry;
                            $this->expactEnquery      = $expactEnquery;
                            $this->comment            = $comment;
                            $this->videoLibrary       = $videoLibrary;
                            $this->reportConsultation = $reportConsultation;
                        }
    /**
      * get dashboard index
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function index(Request $request)
    {
        $blogsNews_count    = 0;
        $ourServices_count  = 0;
        $testimonials_count = 0;
        $contactUs_count    = 0;
        $getEnquiry_count   = 0;
        $expactEnquery_count= 0;
        $comment_count    = 0;
        $videoLibrary_count   = 0;
        $reportConsultation_count= 0;

        return view( 'admin.index')->with([
                                                      'blogsNews_count'         => $blogsNews_count ?? '',
                                                      'ourServices_count'       => $ourServices_count ?? '',
                                                      'testimonials_count'      => $testimonials_count ?? '',
                                                      'contactUs_count'         => $contactUs_count ?? '',
                                                      'getEnquiry_count'        => $getEnquiry_count ?? '',
                                                      'expactEnquery_count'     => $expactEnquery_count ?? '',
                                                      'comment_count'           => $comment_count ?? '',
                                                      'videoLibrary_count'      => $videoLibrary_count ?? '',
                                                      'reportConsultation_count'=> $reportConsultation_count ?? '',
                                                     ]);
    }
    /**
      * get profile page
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function profile(Request $request)
    {
        $user = Auth::guard('admin')->user();
        return view($this->view . 'profile', ['user' => $user]);
    }
        /**
      * get password page
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function security(Request $request)
    {
        $user = Auth::guard('admin')->user();
        return view($this->view . 'security');
    }
        /**
      * get update profile
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function updateProfile(Request $request)
    {
        $rules = [
            'name'    => 'required|min:3|max:50',
            'mobile'  => 'required',
            'email'   => 'required|string|email|max:255|regex:/^\w+[-\.\w]*@(?!(?:)\.com$)\w+[-\.\w]*?\.\w{2,4}$/',
        ];
        $messages = ['required' => 'The :attribute field is required.'];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'responseCode' => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }

        // dd($request->all());

        $user = Auth::guard('admin')->user();
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        if ($request->profile_image != null) {
            $destinationpath    = base_path() . '/public/images/admin';
            $filename           = $request->profile_image->getClientOriginalName();
            $fileExtension      = $request->profile_image->getClientOriginalExtension();
            $today_date         = date('d-m-Y');
            $random_number      = rand(1111, 9999);
            $filenameData       = $today_date . '_' . $random_number . '_' . $filename;
            $movefilename       = $request->profile_image->move($destinationpath, $filenameData);
            $databsePathForImage = 'images/admin/' . $filenameData;
            $user->profile_image = $databsePathForImage;
        }
        $user->save();
        return response()->json([
            'responseCode' => (string)$this->successStatus,
            'responseMessage' => 'Profile updated successfully.'
        ]);
    }
        /**
      * get password update
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function updatePassword(Request $request)
    {
        // dd($request->all());
        $rules = [
            'old_password'   => 'required',
            'new_password'   => 'required',
            'conf_password'  => 'required',
        ];
        $messages = ['required' => 'The :attribute field is required.'];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => $validator->errors()->first(),
            ]);
        }
        $user = Auth::guard('admin')->user();

        if (Hash::check($request->old_password, $user->password)) {
            if (!Hash::check($request->new_password, $user->password)) {


                if ($request->new_password == $request->conf_password) {
                    $user->password = Hash::make($request->new_password);
                    $user->password_text = $request->new_password;
                    $user->save();
                    return response()->json([
                        'responseCode'    => (string)$this->successStatus,
                        'responseMessage' => 'Password updated successfully.'
                    ]);
                }
                return response()->json([
                    'responseCode'    => (string)$this->errorStatus,
                    'responseMessage' => 'Confirm Password do not match.'
                ]);
            }
            return response()->json([
                'responseCode'    => (string)$this->errorStatus,
                'responseMessage' => 'Old Password And New Password Can Not be Same!'
            ]);
        }
        return response()->json([
            'responseCode'    => (string)$this->errorStatus,
            'responseMessage' => 'Old Password do not match.'
        ]);
    }
    /**
      * get logout
      * @param Illuminate\Http\Request;
      * @return Illuminate\Http\Response;
      */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }
}
