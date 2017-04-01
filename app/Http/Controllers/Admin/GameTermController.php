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

}
