<?php

namespace App\Http\Controllers\Backend;

use Alert;
use Auth;
use Flash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;
use Session;

class AdminController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = 'admin/panel';

    public function __invoke()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect(route('admin_panel'));
        }

        return view('backend.pages.login.index');
    }

    public function index()
    {
        return view('backend.pages.panel.index', ['title' => 'Admin Panel']);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);

        // also check for "admin" status
        $credentials['admin'] = 1;

        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            // success
            Alert::message('Welcome Back!');

            Flash::success('Welcome ' . auth()->user()->name);

            // save visit log
            VisitLog::save();

            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Log the user out of admin.
     *
     * @param Request $request
     * @return Redirect
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // remove all session data
        session_regenerate_id(true);

        $request->session()->flush();
        Session::flush();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : 'admin');
    }
}
