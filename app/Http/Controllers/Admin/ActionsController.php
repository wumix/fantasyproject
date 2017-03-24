<?php

namespace App\Http\Controllers\admin;

use \App\UserAction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class ActionsController extends Controller {

    protected $userActionObj;

    function __construct() {
        $this->userActionObj = new UserAction;
    }

    public function index() {
//        $this->objGame = Game::all()->toArray();
//        $data['games_list'] = $this->objGame; //list of games form games table
//        return view('adminlte::games.games_list', $data);
    }

    protected function validator(array $data) {
        return Validator::make($data, [
                    'action_name' => 'required|unique:user_action_points|max:50',
                    'action_points' => 'required|digits_between:0,100',
        ]);
    }

    public function addActionForm() {
        $data['actions_list'] = \App\UserActionsName::all();
        return view('adminlte::user-actions.add_user_action', $data);
    }

    function postAddAction(Request $request) {
        $this->validator($request->all())->validate();
        $key = slugify($request->action_name);
        $request->request->add(['action_key' => $key]);
        // $this->userActionObj->
        $this->userActionObj->fill($request->all())->save();
        return redirect()->route('addAction');
    }

    function actionEditForm($actionid) {
        $data['actionInfo'] = \App\UserActionsName::find($actionid)->firstOrFail()->toArray();
        $userAction = \App\UserAction::find($actionid); //add validation here later
        if (!empty($userAction)) {
            $data['user_action'] = $userAction->toArray();
            return view('adminlte::user-actions.edit_user_action', $data);
        } else {
            abort(404, "no record found");
        }
    }

    function postEditAction(Request $request, $actionid) {
        //  $this->validator($request->all())->validate();
        $userAction = \App\UserAction::find($actionid);
        $userAction->fill(array_filter($request->all()))->save();
        return redirect()->route('postEditAction', ['action_id' => $actionid]);
    }

}
