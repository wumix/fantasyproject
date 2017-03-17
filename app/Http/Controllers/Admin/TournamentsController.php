<?php

namespace App\Http\Controllers\Admin;

use \App\Game;
use \App\Player;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class TournamentsController extends Controller {

    protected $objTourmament;

    function __construct() {
        $this->objTourmament = new \App\Tournament;
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|max:255',
                    'game_id' => 'required',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'venue' => 'required|max:100',
                    'max_players' => 'integer'
        ]);
    }

    public function index() {
        $objTourmament = \App\Tournament::all()->toArray();
        $data['tournaments_list'] = $objTourmament; //list of games form games table   
        return view('adminlte::tournaments.tournaments_list', $data);
    }

    public function addTournamentForm() {
        $data['result'] = Game::all()->toArray();
        return view('adminlte::tournaments.add_tournament', $data);
    }

    function add(Request $request) {
        $this->validator($request->all())->validate();
        $newTournament = new \App\Tournament;
        $newTournament->name = $request->name;
        $newTournament->game_id = $request->game_id;
        $newTournament->start_date = $request->start_date;
        $newTournament->end_date = $request->end_date;
        $newTournament->venue = $request->venue;
        if (Input::hasFile('t_logo')) {
            $files = uploadInputs(Input::file('t_logo'), 'tournament_logos');
            $newTournament->t_logo = $files;
        }
        $newTournament->max_players = $request->max_players;
        $newTournament->save();
        return redirect()->route('editTournamentForm', ['tournament_id' => $newTournament->id]);
    }

    function editTournamentForm($tournament_id) {
        try {

            $data['tournament_games'] = \App\Tournament::where('id', $tournament_id)
                            ->with(['tournament_game' => function($query) {
                                    
                                },
                                'tournament_game.game_terms' => function($query) {
                                    
                                },
                                'game_term_points' => function($query) {
                                    return $query->select('game_term_id', 'points', 'tournament_id');
                                }])
                            ->firstOrFail()->toArray();
            $data['games'] = Game::all()->toArray();
            return view('adminlte::tournaments.tournament_edit', $data);
        } catch (ModelNotFoundException $ex) {
            abort('404');
        }
    }

    function postEditTournament() {
        $tournamentId = Input::get('id');
        $tournament = \App\Tournament::find($tournamentId);
        $tournament->fill(Input::all());
        $tournament->save();
        \App\TournamentGameTermPoint::where('tournament_id', $tournament->id)->delete(); //Deleting all game points
        \App\TournamentGameTermPoint::insert(Input::get('tournament_game_term_points')); //Insertong them again
        return redirect()->route('editTournamentForm', ['tournament_id' => Input::get('id')])
                        ->with('status', 'Tournament Updated');
    }

    function showAddPlayerForm($tournament_id) {
        $objTP = \App\Tournament::where('id', $tournament_id)->with('tournament_game', 'tournament_game.game_players')->first();
        $objTP = $objTP->toArray();
        $data['players_list'] = $objTP;
        $objTP1 = \App\Tournament::where('id', $tournament_id)->with('tournament_players')->first();
        //dd($objTP1->toArray());
        $data['tournament_players'] = $objTP1->toArray();
        return view('adminlte::tournaments.add_tournament_players', $data);
    }

    function postAddTournamentPlayers() {

        // dd( Input::all()); //to debug post
        $objPlayer = \App\Tournament::find(Input::get('tournament_id'));
        $objPlayer->tournament_players()->sync(Input::get('player_id'));

        return redirect()->route('showAddPlayerForm', ['tournament_id' => Input::get('tournament_id')]);
    }

}
