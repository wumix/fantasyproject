<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Validator;

class GameTermController extends Controller {

    /**
     * Get a validator for an incoming request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'game_action_id' => 'required',
                    'game_id' => 'required',
        ]);
    }

    public function index($action_id) {
        $data['game_action_id'] = $action_id;
        $data['game_terms'] = \App\GameAction::where('id', $action_id)->with('game_terms')
                ->firstOrFail()
                ->toArray();
        //dd($data['game_terms']);
        return view('adminlte::game-actions-terms.game_actions_terms', $data);
    }

    public function addTermPost(Request $request) {
        $this->validator($request->all())->validate();
        $game_action_id = Input::get('game_action_id');
        $game_id = Input::get('game_id');
        $gameRoles = [];
        foreach (array_filter(Input::get('term_name')) as $role_name) {
            $gameRoles[] = [
                'game_action_id' => $game_action_id,
                'name' => $role_name,
                'game_id' => $game_id
            ];
        }
        \App\GameTerm::insert($gameRoles);
        return redirect()->back()->with('status', 'Term Added Successfully');
    }

    public function gameTermPoints($tournament_id) {
        $data['tournament'] = \App\Tournament::where('id', $tournament_id)
                ->with('tournament_game.game_actions.game_terms', 'game_term_points')
                ->firstOrFail()
                ->toArray();

        //dd($data);
        $data['game_actions'] = $data['tournament']['tournament_game']['game_actions'];
        //dd($data);
        return view('adminlte::game-actions-terms.term_points', $data);
    }

    /**
     * Remove game term by id
     */
    public function deleteGameTerm() {
        $termId = Input::get('term_id');
        \App\GameTerm::find($termId)->delete();
    }

    public function updateTermPoints() {
        $game_id = Input::get('game_id');
        $tournament_id = Input::get('tournament_id');
        //Delete all points b4 new inertion
        \App\TournamentGameTermPoint::where('tournament_id', $tournament_id)->delete();
        foreach (Input::get('term_score_range') as $termId => $pointsDetail) {
            //Inserting terms 1 by 1
            foreach ($pointsDetail as $key => $val) {
                $val['tournament_id'] = $tournament_id;
                $val['game_term_id'] = $termId;
                if (empty($val['qty_from'])) {
                    $val['qty_from'] = 1;
                }
                if (empty($val['qty_to'])) {
                    $val['qty_to'] = 1;
                }
                if (empty($val['points'])) {
                    continue;
                }
                \App\TournamentGameTermPoint::insert($val);
            }
        }
        return redirect()->back()->with('status', 'Points Updated Successfully');
    }

    public function deleteGameTermPoint() {
        $tournament_id = Input::get('tournament_id');
        $termPointId = Input::get('termPointId');

        \App\TournamentGameTermPoint::where('tournament_id', $tournament_id)
                ->where('id', $termPointId)
                ->delete();
    }

}
