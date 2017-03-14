<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TournamentsController extends Controller
{
    protected $objplayer;

    function __construtct() {
        $this->objplayer = new Game;
    }

    public function index() {

        $this->objplayer = \App\Player::all()->toArray();
        $data['player_list'] = $this->objplayer; //list of games form games table   
        return view('adminlte::tournaments.tournaments_list', $data);
    }
    public function addTournamentForm(){
        $games = Game::where('id', $game_id)->with('game_roles', 'game_terms')->first();

        if (!empty($games)) {
            $games = $games->toArray();
        } // check this later give error trhen game id has no realted data ::handle exception
        //dd($games);
        $data['result'] = $games;
        // $data=$result;
        return view('adminlte::games.add_tournament', $data);
    }
}
