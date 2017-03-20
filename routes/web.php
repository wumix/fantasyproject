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

/* Route::get('/', function () {

  return view('welcome');
  }); */

    Route::group(['middleware' => ['web']], function () {
            Route::get('/', 'HomeController@index');
            Route::group(['middleware' => ['is_user']], function () {
            Route::get('/profile', 'HomeController@profile')->name('profile');
        });
    });

    //Admin routes
    Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function () {
                Route::get('/', 'Auth\LoginController@showAdminLoginForm');
                Route::group(['middleware' => ['is_admin']], function () {
                Route::get('/dashboard', 'Admin\DashboardController@index');  //Games routes
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
            Route::group(['prefix' => 'palyers'], function () {
                Route::get('/', 'Admin\PlayersController@index')->name('playerslist');
                Route::get('/add', 'Admin\PlayersController@addPlayerForm')->name('addPlayer'); //shows add player form
                Route::post('/postAddPlayer', 'Admin\PlayersController@addPlayer')->name('postAddPlayer');
                Route::post('/edit', 'Admin\PlayersController@postEditPlayer')->name('editPlayer');
                Route::get('/edit/{player_id}', 'Admin\PlayersController@editPlayerForm')->name('editPlayerForm'); //show player edit form
                Route::get('/ajax_get_game_terms', 'Admin\PlayersController@get_game_roles')->name('ajax_get_game_terms');
            });
            //tournament routes
            Route::group(['prefix' => 'tournaments'], function () {
                Route::get('/', 'Admin\TournamentsController@index')->name('Tournamentslist');
                Route::get('/add', 'Admin\TournamentsController@addTournamentForm')->name('addTournament'); //shows add player form
                Route::post('/add', 'Admin\TournamentsController@add')->name('postAddTournament');
                Route::get('/edit/{tournament_id}', 'Admin\TournamentsController@editTournamentForm')->name('editTournamentForm');
                Route::post('/edit', 'Admin\TournamentsController@postEditTournament')->name('editTournament');
                Route::get('/addplayers/{tournament_id}', 'Admin\TournamentsController@showAddPlayerForm')->name('showAddPlayerForm');
                Route::post('/addplayers/', 'Admin\TournamentsController@postAddTournamentPlayers')->name('postAddTournamentPlayers');
            });
            //User routes
            Route::group(['prefix' => 'users'], function () {
                Route::get('/', 'Admin\UsersController@index')->name('listUsers');
                Route::get('/add', 'Admin\UsersController@addUser')->name('addUser');
                Route::post('/add', 'Auth\RegisterController@postAddUserFromAdmin')->name('postAddUser');
                Route::get('/edit/{user_id}', 'Admin\UsersController@userEditForm')->name('editUser');
                Route::post('/edit/{user_id}', 'Admin\UsersController@postAddUserFromAdmin')->name('postEditUser');
                Route::delete('/delete/{user_id}', 'Admin\UsersController@deleteUser')->name('deleteUser');
            });
        });
    });
