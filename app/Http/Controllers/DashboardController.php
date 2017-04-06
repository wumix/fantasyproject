<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\UserTeam;
use DateTime;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $data['user_teams'] = \App\UserTeam::where('user_id', \Auth::id())
            ->with([
                'teamtournament.tournament_matches.match_players' => function ($query) {
                    $query->where('tournament_matches.start_date',' >=', '2017-04-05 18:00:00');
                }
            ])->whereHas('matches',function($query) {
                $query->where('start_date', '>=','2017-04-05 18:00:00'); })
            ->get()->toArray();
        dd($data['user_teams']);
        $x = \App\UserTeam::where('user_id', \Auth::id())->with('user_team_player.player_matches')->get();
        $data['matches'] = \App\Match::all()->where('tournament_id', 1)
            ->where('matches', '>=', date("Y-m-d"))
            ->sortByDesc("start_date")->toArray();
        // dd($data['matches']);
        $data['userprofileinfo'] = \App\User::findOrFail(\Auth::id());
        return view('user.dashboard.dashboard', $data);

    }

    function editProfileform(Request $request)
    {
        $data['userprofileinfo'] = \App\User::findOrFail(\Auth::id());
        //  dd($data['userprofileinfo']->toArray());
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


    }
}