<?php

namespace App\Http\Controllers\user;

use App\GameRole;
use App\Player;
use App\Tournament;
use App\UserTeam;
use Illuminate\Support\Facades\DB;
use \Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;
use DateTimeZone;

class TournamentsController extends Controller {

    function __construct() {
        $this->objTourmament = new \App\Tournament;
    }

    function showTournamentDetails($tournament_id) {

        try {
            $data['players_in_tournament'] = [];
            $data['tournament_detail'] = \App\Tournament::where('id', $tournament_id)
                            ->with(['tournament_game' => function () {
                                    
                                }, 'tournament_game.game_players' => function () {
                                    
                                }, 'tournament_players' => function ($query) {
                                    
                                }]
                            )->firstOrFail()->toArray();

            ////////Making player price
            //End making player price
            if (!empty($data['players_list']['tournament_players'])) {
                $data['players_in_tournament'] = array_flatten(array_column(array_column($data['players_list']['tournament_players'], 'pivot'), 'player_id'));
            }
            return view('user.tournaments.show_torunament', $data);
        } catch (ModelNotFoundException $ex) {
            abort(404);
        }
    }

    function addTeam($tournament_id) {

        $userteam = \App\UserTeam::where(['tournament_id' => $tournament_id, 'user_id' => Auth::id()])->first();

        if (empty($userteam)) {
            $data['team_name'] = NULL;
            $data['tournament_detail'] = \App\Tournament::where('id', $tournament_id)->firstOrFail()->toArray();
            return view('user.tournaments.add_user_team', $data);
        } else {
            $userteam = $userteam->toArray();
            return redirect()->route('addPlayers', ['team_id' => $userteam['id']]);
        }
    }

