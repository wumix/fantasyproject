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
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('loginForm');
    Route::get('/signup', 'Auth\RegisterController@showUserRegistrationForm')->name('signUp');
    Route::get('/show/{tournament_id}', 'User\TournamentsController@showTournamentDetails')->name('showTournament');

    Route::group(['middleware' => ['is_user']], function () {
        Route::get('/profile', 'HomeController@profile')->name('profile');
        Route::group(['prefix' => 'tournaments'], function () {
            Route::get('/addteamname/{tournament_id}', 'User\TournamentsController@addTeam')->name('addTeam');
            Route::get('/add-players/{team_id}', 'User\TournamentsController@playTournament')->name('addPlayers');
            Route::get('/addteam', 'User\TournamentsController@teamNamePostAjax')->name('teamNamePostAjax');
            Route::post('/addplayerlox', 'User\TournamentsController@addUserPlayer')->name('addUserTeamPlayerAjax');
            Route::get('/transfer/{team_id}/{player_id}', 'User\TournamentsController@transferPlayer')->name('transferplayer');
        });
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
            Route::post('/post-game-role', 'Admin\GamesController@addRolePost')->name('addGameRole');
            Route::post('/add-game-term', 'Admin\GamesController@addTermPost')->name('addGameTerm');
            Route::delete('delete-game-role', 'Admin\GamesController@deleteGameRole')->name('deleteGameRole');
            Route::delete('delete-game-term', 'Admin\GamesController@deleteGameTerm')->name('deleteGameTerm');
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
            Route::get('/add-max-roles/{tournament_id}', 'Admin\TournamentsController@addTournamentRolesLimit')->name('addMaxRoles');
            Route::post('/add-max-roles/{tournament_id}', 'Admin\TournamentsController@postAddTournamentRolesLimit')->name('postAddmaxRoles');
        });
        //Matches
        Route::group(['prefix' => 'match'], function () {
            Route::get('/', 'Admin\MatchesController@index')->name('Matcheslist');
            Route::get('/add', 'Admin\MatchesController@addMatchForm')->name('addMatch'); //shows add player form
            Route::post('/add', 'Admin\MatchesController@addMatch')->name('postAddMatch');
            Route::get('/edit/{match_id}', 'Admin\MatchesController@editMatchForm')->name('editMatchForm');
            Route::post('/edit/{match_id}', 'Admin\MatchesController@postEditMatch')->name('editMatch');
            Route::get('/addplayers/{match_id}', 'Admin\MatchesController@playerMatchScore')->name('showAddPlayerForm1');
            Route::post('/addscores/{match_id}', 'Admin\MatchesController@postAddMatchScore')->name('postAddMatchScore');
        });
        //User routes
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'Admin\UsersController@index')->name('listUsers');
            Route::get('/add', 'Admin\UsersController@addUser')->name('addUser');
            Route::post('/add', 'Auth\RegisterController@postAddUserFromAdmin')->name('postAddUser');
            Route::get('/edit/{user_id}', 'Admin\UsersController@userEditForm')->name('editUser');
            Route::post('/edit/{user_id}', 'Admin\UsersController@postAddUserFromAdmin')->name('postEditUser');
            Route::delete('/delete/{user_id}', 'Admin\UsersController@deleteUser')->name('deleteUser');
        });
        //user action routes
        Route::group(['prefix' => 'actions'], function () {
            Route::get('/', 'Admin\ActionsController@index')->name('listActions');
            Route::get('/add', 'Admin\ActionsController@addActionForm')->name('addAction');
            Route::post('/add', 'Admin\ActionsController@postAddAction')->name('postAddAction');
            Route::get('/edit/{action_id}', 'Admin\ActionsController@actionEditForm')->name('editAction');
            Route::post('/edit/{action_id}', 'Admin\ActionsController@postEditAction')->name('postEditAction');
//            Route::delete('/delete/{user_id}', 'Admin\ActionsController@deleteUser')->name('deleteAction');
        });
    });
});
