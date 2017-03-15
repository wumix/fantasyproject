<?php

namespace App\Http\Controllers\Admin;

use \App\Game;
use \App\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TournamentsController extends Controller {

    protected $objplayer;

    function __construct() {
        $this->objplayer = new \App\Tournament;
    }

    public function index() {

        $objplayer = \App\Tournament::all()->toArray();
        $data['tournaments_list'] = $objplayer; //list of games form games table   
        return view('adminlte::tournaments.tournaments_list', $data);
    }

    public function addTournamentForm() {
        $data['result'] = Game::all()->toArray();
        return view('adminlte::tournaments.add_tournament', $data);
    }

    function add(Request $request) {
        //  dd(Input::all()); //to debug post
        $newTournament = new \App\Tournament;
        $newTournament->name = $request->name;
        $newTournament->game_id = $request->game_id;
        $newTournament->start_date = $request->start_date;
        $newTournament->end_date = $request->end_date;
        $newTournament->venue = $request->venue;
        $newTournament->save();
        return redirect()->route('addTournament');
    }

    function editTournamentForm($tournament_id) {

        $tour = \App\Tournament::where('id', $tournament_id)->with('tournament_game')->first();

        if (!empty($tour)) {
            $tour = $tour->toArray();
        } // check this later give error when game id has no realted data ::handle exception
        //dd($games);
        $data['tournament_games'] = $tour;
        $data['games'] = Game::all()->toArray();
        return view('adminlte::tournaments.tournament_edit', $data);
    }

    function postEditTournament() {
       //dd( Input::all()); //to debug post
        $tour = \App\Tournament::find(Input::get('id'));
        $tour->fill(Input::all());
        $tour->save();
        return redirect()->route('editTournamentForm', ['tournament_id' => Input::get('id')]);
    }

}
