<?php

/*
  |--------------------------------------------------------------------------
  |WebRoutes
  |--------------------------------------------------------------------------
  |
  |Hereiswhereyoucanregisterwebroutesforyourapplication.These
  |routesareloadedbytheRouteServiceProviderwithinagroupwhich
  |containsthe"web"middlewaregroup.Nowcreatesomethinggreat!
  |
 */

/* Route::get('/',function(){

  returnview('welcome');
  }); */

//Media manager


Route::get('/newdash', 'HomeController@newdash')->name('newdashboard');
Route::get('scorecard/{id}/{tournament_id}', 'HomeController@scorecard')->name('scorecard');
Route::get('/test', 'HomeController@test')->name('test');
Route::get('/leaderboard', 'HomeController@allTournaments')->name('dashboardhome');

Route::get('login/facebook/', 'Auth\LoginController@redirectToFacebookProvider')->name('facebookLogin');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookProviderCallback')->name('facebookLoginCallback');
Route::group(['middleware' => ['web']], function () {
    Route::get('/leaderboard/{tournamentid}', 'HomeController@leaderboard')->name('homeleaderboard');
    Route::get('contact', 'HomeController@contactPage')->name('contactPage');
    Route::post('contact', 'HomeController@postContact')->name('postContact');
    Route::get('privacy', 'HomeController@privacyPolicy')->name('PrivacyPolicy');
    Route::get('terms', 'HomeController@termsCon')->name('TermsCon');
    Route::get('champions-trophy', 'HomeController@fixturs')->name('champion');
    Route::get('upcomming', 'HomeController@upcommingTournamnets')->name('upcommingTournamnets');
    Route::get('rankings', 'HomeController@rankings')->name('rankings');
    Route::group(['prefix' => 'tournament'], function () {
        Route::get('/fixtures/{tournament_id}', 'HomeController@fixturesDetial')->name('fixturesdetail');
    });

    Route::get('how-to-play', 'HomeController@howPlay')->name('howPlay');
    Route::get('/tournaments', 'User\TournamentsController@index')->name('usertournamenthome');
    Route::get('/blog', 'BlogController@index')->name('showBlog');
    Route::get('/news', 'BlogController@getNews')->name('showNews');

    Route::get('/blog/{blog_slug}', 'BlogController@showBlogPostDetail')->name('showBlogPostDetail');
    Route::get('/news/{blog_slug}', 'NewsController@showNewsDetail')->name('newsdetail');
    Route::get('signup-confirmation', function () {
        returnview('pages.signup-thankyou');
    });
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('loginForm');
    Route::get('/signup', 'Auth\RegisterController@showUserRegistrationForm')->name('signUp');
    Route::get('/tournament-detail/{tournament_id}', 'User\TournamentsController@showTournamentDetails')->name('showTournament');
    Route::group(['prefix' => 'forums'], function () {
        Route::get('/', 'Forums\ForumController@index')->name('Forums');
        Route::get('category/{id}', 'Forums\ForumController@cagetory')->name('forumCategory');
        Route::get('post/{id}', 'Forums\ForumController@categoryPosts')->name('categoryposts');
        Route::post('subact/{id}', 'Forums\ForumController@addpost')->name('subcat');
        Route::post('addtopic/{cat_id}', 'Forums\ForumController@addtopic')->name('addtopic');
        Route::post('reply/', 'Forums\ForumController@reply')->name('reply');
        Route::post('editpost/', 'Forums\ForumController@edit')->name('editpost');
        Route::post('editpostreply/', 'Forums\ForumController@editreply')->name('editpostreply');

    });
    Route::group(['middleware' => ['is_user']], function () {
        Route::group(['prefix' => 'payments'], function () {
            Route::get('/', 'PaymentController@index')->name('paymentdetails');
        });
        Route::group(['prefix' => 'membership'], function () {
            Route::get('/', 'MembershipController@index')->name('membershiphome');
            Route::post('/subscribe/{id}', 'MembershipController@subscribeMembership')->name('subscribeMembership');
        });
        Route::group(['prefix' => 'user'], function () {


            Route::get('/addcomment', 'BlogController@addcommentajax')->name('addcommentajax');
            Route::get('/userdashboard', 'DashboardController@index')->name('userdashboard');
            Route::get('/teamhome', 'DashboardController@teamHome')->name('teamHome');
            Route::get('/edit-profile', 'DashboardController@editProfileform')->name('userProfileEdit');
            Route::post('/edit-profile', 'DashboardController@postEditProfile')->name('postUserProfile');
            Route::any('/team-detail/', 'DashboardController@teamDetail')->name('teamdetail');
        });


        Route::group(['prefix' => 'challenge'], function () {

            Route::get('/', 'User\ChallengeController@index')->name('challenges');
            Route::get('/check-winner/{id}', 'User\ChallengeController@checkWinner')->name('adasd');
            Route::post('/send-challenge', 'User\ChallengeController@sendChallenge')->name('sendchallenge');
            Route::get('/accept-challenge/{id}', 'User\ChallengeController@acceptChallenge')->name('accept_challenge');
            Route::get('/show-challenge/{id}', 'User\ChallengeController@showUserChallenges')->name('accept');
        });
        Route::group(['prefix' => 'tournaments'], function () {

            Route::get('/addteamname/{tournament_id}', 'User\TournamentsController@addTeam')->name('addTeam');
            Route::get('add-players/{team_id}/{tournament_id}', 'User\TournamentsController@playTournament')->name('addPlayers');
            Route::get('/addteam', 'User\TournamentsController@teamNamePostAjax')->name('teamNamePostAjax');
            Route::post('/addplayerajax', 'User\TournamentsController@addUserPlayer')->name('addUserTeamPlayerAjax');
            Route::post('/transferplayerajax', 'User\TournamentsController@transferPlayerPost')->name('transferPlayerAjax');
            Route::post('/deleteplayerajax', 'User\TournamentsController@deletePlayerPost')->name('deletePlayerAjax');
            Route::get('/transfer/{team_id}/{player_id}/{tournament_id}', 'User\TournamentsController@transferPlayer')->name('transferplayer');
            Route::get('/congrats/{team_id}', 'User\TournamentsController@sucessteam')->name('team-completed');
        });
    });
    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/', 'DashboardController@index')->name('UserDashboard');
        Route::get('/edit-profile', 'DashboardController@editProfileform')->name('userProfileEdit');
        Route::post('/edit-profile', 'DashboardController@postEditProfile')->name('userProfileEdit');
    });
});
Route::get('player-stats/{player_id}', 'User\TournamentsController@showPlayerState')->name('showPlayerStats');

