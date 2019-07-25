<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/post';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        // if ($this->attemptLoginStatus()) {
        //     if ($this->attemptLogin($request)) {
        //         return $this->sendLoginResponse($request);
        //     }
        // }

        // if ($this->attemptLoginStatus($request) == true && $this->attemptLogin($request) == true) {
        //     return $this->sendLoginResponse($request);
        // } elseif ($this->attemptLoginStatus($request) == false && $this->attemptLogin($request) == true) {
        //     return redirect()->route('login.notactivated');
        // }

        if ($this->attemptLogin($request)) {
            if ($this->checkStatus($request)) {
                return $this->sendLoginResponse($request);
            } elseif ($this->checkStatus($request) == false) {
                Auth::logout($request);
                return redirect()->route('login.notactivated');
            }
        }


        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }


    protected function checkStatus(Request $request)
    {
        $data = $request->only($this->username(), 'password');
        $data['status'] = 1;
        return $this->guard()->attempt($data, $request->filled('remember'));
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $data = $request->only($this->username(), 'password');
        return $data;
    }
}
