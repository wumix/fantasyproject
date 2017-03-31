<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;

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


        $objTourmament = \App\Tournament::all()->sortBy("start_date");;
        $data['tournaments_list'] = $objTourmament->toArray();

       // dd($data['tournaments_list']);
        return view('home', $data);
    }

    public function profile()
    {
        echo 'this is profile';
        die;
    }

}
