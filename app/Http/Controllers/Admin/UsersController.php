<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        $data['users_list'] = \App\User::paginate(10); //list of games form games table   
        return view('adminlte::users.users_list', $data);
    }

    public function userEditForm($user_id = NULL) {
        $user = \App\User::where('id', $user_id)->first();

        if (!empty($user)) {
            $user = $user->toArray();
        } // check this later give error when game id has no realted data ::handle exception
        $data['user_edit'] = $user;
        return view('adminlte::users.user_edit', $data);
    }

    public function postAddUserFromAdmin(Request $request, $user_id) {
        $player = \App\USER::find($user_id);
        $player->name = $request->name;
        $player->email = $request->email;
        $player->user_type = $request->user_type;
        $player->phone_number = $request->phone_number;
        $player->is_active = $request->is_active;
        $player->user_type = $request->user_type;
        $player->referral_key = $request->ref_key;
        if ($request->hasFile('profile_pic')) {
            $files = uploadInputs($request->profile_pic, 'profile_pics');
            $player->profile_pic = $files;
        }
        $player->save();
        return redirect()->route('postEditUser', ['user_id' => $user_id]);
    }

    public function addUser() {
        return view('adminlte::users.user_add');
    }

    public function editUser() {
        return view('adminlte::users.user_edit');
    }

    public function deleteUser() {
        
    }

}