//Adminroutes
Route::group(['middleware' => ['web'], 'prefix' => 'admin'], function () {

    Route::get('/', 'Auth\LoginController@showAdminLoginForm');
    Route::group(['middleware' => ['is_admin']], function () {
        Route::group(['prefix' => 'forums'], function () {
            Route::get('/', 'Admin\Forums\ForumsController@index')->name('lists');
            // Route::get('category/{id}', 'Forums\ForumController@cagetory')->name('forumCategory');
            //Route::get('post/{id}', 'Forums\ForumController@categoryPosts')->name('categoryposts');
            //Route::post('reply/', 'Forums\ForumController@reply')->name('reply');
            Route::get('category/', 'Admin\Forums\ForumsController@addCategory')->name('addcategory');
            Route::post('category/', 'Admin\Forums\ForumsController@addCategoryPost')->name('addcategory');
            Route::get('category_list/', 'Admin\Forums\ForumsController@listcategory')->name('listcategory');
            Route::get('category_list/{id}', 'Admin\Forums\ForumsController@editCategory')->name('editcategory');
            Route::post('category_list/{id}', 'Admin\Forums\ForumsController@postEditCategory')->name('editcategorypost');
            Route::post('approve', 'Admin\Forums\ForumsController@approve')->name('approve');
        });
        Route::get('/leaderboard/{tournament_id}', 'LeaderBoard\LeaderboardController@index')->name('leaderboard');
        Route::get('/dashboard', 'Admin\DashboardController@index'); //Gamesroutes
        Route::get('/addheader', 'Admin\SettingsController@index')->name('headerbackground');
        Route::post('/addheader', 'Admin\SettingsController@postAddHeader')->name('postAddHeader');
        Route::group(['prefix' => 'blog'], function () {
            Route::get('/', 'Admin\Blog\PostController@index')->name('blogList');
            Route::get('add', 'Admin\Blog\PostController@addBlogPost')->name('addPost');
            Route::post('add/{blog_id?}', 'Admin\Blog\PostController@postAddBlogPost')->name('postAddPost');
            Route::get('edit/{blog_id}', 'Admin\Blog\PostController@editBlogPost')->name('editPost');
            Route::post('edit/{blog_id}', 'Admin\Blog\PostController@editBlogPost')->name('postEditPost');
            Route::group(['prefix' => 'category'], function () {
                Route::get('/', 'Admin\Blog\CategoryController@index')->name('blogCategoryList');
                Route::get('addCategory', 'Admin\Blog\CategoryController@addCategory')->name('addCategory');
                Route::post('addCategory', 'Admin\Blog\CategoryController@postAddBlogCategory')->name('postAddBlogCategory');
            });
        });
        Route::group(['prefix' => 'ranking'], function () {
            Route::get('/', 'Admin\RankingController@index')->name('adminListRanking');
            Route::get('add/{cat_id}', 'Admin\RankingController@add')->name('addRankingAdmin');
            Route::get('edit/{ranking_id}', 'Admin\RankingController@edit')->name('editRankingAdmin');
            Route::post('edit/{ranking_id}', 'Admin\RankingController@editPost')->name('editPostRankingAdmin');
            Route::post('add', 'Admin\RankingController@addPost')->name('addPostRankingAdmin');
            Route::get('players/{cat_id}', 'Admin\RankingController@playerRankings')->name('playerRankingsAdmin');
            Route::get('delete/{ranking_id}', 'Admin\RankingController@deleteRanking')->name('deleteRanking');
        });
        Route::group(['prefix' => 'stats'], function () {
            Route::get('/add/{id}', 'Admin\StatsController@addStatForm')->name('showAddStatForm');
            Route::post('/add/{id}', 'Admin\StatsController@postAddStat')->name('postAddStat');
        });
        Route::group(['prefix' => 'stats'], function () {
            Route::get('/formats/{game_id}', 'Admin\StatsController@showGameTypeForm')->name('showGameFormats');
            //Route::get('/formats/{game_id}', 'Admin\GamesController@showGameTypeForm')->name('showGameFormats');
            Route::get('/add-stat/{game_id}', 'Admin\StatsController@addGameTypeStat')->name('showGameAddStatForm');
            Route::post('/addStat/{game_id}', 'Admin\StatsController@postAddGameStat')->name('postAddGameStat');
            Route::get('/add-game-format/{game_id}', 'Admin\GamesController@addGameFormat')->name('addGameFormat');
            Route::post('/add-game-format/{game_id}', 'Admin\StatsController@postAddGameFormat')->name('postAddGameFormat');
            Route::get('/add-stats/{player_id}', 'Admin\StatsController@addPlayerStats')->name('addPlayerStats');
            Route::post('/add-stats/{player_id}', 'Admin\StatsController@postPlayerStats')->name('postPlayerStats');
            Route::get('/edit-stat/{player_id}', 'Admin\StatsController@editPlayerStatForm')->name('editPlayerStats');
            Route::post('/edit-stat/{player_id}', 'Admin\StatsController@editPlayerStats')->name('postPlayerEditStats');
        });
        Route::group(['prefix' => 'games'], function () {
            Route::get('/', 'Admin\GamesController@index')->name('gameslist');
            Route::get('/add', 'Admin\GamesController@showAddView')->name('addGame'); //showsaddgameform
            Route::post('/add', 'Admin\GamesController@addPost')->name('postAddGame');
            Route::get('/edit/{game_id}', 'Admin\GamesController@editGameForm')->name('editGameForm');
            Route::post('/edit', 'Admin\GamesController@editGamePost')->name('postEditGame');
            Route::get('/delete/{game_id}', 'Admin\GamesController@deleteGame')->name('deleteGame');
            Route::post('/post-game-role', 'Admin\GamesController@addRolePost')->name('addGameRole');
            Route::delete('delete-game-role', 'Admin\GamesController@deleteGameRole')->name('deleteGameRole');
            Route::post('add-game-actions', 'Admin\GamesController@addGameActions')->name('addGameActions');
        });
//Gameterms
        Route::group(['prefix' => 'games-terms'], function () {
            Route::get('add-game-term/{action_id}', 'Admin\GameTermController@index')->name('addGameTermView');
            Route::get('game-term-points/{tournament_id}', 'Admin\GameTermController@gameTermPoints')->name('gameTermPoints');
            Route::post('term-points', 'Admin\GameTermController@updateTermPoints')->name('updateTermPoints');
            Route::post('add-game-term', 'Admin\GameTermController@addTermPost')->name('addGameTerm');
            Route::delete('delete-game-term', 'Admin\GameTermController@deleteGameTerm')->name('deleteGameTerm');
            Route::delete('delete-game-term-point', 'Admin\GameTermController@deleteGameTermPoint')->name('deleteGameTermPoint');
        });

//Teams
        Route::group(['prefix' => 'tournament-teams'], function () {
            Route::get('/', 'Admin\TeamsController@index')->name('teamsList');
            Route::get('addTeam', 'Admin\TeamsController@showAddTeamForm')->name('AddTeam');
            Route::post('postAddTeam', 'Admin\TeamsController@postAddTeam')->name('postAddTeam');
            Route::get('edit/{team_id}', 'Admin\TeamsController@editTeam')->name('editTeam');
            Route::post('edit/{team_id}', 'Admin\TeamsController@postEditTeam')->name('editTeam');
            Route::get('edit/{team_id}', 'Admin\TeamsController@addplayerstoteam')->name('addplayerstoteam');

            Route::post('add/{team_id}', 'Admin\TeamsController@postAddTeamPlayers')->name('postAddTeamPlayers');
        });
//Playersroutes
        Route::group(['prefix' => 'palyers'], function () {
            Route::get('/', 'Admin\PlayersController@index')->name('playerslist');
            Route::get('/add', 'Admin\PlayersController@addPlayerForm')->name('addPlayer'); //showsaddplayerform
            Route::post('/postAddPlayer', 'Admin\PlayersController@addPlayer')->name('postAddPlayer');
            Route::post('/edit', 'Admin\PlayersController@postEditPlayer')->name('editPlayer');
            Route::get('/edit/{player_id}', 'Admin\PlayersController@editPlayerForm')->name('editPlayerForm'); //showplayereditform
            Route::get('/ajax_get_game_terms', 'Admin\PlayersController@get_game_roles')->name('ajax_get_game_terms');
        });
//tournamentroutes
        Route::group(['prefix' => 'tournaments'], function () {

            Route::get('/start/{id}', 'Admin\TournamentsController@startTournament')->name('starttournament');
            Route::get('/delete/{tournament_id}/{player_id}', 'Admin\TournamentsController@deletePlayerFromTournament')->name('deletePlayerFromTournament');
            Route::get('/', 'Admin\TournamentsController@index')->name('Tournamentslist');
            Route::get('/add', 'Admin\TournamentsController@addTournamentForm')->name('addTournament'); //showsaddplayerform
            Route::post('/add', 'Admin\TournamentsController@add')->name('postAddTournament');
            Route::get('/edit/{tournament_id}', 'Admin\TournamentsController@editTournamentForm')->name('editTournamentForm');
            Route::post('/edit', 'Admin\TournamentsController@postEditTournament')->name('editTournament');
            Route::get('/addplayers/{tournament_id}', 'Admin\TournamentsController@showAddPlayerForm')->name('showAddPlayerForm');
            Route::post('/addplayers/', 'Admin\TournamentsController@postAddTournamentPlayers')->name('postAddTournamentPlayers');
            Route::get('/add-max-roles/{tournament_id}', 'Admin\TournamentsController@addTournamentRolesLimit')->name('addMaxRoles');
            Route::post('/add-max-roles/{tournament_id}', 'Admin\TournamentsController@postAddTournamentRolesLimit')->name('postAddmaxRoles');
        }); //Matches
        Route::group(['prefix' => 'match'], function () {
            Route::get('/', 'Admin\MatchesController@index')->name('Matcheslist');
            Route::get('/add', 'Admin\MatchesController@addMatchForm')->name('addMatch'); //showsaddplayerform
            Route::post('/add', 'Admin\MatchesController@addMatch')->name('postAddMatch');
            Route::get('/edit/{match_id}', 'Admin\MatchesController@editMatchForm')->name('editMatchForm');
            Route::post('/edit/{match_id}', 'Admin\MatchesController@postEditMatch')->name('editMatch');
            Route::get('/players/{match_id}', 'Admin\MatchesController@getMatchPlayers')->name('showMatchPlayers');
            Route::get('/add-player-score/match/{match_id}/player/{player_id}', 'Admin\MatchesController@playerMatchScore')->name('addPlayerMatchScore');
            Route::post('/addscores/{match_id}/{player_id}', 'Admin\MatchesController@postAddMatchScore')->name('postPlayerMatchScore');
            Route::get('/add-match-players/{match_id}', 'Admin\MatchesController@addMatchPlayerForm')->name('showAddMatchPlayerForm');
            Route::post('/add-match-players/{match_id}', 'Admin\MatchesController@postAddMatchPlayers')->name('postAddMatchPlayers');
            Route::get('/addTeamtoMatch/{match_id}/{tournament_id}', 'Admin\MatchesController@addTeamToMatchForm')->name('addTeamToMatch');
            Route::post('/addTeamtoMatch/{match_id}/{tournament_id}', 'Admin\MatchesController@addTeamToMatchPost')->name('addTeamToMatchPost');
        });
//Userroutes
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'Admin\UsersController@index')->name('listUsers');
            Route::get('/add', 'Admin\UsersController@addUser')->name('addUser');
            Route::post('/add', 'Auth\RegisterController@postAddUserFromAdmin')->name('postAddUser');
            Route::get('/edit/{user_id}', 'Admin\UsersController@userEditForm')->name('editUser');
            Route::post('/edit/{user_id}', 'Admin\UsersController@postAddUserFromAdmin')->name('postEditUser');
            Route::delete('/delete/{user_id}', 'Admin\UsersController@deleteUser')->name('deleteUser');
            Route::get('team/{user_id}', 'Admin\UsersController@users_team')->name('usersTeam');
        });
//useractionroutes
        Route::group(['prefix' => 'actions'], function () {
            Route::get('/', 'Admin\ActionsController@index')->name('listActions');
            Route::get('/add', 'Admin\ActionsController@addActionForm')->name('addAction');
            Route::post('/add', 'Admin\ActionsController@postAddAction')->name('postAddAction');
            Route::get('/edit/{action_id}', 'Admin\ActionsController@actionEditForm')->name('editAction');
            Route::post('/edit/{action_id}', 'Admin\ActionsController@postEditAction')->name('postEditAction');
            Route::delete('/delete/{user_id}', 'Admin\ActionsController@deleteUser')->name('deleteAction');
        });
    });
});


