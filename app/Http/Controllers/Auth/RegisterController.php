<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;

/**
 * Class RegisterController
 * @package %%NAMESPACE%%\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new user as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

    use RegistersUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {

        return view('adminlte::auth.register');
    }

    public function showUserRegistrationForm(Request $request)
    {


        return view('auth.register');
    }

    /**
     * Where to redirect user after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Function by Umair Hamid
     * Register user from admin
     * @param Request $request
     * @return type
     */
    public function postAddUserFromAdmin(Request $request)
    {
        // dd($request);
        $this->validator($request->all())->validate();
        if ($request->hasFile('profile_pic')) {
            $files = uploadInputs($request->profile_pic, 'profile_pics');
            $request->request->add(['profile_pics', $files]);
            event(new \Illuminate\Auth\Events\Registered($user = $this->create($request->all())));
        }
        return redirect()->route('addUser')->with('status', 'User was added');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'username' => 'sometimes|required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'terms' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {

        $fields = [
            'name' => $data['name'],
            'email' => $data['email'],
            'profile_pic' => isset($data[1]) ? $data[1] : '',
            'password' => bcrypt($data['password']),
        ];
        if (config('auth.providers.user.field', 'email') === 'username' && isset($data['username'])) {
            $fields['username'] = $data['username'];
        }
        return User::create($fields);
    }

    /**
     * The user has been registered. Override
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    public function addUserRefferalPoints($userid, $referral_key)
    {

    }

    protected function registered(Request $request, $user)
    {

        $userActionKey = 'user_signup';
        $actionPoints = \App\UserAction::getPointsByKey($userActionKey);
        $objTourmament = \App\Tournament::all()->sortBy("start_date")->where('start_date', '<=', getGmtTime())->Where('end_date', '>=', getGmtTime());
        $tournaments_list = $objTourmament->toArray();
        foreach ($tournaments_list as $row) {
            $array = array(
                ['tournament_id' => $row['id'], 'action_key' =>
                    'pusrchase_tournament', 'user_id' => $user->id, 'points_scored' => $actionPoints]
            );
            \App\UserPointsScored::insert($array);
        }





//
//        //Saving user points scored
//        $objPointsScored = new \App\UserPointsScored;
//        $objPointsScored->user_id = $user->id;
//        $objPointsScored->action_key = $userActionKey;
//        $objPointsScored->points_scored = $actionPoints;
//        $objPointsScored->save();
        \Mail::to($user->email)->send(new \App\Mail\SignUp($user->name));

        //Sending email to registered user
//        Mail::send('emails.send', ['title' => $title, 'message' => $message], function ($message) {
//            $message->from('no-reply@scotch.io', 'Scotch.IO');
//            $message->to('batman@batcave.io');
//        });
    }

}
