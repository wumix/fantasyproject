<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        //Show user list
        return view('adminlte::users.users_list');
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
