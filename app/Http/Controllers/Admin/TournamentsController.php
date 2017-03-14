<?php

namespace App\Http\Controllers\Admin;

use \App\Game;
use \App\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TournamentsController extends Controller {

    protected $objplayer;

    function __construtct() {
        $this->objplayer = new Game;
    }

    public function index() {

        $this->objplayer = \App\Player::all()->toArray();
        $data['player_list'] = $this->objplayer; //list of games form games table   
        return view('adminlte::tournaments.tournaments_list', $data);
    }

    public function addTournamentForm() {
        $data['result'] = Game::all()->toArray();
        return view('adminlte::tournaments.add_tournament', $data);
    }

    function add(Request $request) {
       // dd(Input::all()); //to debug post
        $newTournament = new \App\Tournament;
        $newTournament->name = $request->name;
        $newTournament->game_id= $request->game_id;
        $newTournament->save();
    }

}
