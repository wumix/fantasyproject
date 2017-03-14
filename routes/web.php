<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    return view('welcome');
});




//Admin routes
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/', 'Admin\DashboardController@index');

    //Games routes
    Route::group(['prefix' => 'games'], function () {
        Route::get('/', 'Admin\GamesController@index')->name('gameslist');
        Route::get('/add', 'Admin\GamesController@showAddView')->name('addGame'); //shows add game form
        Route::post('/add', 'Admin\GamesController@addPost')->name('postAddGame');
        Route::get('/edit/{game_id}', 'Admin\GamesController@editGameForm')->name('editGameForm');
        Route::post('/edit', 'Admin\GamesController@editGamePost')->name('postEditGame');
        Route::get('/delete/{game_id}', 'Admin\GamesController@deleteGame')->name('deleteGame');
        Route::post('/addRolePost', 'Admin\GamesController@addRolePost')->name('addGameRole');
        Route::post('/addTerm', 'Admin\GamesController@addTermPost')->name('addGameTerm');
    });

    //Players routes
<<<<<<< HEAD
    Route::group(['prefix' => 'palyers'], function () {
        Route::get('/', 'Admin\GamesController@index')->name('gameslist');
        Route::get('/add', 'Admin\PlayersController@addPlayerForm')->name('addPlayer'); //shows add player form
        Route::post('/postAddPlayer', 'Admin\PlayersController@addPlayer')->name('postAddPlayer');
=======
    Route::group([ 'prefix' => 'palyers'], function () {
        Route::get('/', 'Admin\PlayersController@index')->name('playerslist');
        Route::get('/add', 'Admin\PlayersController@addPlayerForm')->name('addPlayer'); //shows add player form
        Route::post('/postAddPlayer', 'Admin\PlayersController@addPlayer')->name('postAddPlayer'); 
        Route::post('/edit', 'Admin\PlayersController@editPlayerForm')->name('editPlayer'); 
        
         Route::get('/edit/{player_id}', 'Admin\PlayersController@editPlayerForm')->name('editPlayerForm');
>>>>>>> f7299874d997a52f2cb8ef887f979ae507522a8b
        Route::get('/ajax_get_game_terms', 'Admin\PlayersController@get_game_roles')->name('ajax_get_game_terms');
    });
});
