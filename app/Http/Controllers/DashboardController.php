<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\UserTeam;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $data['user_teams'] = \App\UserTeam::where('user_id', \Auth::id())->get()->toArray();
        
        return view('user.dashboard.dashboard',$data);

    }
}