<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\UserTeam;
use DateTime;
use phpDocumentor\Reflection\Types\Null_;

class DashboardController extends Controller {

    public function __construct() {
        // $this->middleware('auth');
    }

    public function teamDetail(Request $request) {
        // $stats=\App\Player::with('game_types')->firstOrFail()->toArray();
        // dd(get_individual_player_score(1,5,2));
//        $date = new DateTime();
//        $date=$date->format('Y-m-j h:i:s');
//
//        $newdate = strtotime ( '-5 hour' , strtotime ( $date ) ) ;
//        $newdate = date ( 'Y-m-j h:i:s' , $newdate );
//        $userteamsave=\App\UserTeam::find($request->team_id);
//       echo $newdate;
//       die;
//        $tournamentid=$request->tournament_id
//dd($tournamentid);
//        die;
        // dd($request->all());

        //$tournament_id=2;
        $transferflag=0; // if tournament over hides transfer button

        $teamId = $request->team_id;
        $data['user_teams'] = \App\UserTeam::where('id',$teamId)->where('user_id', \Auth::id())->get()->toArray();
        //dd($data['user_teams']);
        $tournament_id=$data['user_teams'][0]['tournament_id'];
        $date_end=\App\Tournament::where('id',$tournament_id)->firstOrFail()->end_date;
        $datetime = new \DateTime();
        $datenow = $datetime->format('Y-m-d H:i:s');

        if($datenow>$date_end){
            $transferflag=1;
        }
         $data['transferflag']=$transferflag;
        $data['user_team_player_transfer'] = \App\UserTeam::where('id', $request->team_id)
                ->with('user_team_player_transfers.player_transfer')
                ->get();
        // dd($data['user_team_player_transfer']->toArray());
        // //Get matches after team making
        if ($data['user_teams'][0]['joined_from_match_date'] == null) {
            return view('pages.team_incomplete');
        }
        $matcheIdsAfterThisTeamMade = \App\Match::select('id')
                        ->where('start_date', '>=', $data['user_teams'][0]['joined_from_match_date'])
                        ->get()->toArray();
        //  dd($matcheIdsAfterThisTeamMade);
        if (!empty($matcheIdsAfterThisTeamMade)) {
            $matcheIdsAfterThisTeamMade = array_column($matcheIdsAfterThisTeamMade, 'id');
            //  $matcheIdsAfterThisTeamMade = [1];
        }
        $data['user_team_players'] = \App\Player::whereHas('player_teams', function ($query) use ($teamId) {
                    $query->where('team_id', $teamId);
                })->get()->toArray();
        $userTeamPlayerIds = [0];
        if (!empty($data['user_team_players'])) {
            $userTeamPlayerIds = array_column($data['user_team_players'], 'id');
        }
        // $matcheIdsAfterThisTeamMade=[1,2,3,4,5,6,7,8,9,10];
        //dd($matcheIdsAfterThisTeamMade);
        //  $userTeamPlayerIds=[1,2,3,4,5,6,7,8,9,10];
        //dd($userTeamPlayerIds);
        $data['team_score'] = \App\Player::whereIn('id', $userTeamPlayerIds)->with(['player_roles', 'player_matches',
                    'player_gameTerm_score' => function ($query) use ($matcheIdsAfterThisTeamMade) {
                        $query->whereIn('match_id', $matcheIdsAfterThisTeamMade);
                    },
                    'player_gameTerm_score.game_terms' => function ($query) {
                        $query->select('name', 'id');
                    },
                    'player_gameTerm_score.points_devision_tournament' => function ($query) use ($matcheIdsAfterThisTeamMade,$tournament_id) {
                        $query->where('tournament_id',$tournament_id);
                    }, 'player_actual_teams'=>function ($query) use($tournament_id) {
                $query->where('tournament_id',$tournament_id);
            }
                ])->get()->toArray();


        // dd($data['team_score']);
//       debugArr($data['team_score']);
//       die;
        $x = \App\UserTeam::where('user_id', \Auth::id())->with('user_team_player.player_matches')->get();
        $data['matches'] = \App\Match::all()->where('tournament_id', $tournament_id)
                        ->where('matches', '>=', date("Y-m-d"))
                        ->sortByDesc("start_date")->toArray();

        $data['userprofileinfo'] = \App\User::findOrFail(\Auth::id());
        // dd($data['user_team_player_transfer']->toArray());
        return view('user.team_detail', $data);
    }

    function index() {
        $data['user_teams'] = \App\UserTeam::where('user_id', \Auth::id())
                ->get()
                ->toArray();
        //   dd($data);
        $data['userprofileinfo'] = \App\User::findOrFail(\Auth::id());
        return view('user.dashboard.dashboard', $data);
    }

    function teamHome() {
        $data['user_teams'] = \App\UserTeam::where('user_id', \Auth::id())->with('teamtournament')
                ->get()
                ->toArray();
        //dd($data['user_teams']);
        $data['userprofileinfo'] = \App\User::findOrFail(\Auth::id());
        return view('user.teamhome', $data);
    }

    function editProfileform(Request $request) {
        $data['userprofileinfo'] = \App\User::findOrFail(\Auth::id());
        //  dd($data['userprofileinfo']->toArray());
        //  dd($data);
        return view('user.profile.profile_edit_form', $data);
    }

    function postEditProfile(Request $request) {


        $user = \App\USER::find(\Auth::id());
        if ($request->hasFile('profile_pic')) {

            $files = uploadInputs($request->profile_pic, 'user_profile_pics');
            $user->profile_pic = $files;
        }
        $user->save();

        return redirect()->back()->with('status', 'Profile successfully saved.');
    }

}
