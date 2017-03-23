<?php

namespace App\Http\Controllers\user;

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
    function playTournament(){
        return view('user.tournaments.show_torunament', $data);

    }
}
