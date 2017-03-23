<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
//      echo  \App\UserTeam::find(22)->user_team_player()->count();
//      die;
//       $max=\App\Tournament::getMaxPlayers(2);
//       dd($max);
//        $objteam = \App\UserTeam::find(1);
//        $objteam->user_team_player()->sync(array_filter('1'));
//        return response()->json($objteam);
//
        $objTourmament = \App\Tournament::all()->toArray();
        $data['tournaments_list'] = $objTourmament;
        //dd($data['tournaments_list']);
        return view('home', $data);
    }

    public function profile()
    {
        echo 'this is profile';
        die;
    }

}
