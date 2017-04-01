<?php

namespace App\Http\Controllers\admin;

use App\Game;
use App\Player;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Match;
use App\Tournament;
use Validator;
use Illuminate\Support\Facades\Input;

class MatchesController extends Controller {

    protected $objMatch;

    function __construct() {
        $this->objMatch = new Match;
    }

    public function index() {
        $data['tournamentId'] = Input::get('tournament_id');
        $data['tournaments'] = Tournament::all()->toArray();
        $this->objMatch = \App\Match::where('tournament_id', $data['tournamentId'])->get()->toArray();
        $data['matches_list'] = $this->objMatch; //list of games form games table   
        return view('adminlte::matches.matches_list', $data);
    }

    public function addMatchForm() {
        $this->objMatch = Tournament::all()->toArray();
        $data['result'] = $this->objMatch;
        return view('adminlte::matches.add_match', $data);
    }

    public function addMatch(Request $request) {
        //dd($request->all());
        $this->objMatch->fill($request->all());
        $this->objMatch->save();
        return redirect()
                        ->route('editMatchForm', ['match_id' => $this->objMatch->id])
                        ->with('status', 'Match Saved');
    }

    function editMatchForm($match_id) {
//        echo $match_id;
//        die;
        $matches = Match::where('id', $match_id)->with('match_tournament')->first();
        if (!empty($matches)) {
            $matches = $matches->toArray();
        } // check this later give error trhen game id has no realted data ::handle exception
        $data['match'] = $matches;
        $tournamentList = Tournament::all()->toArray();
        if (!empty($tournamentList)) {
            $data['tournamentlist'] = $tournamentList;
        }

        return view('adminlte::matches.matches_edit', $data);
    }

    function postEditMatch($match_id, Request $request) {
        $match = \App\Match::find($match_id);
        $match->fill($request->all());
        $match->save();
        return redirect()->route('editMatchForm', ['match_id' => $match_id])->with('status', 'Match Updated');
    }

    function playerMatchScore($match_id) {
        //dd($match_id);
        $matchInfo = Match::where('id', $match_id)->with('player_scores')->firstOrFail();
        //dd($matchInfo->toArray());
        $tournamentInfo = Tournament::find($matchInfo->tournament_id);
        // dd($tournamentInfo);

        $data['players'] = Player::whereHas('player_tournaments', function($q) use ($matchInfo) {
                    $q->where('tournament_id', $matchInfo->tournament_id);
                })->get()->toArray();
        $data['match_id'] = $match_id;
        $data['match_name'] = $matchInfo->name;
        $data['tournament_name'] = $tournamentInfo->name;
        $data['player_scores'] = $matchInfo->player_scores;
        $data['game_terms'] = Game::find($tournamentInfo->game_id)->with('game_terms')->first()->toArray();
        return view('adminlte::matches.add_player_match_score', $data);
    }

    function postAddMatchScore($match_id) {
        foreach (Input::get('player_game_term_counter') as $key => $val) {
            \App\MatchPlayerScore::where('match_id', $match_id)
                    ->where('player_id', $val[0]['player_id'])
                    ->delete();
            \App\MatchPlayerScore::insert($val);
        }
        return redirect()->back()->with('status', 'Match player score updated.');
    }

}
