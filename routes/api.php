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
    Route::post('password/email', 'Api\ForgotPasswordController@getResetToken');
    Route::post('password/reset', 'Api\ResetPasswordController@reset');

    Route::post('login', 'Api\UserController@authenticate');

    Route::post('register', 'Api\UserController@create');
    //Route::post('password/email', 'Auth\ForgotPasswordController@getResetToken');
   // Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::any('/sendpush', 'Api\OrdersController@sendPushMessage');
    Route::post('login_with_facebook', 'Api\UserController@loginFacebook');
    Route::group(['prefix' => 'tournaments'], function () {
        Route::get('fixtures', 'Api\TournamentsController@tournament_fixtures');
        Route::get('leaderboard', 'Api\TournamentsController@tournament_leaderboard');
        Route::get('/', 'Api\TournamentsController@show');
    });




    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::resource('tournaments', 'Api\TournamentsController', ['except' => ['index', 'show'
        ]]);
        Route::group(['prefix' => 'tournaments'], function () {
            Route::get('players', 'Api\TournamentsController@tournament_players');
            Route::get('add_player', 'Api\TournamentsController@add_player');
            Route::get('delete_player', 'Api\TournamentsController@delete_player');
            Route::get('transfer_player', 'Api\TournamentsController@transfer_player');

        });
        Route::group(['prefix' => 'user'], function () {
            Route::get('user_teams', 'Api\UserController@userTournamentTeamsScore');
            Route::post('profile_update', 'Api\UserController@profileUpdate');
            Route::post('edit_name', 'Api\UserController@editName');
            Route::get('team_players', 'Api\UserController@userTeamPlayers');
            Route::get('check', 'Api\UserController@checkTeam');
            Route::get('team', 'Api\UserController@createTeam');
            Route::get('confirm_team', 'Api\UserController@confirm_team');
            Route::resource('/', 'Api\User');
        });
    });
});