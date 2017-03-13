<?php

namespace App\Http\Controllers\Admin;

use \App\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PlayersController extends Controller {

    protected $objplayer;

    function __construtct() {
        $this->objplayer = new Game;
    }

    public function index() {

        $this->objplayer = Game::all()->toArray();
        $data['games_list'] = $this->objplayer; //list of games form games table   
        return view('adminlte::games.games_list', $data);
    }

    public function addPlayerForm() {
        $this->objplayer = Game::all()->toArray();
        $data['result'] = $this->objplayer;
        return view('adminlte::players.add_player', $data);
    }

    public function get_game_roles() {
        $game_id = Input::get('game_id');
        $gameRolesQuery = \App\GameRole::where('game_id', $game_id);
        $data['game_roles'] = $gameRolesQuery->get()->toArray();
        return response()->json($data);
    }

    public function addPlayer() {
        dd(Input::all()); //to debug post
        $objplayer = new \App\Player;
        //$objPlayerRoles= new \App\;
        $objplayer->name = Input::get('name');
        $objplayer->game_id = Input::get('game_id');
        $objplayer->save();
        $lastInsertId = $objGame->id;

        $gameRoles = [];
        foreach (array_filter(Input::get('player_roles')) as $role_name) {
            $gameRoles[] = [
                'game_id' => $game_id,
                'name' => $role_name,
                'player_id' => $lastInsertId
            ];
        }
        \App\Player::insert($gameRoles);
    }

}
