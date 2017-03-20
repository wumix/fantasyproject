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

    //
    function __construct() {
        $this->objMatch = new Match;
    }

    public function index() {

        $this->objMatch = \App\Match::all()->toArray();
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
        // dd($request->all());
        $match = \App\Match::find($match_id);
        $match->fill($request->all());
        $match->save();
        return redirect()->route('editMatchForm', ['match_id' => $match_id])->with('status', 'Match Updated');
        
    }
    function playerMatchScore($match_id){
        $tournamentId = Match::find($match_id)->tournament_id;
        $tournamentInfo  = Tournament::find($tournamentId);

        $data['players'] = Player::whereHas('player_tournaments', function($q){
            $q->where('tournament_id', 1);
        })->get()->toArray();
        $data['match_id']=$match_id;
        $data['game_terms'] =  Game::find($tournamentInfo->game_id)->with('game_terms')->first()->toArray();
        return view('adminlte::matches.add_player_match_score', $data);
    }
    function postAddMatchScore(Request $request){
        debugArr($request->all());
        die;

    }
}
