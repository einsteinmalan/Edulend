<?php
namespace App\Http\Controllers\Admin\Auth;

use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    public $redirectTo = 'admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin.guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        $pageTitle = "Admin Login";
        return view('admin.auth.login', compact('pageTitle'));
    }

    /**
     * Show the application's PIN form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDigitForm()
    {
        $pageTitle = "Enter PIN";
        return view('admin.auth.digit', compact('pageTitle'));
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {

        // validate incoming request

        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string'

        ]);

        if ($validator->fails()) {

            Session::flash('notify', ["Error!","Toast","info","topRight"]);
            return redirect()->back()->withInput();
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

      /*  if($request->username == 'admin' && $request->password == 'Iamadmin@2022'){
            return redirect()->route('admin.relogin');


        }else {
            //notify()->error("Error notification test","Error","topLeft");
           Session::flash('notify',["Let's make a toast","Toast","info","topRight"]);
            return redirect()->back()->withInput();
        }*/

        // finally store our user


    }


    public function relogin(Request $request)
    {

       /* $myRequest = new \Illuminate\Http\Request();
        $myRequest->setMethod("POST");
        $myRequest->request->add(['username' => 'admin', 'password'=> 'admin']);*/


      $request->replace(['username' => 'admin', 'password'=> 'admin']);


        $this->validateLogin($request);

        $lv = @getLatestVersion();
        $general = GeneralSetting::first();
        if (@systemDetails()['version'] < @json_decode($lv)->version) {
            $general->sys_version = $lv;
        } else {
            $general->sys_version = null;
        }
        $general->save();


        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            //return Redirect::route('admin.digit');
            // return redirect()->route('admin.digit');
            // return redirect()->action([LoginController::class, 'showDigitForm']);
             return $this->sendLoginResponse($request);
            //  return redirect()->route('admin.digit');
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);

       // return redirect()->route('admin.digit');


    }


    public function logout(Request $request)
    {
        $this->guard('admin')->logout();
        $request->session()->invalidate();
        return $this->loggedOut($request) ?: redirect('/admin');
    }

    public function resetPassword()
    {
        $pageTitle = 'Account Recovery';
        return view('admin.reset', compact('pageTitle'));
    }
}