///Route for bloggers
Route::group(['middleware' => ['is_blogger'], 'prefix' => 'admin/blog'], function () {
    Route::get('/', 'Admin\Blog\PostController@index')->name('blogList');
    Route::get('add', 'Admin\Blog\PostController@addBlogPost')->name('addPost');
    Route::post('add/{blog_id?}', 'Admin\Blog\PostController@postAddBlogPost')->name('postAddPost');
    Route::get('edit/{blog_id}', 'Admin\Blog\PostController@editBlogPost')->name('editPost');
    Route::post('edit/{blog_id}', 'Admin\Blog\PostController@editBlogPost')->name('postEditPost');
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'Admin\Blog\CategoryController@index')->name('blogCategoryList');
        Route::get('addCategory', 'Admin\Blog\CategoryController@addCategory')->name('addCategory');
        Route::post('addCategory', 'Admin\Blog\CategoryController@postAddBlogCategory')->name('postAddBlogCategory');
    });
});
Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal', 'uses' => 'MembershipController@payWithPaypal',));
Route::post('paypal/{id}', array('as' => 'addmoney.paypal', 'uses' => 'MembershipController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status', 'uses' => 'MembershipController@getPaymentStatus',));
Route::post('test', array('as' => 'test', 'uses' => 'MembershipController@subscribeMembership',));
