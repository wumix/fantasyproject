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
    Route::group(['middleware' => 'auth', 'prefix' => 'games'], function () {
        Route::get('/', 'Admin\GamesController@index')->name('gameslist');
        Route::get('/add', 'Admin\GamesController@showAddView')->name('addGame');
        Route::post('/add', 'Admin\GamesController@addPost')->name('postAddGame');
        Route::get('/edit/{game_id}', 'Admin\GamesController@editGameForm')->name('editGameForm');
        Route::post('/edit', 'Admin\GamesController@editGamePost')->name('postEditGame');
        Route::get('/delete/{game_id}', 'Admin\GamesController@deleteGame')->name('deleteGame');
        Route::post('/addRolePost', 'Admin\GamesController@addRolePost')->name('addGameRole');
        //  Route::post('/addRole', 'Admin\GamesController@addEditRole')->name('addGameRolePost');
        Route::get('/orders',function(){
            $order=  App\Game::with('gameRoles')->get()->toArray();
        });
        
        
        // Route::get('/postEditGame/{game_id}', 'Admin\GamesController@deleteGame')->name('postEditGame');
        //Route::get('/edit/{id}', 'Admin\GamesController@addOrEditPost')->name('editGame');
    });
});
