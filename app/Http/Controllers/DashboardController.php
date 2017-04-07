<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\UserTeam;
use DateTime;

class DashboardController extends Controller {

    public function __construct() {
        // $this->middleware('auth');
    }

    public function index() {
        $tournament_id = 1;
        $teamId = 5;
        $data['user_teams'] = \App\UserTeam::where('user_id', \Auth::id())
                ->where('tournament_id', $tournament_id)
                ->get()
                ->toArray();
        //Get matches after team making
        $matcheIdsAfterThisTeamMade = \App\Match::select('id')->where('start_date', '>=', $data['user_teams'][0]['joined_from_match_date'])->get()->toArray();
        if (!empty($matcheIdsAfterThisTeamMade)) {
            $matcheIdsAfterThisTeamMade = array_column($matcheIdsAfterThisTeamMade, 'id');
            $matcheIdsAfterThisTeamMade = [1];
        }
        $data['user_team_players'] = \App\Player::whereHas('player_teams', function($query) use ($teamId) {
                    $query->where('team_id', $teamId);
                })->get()->toArray();
        $userTeamPlayerIds = [0];
        if (!empty($data['user_team_players'])) {
            $userTeamPlayerIds = array_column($data['user_team_players'], 'id');
        }

        $data['team_score'] = \App\Player::whereIn('id', $userTeamPlayerIds)->with([
                    'player_gameTerm_score' => function($query) use ($matcheIdsAfterThisTeamMade) {
                        $query->whereIn('match_id', $matcheIdsAfterThisTeamMade);
                    },
                    'player_gameTerm_score.game_terms' => function($query) {
                        $query->select('name', 'id');
                    },
                    'player_gameTerm_score.points_devision_tournament' => function($query) use ($matcheIdsAfterThisTeamMade) {
                        
                    }
                ])->get()->toArray();


        dd($data['team_score']);
        $x = \App\UserTeam::where('user_id', \Auth::id())->with('user_team_player.player_matches')->get();
        $data['matches'] = \App\Match::all()->where('tournament_id', 1)
                        ->where('matches', '>=', date("Y-m-d"))
                        ->sortByDesc("start_date")->toArray();
        $data['userprofileinfo'] = \App\User::findOrFail(\Auth::id());
        return view('user.dashboard.dashboard', $data);
    }

    function editProfileform(Request $request) {
        $data['userprofileinfo'] = \App\User::findOrFail(\Auth::id());
        //  dd($data['userprofileinfo']->toArray());
        return view('user.profile.profile_edit_form', $data);
    }

    function postEditProfile(Request $request) {


        $user = \App\USER::find(\Auth::id());
        if ($request->hasFile('profile_pic')) {

            $files = uploadInputs($request->profile_pic, 'user_profile_pics');
            $user->profile_pic = $files;
        }
        $user->save();
    }

}
