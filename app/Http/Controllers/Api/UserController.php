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
        //dd($request->all());
        $newUser = $this->user->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))

        ]);
        if (!$newUser) {
            return response()->json(['failed_to_create_new_user'], 500);
        }
        $user = User::where('id', $newUser->id)->first();
        return response()->json([
            'success' => true,
            'user' => $user
        ], 200);
    }

    /**
     * Login user
     *
     * Login a user and return his token which will be user with header Bearer {{token}}
     *
     */
    public function authenticate(\App\Http\Requests\LoginRequest $request)
    {
//        dd($request->all());
       // dd($r->only('email'));

        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'invalid_credentials', 'more_info' => []], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'could_not_create_token', 'more_info' => []], 401);
        }
        // all good so return the token
        $message = 'Login Successful';
        $user = \Auth::user();
        return response()->json(compact('message', 'token', 'user'), 200);
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

    // check if user has team in tournament
    function userHasTeamInTournament($tournament_id, $user_id)
    {
        $userteam = \App\UserTeam::where(['tournament_id' => $tournament_id, 'user_id' =>$user_id])->first();
        if (empty($userteam)) {
            return true;
        } else {
            return false;
        }

    }

    function isUniqueTeamName($team_name, $tournament_id)
    {
        $uniqueteam = \App\UserTeam::where(['name' => $team_name, 'tournament_id' => $tournament_id])->get()->toArray();
        if (empty($uniqueteam)) {
            return true;
        } else {
            return false;
        }

    }

    function createTeam(\App\Http\Requests\CreateTeamRequest $request)
    {
        $team_name = $request->name;
        $tournament_id = $request->id;

        if (!$this->userHasTeamInTournament($tournament_id, \Auth::id())) {
            return response()->json(
                [
                    'status' => false,
                    "message" => 'You already have a team in this tournament'
                ], 401);

        } else {
            if ($this->isUniqueTeamName($team_name, $tournament_id)) {
                echo 'available team name';
            } else {
                return response()->json(
                    [
                        'status' => false,
                        "message" => 'Team name not availble'
                    ], 401);
            }
        }


        die;

        $uniqueteam = \App\UserTeam::where(['name' => $userteam, 'tournament_id' => $tournament_id])->get()->toArray();
        if (!empty($uniqueteam)) {
            $data['status'] = "no";
            $data['message'] = "Team already exists";
            return response()->json($data);
        }

    }

}