    function giveanygoodname($userid, $teamid, $roleid) {

        $count = DB::select("SELECT COUNT(pr.game_role_id) as total FROM `user_team_players` utp
    INNER JOIN player_roles pr ON pr.player_id = utp.player_id
    INNER JOIN user_teams ut ON ut.id = utp.team_id
    where utp.team_id = '$teamid' AND pr.game_role_id = '$roleid' AND ut.user_id = '$userid'");
        return ($count[0]->total);

//        returns no of players in user team against a specific role i.e no of batsmen
        $x = \App\UserTeam::where('user_id', $userid)
                        ->where('tournament_id', $tournament_id)
                        ->with('user_team_player.player_roles')->firstOrFail()->toArray();

        $i = 0;
        foreach ($x['user_team_player'] as $row) {
            if ($row['player_roles'][0]['id'] == $roleid)
                $i++;
        }
        return $i;
    }

    function playerRoleLimit($tournament_id, $roleid) {
        $max = DB::table('tournament_role_imit')->select('max_limit')->where('tournament_id', $tournament_id)->where('player_role_id', $roleid)->get();

        if (empty($max->toArray())) {
            return 0;
        } else {
            return ($max[0]->max_limit);
        }
    }

    function playTournament($team_id) {


//        $tournamentDate = \App\Tournament::getStartdate(3);
//        $datetime = new \DateTime($tournamentDate);
//        $date = $datetime->format('Y-m-d H:i:sP');
//        $dateint = strtotime($date);
//        $date1 = new DateTime();
//        $date1 = $date1->format('Y-m-d H:i:sP');
//        $date1int = strtotime($date1);
//        $difference = round(($dateint - $date1int) / 60, 0);
//        dd($difference);

        $usersSelectedPlayers = UserTeam::where('id', $team_id)
                        ->with([
                            'user_team_player' => function ($q) {
                                //     $q->select('player_id');
                            },
                            'teamtournament'
                        ])->firstOrFail()->toArray();
        $tournament_id = $usersSelectedPlayers['tournament_id'];
        $selectedPlayers = [];
        if (!empty($usersSelectedPlayers['user_team_player'])) {
            $selectedPlayers = array_column($usersSelectedPlayers['user_team_player'], 'id');
        }
        $data['team_id'] = $usersSelectedPlayers['id'];
        $data['team_name'] = $usersSelectedPlayers['name'];
        $data['user_team_player'] = $usersSelectedPlayers['user_team_player'];
        $data['tournament_detail'] = $usersSelectedPlayers['teamtournament'];
        //  dd($usersSelectedPlayers['user_team_player']);
//debugArr($usersSelectedPlayers);
//debugArr($selectedPlayers);
        //dd($selectedPlayers);
        // $data['roles']=$selectedPlayers;
        // $selectedPlayers=[1,2,3,4];
        $data['roles'] = GameRole::with(['players.player_tournaments' => function ($q) use ($tournament_id) {
                        $q->where('tournament_id', $tournament_id);
                    },
                    'players' => function ($q) use ($selectedPlayers) {
                        $q->whereNotIn('players.id', $selectedPlayers);
                    }
                ])->whereHas('players.player_tournaments', function ($query) use ($tournament_id) {
                    $query->where('tournament_id', $tournament_id);
                })->get()->toArray();
        // dd($data['roles']);
        return view('user.tournaments.my_team', $data);
//
    }

    function transferPlayer($tournament_id, $player_id) {
        $userteam = \App\UserTeam::where(['tournament_id' => $tournament_id, 'user_id' => Auth::id()])->first();
        $data['tournament_max_roles_values'] = \App\Tournament::where('id', $tournament_id)->with('tournament_role_max')->firstOrFail()->toArray();
        $data['tournament_max_roles'] = \App\Tournament::where('id', $tournament_id)->with('tournament_game.game_roles')->firstOrFail()->toArray();
        $data['player_info'] = \App\Player::get_player($player_id)->toArray();
        //dd($data['player_info']);
        if ($userteam == null) {
            abort(404, 'Page Not Found');
            $data['team_name'] = NULL;
        } else {
            $data['team_name'] = $userteam->name;
            $data['team_id'] = $userteam->id;
            $data['user_team_players'] = \App\UserTeam::where('tournament_id', $tournament_id)->where('user_id', Auth::id())
                            ->with('user_team_player.player_tournaments', 'user_team_player.player_roles')
                            ->firstOrFail()->toArray();
        }
        try {
            $data['players_in_tournament'] = [];
            $data['tournament_detail'] = \App\Tournament::where('id', $tournament_id)
                            ->with(['tournament_game' => function () {
                                    
                                }, 'tournament_game.game_players' => function () {
                                    
                                }, 'tournament_players.player_roles' => function ($query) {
                                    
                                }]
                            )->firstOrFail()->toArray();

            ////////Making player price
            //End making player price
            if (!empty($data['players_list']['tournament_players'])) {
                $data['players_in_tournament'] = array_flatten(array_column(array_column($data['players_list']['tournament_players'], 'pivot'), 'player_id'));
            }
            return view('user.tournaments.player_transfer', $data);
        } catch (ModelNotFoundException $ex) {
            abort(404);
        }
    }

    function teamNamePostAjax(Request $request) {
        $tournament_id = Input::get('tournament_id');
        $userteam = Input::get('name');
        $this->validator($request->all())->validate();
        $teamid = \App\UserTeam::where(['tournament_id' => $tournament_id, 'user_id' => Auth::id()])->first();

        if ($teamid == null) {
            $teamid['id'] = 0;
        } else {
            $teamid = $teamid->first()->toArray();
        }
        \App\UserTeam::updateOrCreate(['id' => $teamid['id']], ['tournament_id' => $tournament_id, 'user_id' => Auth::id(), 'name' => $userteam]);

        $points = \App\UserAction::getPointsByKey('pusrchase_tournament');
        $array = array(['action_key' => 'pusrchase_tournament', 'user_id' => Auth::id(), 'points_consumed' => $points]);
        \App\UserPointsConsumed::insert($array);
        $userteam = \App\UserTeam::where(['tournament_id' => $tournament_id, 'user_id' => Auth::id()])->first()->toArray();

        $data['team_id'] = $userteam['id'];
        $data['team_name'] = $userteam['name'];
        $data['status'] = "ok";


        return response()->json($data);
    }

    function addUserPlayer(Request $request) {

        $tournamentDate = \App\Tournament::getStartdate($request->tournament_id);
        $datetime = new \DateTime($tournamentDate);
        $date = $datetime->format('Y-m-d H:i:sP');
        $dateint = strtotime($date);
        $date1 = new DateTime();
        $date1 = $date1->format('Y-m-d H:i:sP');
        $date1int = strtotime($date1);
        $difference = round(($dateint - $date1int) / 60, 0);
        $tournamentMaxPlayers = \App\Tournament::getMaxPlayers($request->tournament_id);
        $currentNoPlayers = \App\UserTeam::find($request->team_id)->user_team_player()->count();

        $data = [];
        $objResponse = [];
        $objResponse['success'] = false;
        if ($tournamentMaxPlayers > $currentNoPlayers) {
            if ($difference > 15) {
                if ($request->player_price < getUserTotalScore(Auth::id())) {
                    if ($this->giveanygoodname(Auth::id(), $request->team_id, $request->role_id) < $this->playerRoleLimit($request->tournament_id, $request->role_id)) {

                        $objteam = \App\UserTeam::find($request->team_id);
                        $objteam->user_team_player()->sync($request->player_id, false);
                        $array = array(['action_key' => 'add_player', 'user_id' => Auth::id(), 'points_consumed' => $request->player_price]);
                        \App\UserPointsConsumed::insert($array);
                        $objResponse['success'] = true;
                        $objResponse['msg'] = "Player added successfully";
                        $objResponse['player']['id'] = $request->player_id[0];
                        $objResponse['player']['name'] = \App\Player::get_player($request->player_id[0])->name;
                        $objResponse['player']['profile_pic'] = getUploadsPath(\App\Player::get_player($request->player_id[0])->profile_pic);
                        $objResponse['player']['price'] = $request->player_price;
                        $objResponse['player']['role_id'] = $request->role_id;
                        $objResponse['player']['role_name'] = $request->role_name;
                        $objResponse['player']['price'] = $request->player_price;
                        $objResponse['player']['team_id'] = $request->team_id;
                        $objResponse['player']['player_score'] = getUserTotalScore(Auth::id());
                    } else {
                        $objResponse['success'] = false;
                        $objResponse['msg'] = "You cant have more " . $request->role_name;
                    }
                } else {
                    $objResponse['success'] = false;
                    $objResponse['msg'] = "You donot have enough points";
                }
            } else {
                $objResponse['success'] = false;
                $objResponse['msg'] = "Tournament starts in 15 minutes you cant add player now";
            }
        } else {
            $objResponse['success'] = false;
            $objResponse['msg'] = "You can't have more than $tournamentMaxPlayers in this tournament.";
        }
        return response()->json($objResponse);
    }

    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'unique:user_teams'
        ]);
    }

}
