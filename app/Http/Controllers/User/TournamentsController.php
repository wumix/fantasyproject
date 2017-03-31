<?php

namespace App\Http\Controllers\user;

use \Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use DateTimeZone;

class TournamentsController extends Controller {

    function __construct() {
        $this->objTourmament = new \App\Tournament;
    }

    function showTournamentDetails($tournament_id) {
        try {
            $data['players_in_tournament'] = [];
            $data['tournament_detail'] = \App\Tournament::where('id', $tournament_id)
                            ->with(['tournament_game' => function () {
                                    
                                }, 'tournament_game.game_players' => function () {
                                    
                                }, 'tournament_players' => function ($query) {
                                    
                                }]
                            )->firstOrFail()->toArray();

            ////////Making player price
            //End making player price
            if (!empty($data['players_list']['tournament_players'])) {
                $data['players_in_tournament'] = array_flatten(array_column(array_column($data['players_list']['tournament_players'], 'pivot'), 'player_id'));
            }
            return view('user.tournaments.show_torunament', $data);
        } catch (ModelNotFoundException $ex) {
            abort(404);
        }
    }

    function playTournament($tournament_id) {
        //      userdata = User::with( 'orders' )->where( 'userId', 15 )->first();
//        $sum = $userdata[ 'orders' ]->sum( 'amount' );
//        \App\user_points_consumed::find($userid)->first();



        $userteam = \App\UserTeam::where(['tournament_id' => $tournament_id, 'user_id' => Auth::id()])->first();


        if ($userteam == null) {
            $data['team_name'] = NULL;
        } else {
            $data['team_name'] = $userteam->name;
            $data['team_id'] = $userteam->id;
            $data['user_team_players'] = \App\UserTeam::where('id', $userteam->id)
                            ->with('user_team_player')
                            ->firstOrFail()->toArray();
        }
        try {
            $data['players_in_tournament'] = [];
            $data['tournament_detail'] = \App\Tournament::where('id', $tournament_id)
                            ->with(['tournament_game' => function () {
                                    
                                }, 'tournament_game.game_players' => function () {
                                    
                                }, 'tournament_players' => function ($query) {
                                    
                                }]
                            )->firstOrFail()->toArray();

            ////////Making player price
            //End making player price
            if (!empty($data['players_list']['tournament_players'])) {
                $data['players_in_tournament'] = array_flatten(array_column(array_column($data['players_list']['tournament_players'], 'pivot'), 'player_id'));
            }
            return view('user.tournaments.play_torunament', $data);
        } catch (ModelNotFoundException $ex) {
            abort(404);
        }
    }

    function teamNamePostAjax(Request $request) {
        $tournament_id = Input::get('tournament_id');
        $userteam = Input::get('name');
        $this->validator($request->all())->validate();
        $teamid = \App\UserTeam::where(['tournament_id' => $tournament_id, 'user_id' => Auth::id()])->first();

        if ($teamid == null) {
            $teamid['id'] = 0;
        } else {
            $teamid = $teamid->first()->toArray();
        }
        \App\UserTeam::updateOrCreate(['id' => $teamid['id']], ['tournament_id' => $tournament_id, 'user_id' => Auth::id(), 'name' => $userteam]);

        $points = \App\UserAction::getPointsByKey('pusrchase_tournament');
        $array = array(['action_key' => 'pusrchase_tournament', 'user_id' => Auth::id(), 'points_consumed' => $points]);
        \App\UserPointsConsumed::insert($array);
        $userteam = \App\UserTeam::where(['tournament_id' => $tournament_id, 'user_id' => Auth::id()])->first()->toArray();

        $data['team_id'] = $userteam['id'];
        $data['team_name'] = $userteam['name'];
        $data['status'] = "ok";


        return response()->json($data);
    }

    function addUserPlayer(Request $request) {
        // dd($request->all());
//        $objteam = \App\UserTeam::where('id', $request->team_id)
//            ->with('user_team_player')
//            ->firstOrFail()
//            ->toArray();
//        //  dd($data['player']);

        $tournamentDate = \App\Tournament::getStartdate($request->tournament_id);
        $datetime = new \DateTime($tournamentDate);
        $date = $datetime->format('Y-m-d H:i:sP');
        $dateint = strtotime($date);
        $date1 = new DateTime();
        $date1 = $date1->format('Y-m-d H:i:sP');
        $date1int = strtotime($date1);
        // echo $dateint-$date1int;
        $difference = round(($dateint - $date1int) / 60, 0);
        $tournamentMaxPlayers = \App\Tournament::getMaxPlayers($request->tournament_id);
        $currentNoPlayers = \App\UserTeam::find($request->team_id)->user_team_player()->count();
        $data = [];
        $objResponse = [];
        $objResponse['success'] = false;
        if ($tournamentMaxPlayers > $currentNoPlayers) {
            if ($difference > 15) {

                if ($request->player_price < getUserTotalScore(Auth::id())) {

                    $objteam = \App\UserTeam::find($request->team_id);
                    $objteam->user_team_player()->sync($request->player_id, false);
                    $array = array(['action_key' => 'add_player', 'user_id' => Auth::id(), 'points_consumed' => $request->player_price]);
                    \App\UserPointsConsumed::insert($array);
                    $objResponse['success'] = true;
                    $objResponse['msg'] = "Player added successfully";
                } else {
                    $objResponse['success'] = false;
                    $objResponse['msg'] = "You donot have enough points";
                }
            } else {
                $objResponse['success'] = false;
                $objResponse['msg'] = "Tournament starts in 15 minutes you cant add player now";
            }
        } else {
            $objResponse['success'] = false;
            $objResponse['msg'] = "You can't have more than $tournamentMaxPlayers in this tournament.";
        }
        return response()->json($objResponse);
    }

    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'unique:user_teams'
        ]);
    }

}
