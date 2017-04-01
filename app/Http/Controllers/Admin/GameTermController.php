<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameTermController extends Controller {

    public function index($action_id) {
        $data['game_terms'] = \App\GameTerm::where('action_id', $action_id)->get()->toArray();
        return view('adminlte::game-actions-terms.game_actions_terms', $data);
    }

    public function addTermPost() {
        //dd(Input::all()); //to debug post
        $game_id = Input::get('id');

        $gameRoles = [];
        foreach (array_filter(Input::get('term_name')) as $role_name) {
            $gameRoles[] = [
                'game_id' => $game_id,
                'name' => $role_name
            ];
        }
        // dd($gameRoles);
        \App\GameTerm::insert($gameRoles);
        return redirect()->back();
    }

}
