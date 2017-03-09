<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    function addPlayerForm(){
        return view('admin.player.addPlayer');
    }
     function addPlayer(){
        echo 122334454;
    }
}
