<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function () {
    /**
     * Auth
     */
    Route::post('login', 'Api\UserController@authenticate');
    Route::post('register', 'Api\UserController@create');
    Route::post('password/email', 'Auth\ForgotPasswordController@getResetToken');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::any('/sendpush', 'Api\OrdersController@sendPushMessage');
    Route::group(['prefix' => 'tournaments'], function () {

        Route::get('fixtures', 'Api\TournamentsController@tournament_fixtures');
        Route::get('leaderboard', 'Api\TournamentsController@tournament_leaderboard');
        Route::get('/', 'Api\TournamentsController@show');
    });
//    Route::group(['prefix' => 'user'], function () {
//
//    });



    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::resource('tournaments', 'Api\TournamentsController', ['except' => ['index', 'show'
        ]]);
        Route::group(['prefix' => 'tournaments'], function () {
            Route::get('players', 'Api\TournamentsController@tournament_players');
        });
        Route::group(['prefix' => 'user'], function () {

            Route::get('check', 'Api\UserController@checkTeam');
            Route::get('team', 'Api\UserController@createTeam');
            Route::resource('/', 'Api\User');
        });
    });
});