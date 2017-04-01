<?php

namespace App\Http\Controllers\Admin;

use \App\Game;
use \App\Player;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class PlayersController extends Controller {

    protected $objplayer;

    function __construct() {
        $this->objplayer = new Game;
    }

    /**
     * Get a validator for an incoming request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|max:255',
                    'game_id' => 'required',
                    'profile_pic' => 'required',
        ]);
    }

    public function index() {

        $this->objplayer = \App\Player::paginate(20);
        $data['player_list'] = $this->objplayer; //list of games form games table   
        return view('adminlte::players.players_list', $data);
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

    public function addPlayer(Request $request) {
        //dd(Input::all()); //to debug post
        $this->validator($request->all())->validate();
        $objplayer = new \App\Player;
        // $objPlayerRoles = new \App\PlayerRole;
        $objplayer->name = Input::get('name');
        $objplayer->game_id = Input::get('game_id');
        if (Input::hasFile('profile_pic')) {
            $files = uploadInputs(Input::file('profile_pic'), 'player_pictures');
            $objplayer->profile_pic = $files;
        }
        $objplayer->save();
        $lastInsertId = $objplayer->id;
        $objPlayer = \App\Player::find($lastInsertId);
        $objPlayer->player_roles()->sync(array_filter(Input::get('player_roles')));
        return redirect()->route('addPlayer')->with('status', Input::get('name') . ' added successfully.');
        //return redirect()->route('editPlayerForm', ['player_id' => $lastInsertId]);
    }

    function editPlayerForm($player_id) { //shows player edit form
        try {
            $data['player'] = \App\Player::where('id', $player_id)
                    ->with('player_games', 'player_games.game_roles', 'player_roles')
                    ->firstOrFail()
                    ->toArray();
            $data['player']['player_roles'] = array_flatten(array_column($data['player']['player_roles'], 'id'));
            $this->objplayer = Game::all()->toArray();
            $data['gameslist'] = $this->objplayer;
            //dd($data);
            return view('adminlte::players.player_edit', $data);
        } catch (ModelNotFoundException $ex) {
            
        }
    }

    function postEditPlayer() {
        //dd(Input::all()); //to debug post
        // dd(Input::get('player_role'));
        $player = \App\Player::find(Input::get('player_id'));
        $player->name = Input::get('player_name');
        $player->game_id = Input::get('game_id');

        if (Input::hasFile('profile_pic')) {
            $files = uploadInputs(Input::file('profile_pic'), 'profile_pics');
            $player->profile_pic = $files;
        }

        $player->save();
        $objPlayer = \App\Player::find(Input::get('player_id'));
        $objPlayer->player_roles()->sync(array_filter(Input::get('player_role')));
        return redirect()->route('editPlayerForm', ['player_id' => Input::get('player_id')]);
    }

}
