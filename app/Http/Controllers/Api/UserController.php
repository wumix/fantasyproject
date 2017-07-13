<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \JWTAuth;
use App\User;
use App\User_Type;
use Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Register
     *
     * Register a new user into our system.
     *
     */
    public function logout()
    {
        if (Auth::logout()) {
            return response()->json(['status' => 'fail', 'error' => 'could_not_create_token'], 500);
        }
    }

    public function create(\App\Http\Requests\RegistrationRequest $request)
    {
        $newUser = $this->user->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => $request->get('password')

        ]);
        if (!$newUser) {
            return response()->json(['failed_to_create_new_user'], 500);
        }
        $user = User::where('id', $newUser->id)->first();
        return response()->json([
            'success' => true,
            'user' => $user
        ]);
    }

    /**
     * Login user
     *
     * Login a user and return his token which will be user with header Bearer {{token}}
     *
     */
    public function authenticate(\App\Http\Requests\LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'status' => 'fail', 'error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['status' => 'fail', 'error' => 'could_not_create_token'], 500);
        }
        // all good so return the token
        $status = 'success';
        $user = \Auth::user();
        return response()->json(compact('status', 'token', 'user'));
    }

    /**
     * Change user's password
     *
     * This will use to change the pasword of user.
     *
     */
    function changePassword(\App\Http\Requests\ChangePasswordRequest $request)
    {
        $data = $request->all();
        $user = User::where('email', $data['email'])->get();
        //Changing the password only if is different of null
        if (isset($data['oldPassword']) && !empty($data['oldPassword']) && $data['oldPassword'] !== "" && $data['oldPassword'] !== 'undefined') {
            //checking the old password first
            $check = Auth::guard('web')->attempt([
                'email' => $user[0]->email,
                'password' => $data['oldPassword']
            ]);
            if ($check && isset($data['newPassword']) && !empty($data['newPassword']) && $data['newPassword'] !== "" && $data['newPassword'] !== 'undefined') {
                $user[0]->password = bcrypt($data['newPassword']);
                //Changing the type
                $user[0]->save();
                return json_encode(['status' => true, "message" => "Password changed successfully"], 200); //sending the new token
            } else {
                return response()->json(['status' => false, "message" => 'Wrong password information'], 401);
            }
        }
        return response()->json(['status' => false, "message" => 'Wrong password information'], 401);
    }

}
