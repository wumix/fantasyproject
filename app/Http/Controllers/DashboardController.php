<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\UserTeam;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $data['user_teams'] = \App\UserTeam::where('user_id', \Auth::id())->get()->toArray();
        $x = \App\UserTeam::where('user_id', \Auth::id())->with('user_team_player.player_matches')->get();
        // dd($x->toArray());
        return view('user.dashboard.dashboard', $data);

    }

    function editProfileform(Request $request)
    {
        $data['userprofileinfo'] = \App\User::findOrFail(\Auth::id());
        // dd($userprofileinfo->toArray());
        return view('user.profile.profile_edit_form', $data);

    }

    function postEditProfile(Request $request)
    {



        $user = \App\USER::find(\Auth::id());
        if ($request->hasFile('profile_pic')) {

            $files = uploadInputs($request->profile_pic, 'user_profile_pics');
            $user->profile_pic = $files;
        }
        $user->save();

        dd($request->all());
    }
}