<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GamesController extends Controller {

    protected $objGame;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->objGame = new Game;
    }

    public function index() {

        $this->objGame = Game::all()->toArray();
        $data['games_list'] = $this->objGame; //list of games form games table   
        return view('adminlte::games.games_list', $data);
    }

    public function showAddView() {

        return view('adminlte::games.games_add');
    }

    /**
     * Save game
     * @param type $gameId
     * @return type
     */
    function addPost($gameId = null) {
        $objGame = $this->objGame->firstOrNew(['id' => $gameId]);
        $objGame->name = Input::get('name');
        $objGame->save();
        $lastInsertId = $objGame->id;
        return redirect()->route('editGameForm', ['game_id' => $lastInsertId]);
    }

    function editGameForm($game_id) {
        $games = Game::where('id', $game_id)
                        ->with('game_roles', 'game_actions')
                        ->firstOrFail()->toArray();
        $data['result'] = $games;
        return view('adminlte::games.games_edit', $data);
    }

    function deleteGame() {
        $game = new Game;
        $game->name = Input::get('name');
        $game->save();
        return redirect()->back();
    }

    function view_games() {
        //$data['payment'] = $payment;
        //return view('admin.payment.paymentDetailList', $data);
    }

    function editGamePost($game_id = NULL) {
        $this->objGame = Game::find(Input::get('id'));
        $this->objGame->name = Input::get('gamename');
        $this->objGame->is_active = Input::get('is_active');
        $this->objGame->save();
        return redirect()->route('editGameForm', ['game_id' => Input::get('id')]);
    }

    function addRolePost($game_id = NULL) {
        //dd(Input::all()); //to debug post
        $game_id = Input::get('id');
        $gameRoles = [];
        foreach (array_filter(Input::get('role_name')) as $role_name) {
            $gameRoles[] = [
                'game_id' => $game_id,
                'name' => $role_name
            ];
        }
        \App\GameRole::insert($gameRoles);
        return redirect()->back();
    }



    /**
     * Remove player role by role id
     */
    public function deleteGameRole() {
        $roleId = Input::get('role_id');
        \App\GameRole::find($roleId)->delete();
    }

    /**
     * Remove game term by id
     */
    public function deleteGameTerm() {
        $termId = Input::get('term_id');
        \App\GameTerm::find($termId)->delete();
    }

    public function addGameActions() {
        $game_id = Input::get('game_id');
        $gameActions = [];
        foreach (array_filter(Input::get('action_name')) as $action_name) {
            $gameActions[] = [
                'game_id' => $game_id,
                'name' => $action_name
            ];
        }
        \App\GameAction::insert($gameActions);
        return redirect()->back();
    }

}
