<?php

namespace App\Http\Controllers\user;

use \Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TournamentsController extends Controller
{
    function __construct()
    {
        $this->objTourmament = new \App\Tournament;
    }

    function showTournamentDetails($tournament_id)
    {
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

    function playTournament($tournament_id)
    {

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

    function teamNamePostAjax(Request $request)
    {

        $this->validator($request->all())->validate();
        $userteam = new \App\UserTeam;
        $request->request->add(['user_id' =>Auth::id()]);
        $userteam->fill($request->all())->save();
        $userteam->find($request->name);
        $userteam = $userteam->toArray();
        $data['team_id'] = $userteam['id'];
        $data['team_name'] = $userteam['name'];
        $data['status'] = "ok";


        return response()->json($data);
    }
    function addUserPlayer(Request $request){

        return response()->json($request->all());
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'unique:user_teams'
        ]);
    }
}
