<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Socialite;

class LoginController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating user for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

    use AuthenticatesUsers {
        attemptLogin as attemptLoginAtAuthenticatesUsers;
    }

    protected $userRedirect = '/dashboard';

    /**
     * Show the application's front-emd login form.
     *
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {


//        if (\Auth::user()->user_type == 0) {
//            return redirect('admin/dashboard');
//        } else {
//            $intendedroute = \Request::session()->get('_previous', route('userdashboard'));
//            return redirect($intendedroute['url']);
//        }
        return redirect()->intended('dashboard');
    }

    public function showLoginForm()
    {
        $objTourmament = \App\Tournament::all()->toArray();
        $data['tournaments_list'] = $objTourmament;

        return view('auth.login', $data);
    }

    /**
     * Show admin login form
     */
    public function showAdminLoginForm()
    {

        return view('adminlte::auth.login');
    }

    /**
     * Where to redirect user after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Redirect user based upon condition
     * @return type
     */
    protected function redirectTo()
    {


        return (\Auth::user()->user_type == 0) ? 'admin/dashboard' : $this->userRedirect;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Returns field name to use at login.
     *
     * @return string
     */
    public function username()
    {
        return config('auth.providers.user.field', 'email');
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        if ($this->username() === 'email')
            return $this->attemptLoginAtAuthenticatesUsers($request);
        if (!$this->attemptLoginAtAuthenticatesUsers($request)) {
            return $this->attempLoginUsingUsernameAsAnEmail($request);
        }
        return false;
    }

    /**
     * Attempt to log the user into application using username as an email.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attempLoginUsingUsernameAsAnEmail(Request $request)
    {
        return $this->guard()->attempt(
            ['email' => $request->input('username'),
                'password' => $request->input('password')],
            $request->has('remember'));
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToFacebookProvider()
    {

        return Socialite::driver('facebook')
            ->scopes(['email', 'public_profile'])
            ->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleFacebookProviderCallback()
    {
        $userObj = new \App\User;
        $socialProvider = 'facebook';
        $user = $userObj->createOrGetUser(Socialite::driver('facebook')->stateless()->user(), $socialProvider);
        if (empty($user)) {
            return redirect()->to(route('signUp'))
                ->withErrors(['We are not able to grab your facebook email due to some restrictions. Please signup from here.']);
        }
        auth()->login($user);
        return redirect()->to($this->userRedirect);
    }

}
