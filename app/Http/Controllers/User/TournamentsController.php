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

    function index() {
        $objTourmament = \App\Tournament::all()->sortBy("start_date");
        ;
        $data['tournaments_list'] = $objTourmament->toArray();
        // dd( $data['tournaments_list']);
        return view('user.tournaments.home', $data);
    }

    function showTournamentDetails($tournament_id) {


        $data['tournament'] = \App\Tournament::where('id', $tournament_id)
                ->with('tournament_game.game_actions.game_terms', 'game_term_points')
                ->firstOrFail()
                ->toArray();
        $data['game_actions'] = $data['tournament']['tournament_game']['game_actions'];
        //dd($data);
        try {
            $data['players_in_tournament'] = [];
            $data['tournament_detail'] = \App\Tournament::where('id', $tournament_id)
//                ->with(['tournament_game' => function () {
//
//                    }, 'tournament_game.game_players' => function () {
//
//                    }]
//                )
                            ->firstOrFail()->toArray();
            //Getting firstRoleId
            $tournamentGameId = $data['tournament_detail']['game_id'];
            $role_id = Input::get('role-id');
            if (!$role_id) {
                $role_id = GameRole::where('game_id', $tournamentGameId)->first()->id;
            }
            $data['game_roles'] = GameRole::where('game_id', $tournamentGameId)
                            ->with([
                                'players' => function ($query) use ($role_id) {
                                    $query->where('game_role_id', $role_id);
                                },
                                'players.player_tournaments' => function ($query) use($tournament_id) {
                                    $query->where('tournament_id', $tournament_id);
                                },'players.player_actual_teams' => function($query) {
                                    $query->select('name', 'teams.id');
                                }
                            ])
                            ->get()->toArray();

            //dd($data);
            ////////Making player price
            //End making player price
            if (!empty($data['players_list']['tournament_players'])) {
                $data['players_in_tournament'] = array_flatten(array_column(array_column($data['players_list']['tournament_players'], 'pivot'), 'player_id'));
            }
            $data['role_id'] = $role_id;
            //  dd( $data['game_roles']);
            return view('user.tournaments.show_torunament', $data);
        } catch (ModelNotFoundException $ex) {
            abort(404);
        }
    }

    function addTeam($tournament_id) {

//        $tournamentPrice=\App\Tournament::find(1)->tournament_price;
//
//        if($tournamentPrice<getUserTotalScore(Auth::id())) echo"less";
//        dd($tournamentPrice);

        $userteam = \App\UserTeam::where(['tournament_id' => $tournament_id, 'user_id' => Auth::id()])->first();

        if (empty($userteam)) {
            $data['team_name'] = NULL;
            $data['tournament_detail'] = \App\Tournament::where('id', $tournament_id)->firstOrFail()->toArray();
            return view('user.tournaments.add_user_team', $data);
        } else {
            $userteam = $userteam->toArray();
            return redirect()->route('addPlayers', ['team_id' => $userteam['id'], 'tournament_id' => $tournament_id]);
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
        $max = DB::table('tournament_role_limit')->select('max_limit')->where('tournament_id', $tournament_id)->where('player_role_id', $roleid)->get();

        if (empty($max->toArray())) {
            return 0;
        } else {
            return ($max[0]->max_limit);
        }
    }

    function playTournament($team_id, $tournament_id) {
//        echo get_individual_player_score("1",'5','88');
//       die;


        $tournamentDate = \App\Tournament::getStartdate($tournament_id);
        $difference = $this->getTImeDifference($tournamentDate);

       // die;
        $usersSelectedPlayers = UserTeam::where('id', $team_id)->where('user_id', Auth::user()->id)
                        ->with([
                            'user_team_player',
                            'user_team_player.player_roles',
                            'user_team_player.player_tournaments' => function ($q) use ($tournament_id) {
                                $q->where('tournaments.id', $tournament_id);
                            },
                            'teamtournament.tournament_players'
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

        $roles = GameRole::with(['players.player_tournaments' => function ($q) use ($tournament_id) {
                        $q->where('tournament_id', $tournament_id);
                    },
                    'players' => function ($q) use ($selectedPlayers) {
                        $q->whereNotIn('players.id', $selectedPlayers);
                    },
                    'players.player_actual_teams' => function($query) {
                        $query->select('name', 'teams.id');
                    },
                ])->whereHas('players.player_tournaments', function ($query) use ($tournament_id) {
                    $query->where('tournament_id', $tournament_id);
                })->get()->toArray();
       // dd($roles);die;
        $data['roles'] = $this->array_filter_recursive($roles);

        return view('user.tournaments.my_team', $data);
    }

    function array_filter_recursive($input) {
        foreach ($input as &$value) {
            if (is_array($value)) {
                $value = $this->array_filter_recursive($value);
            }
        }
        return array_filter($input);
    }

    function transferPlayer($team_id, $player_id, $tournament_id) {


        // dd($test=$test->toArray());


        $usersSelectedPlayers = UserTeam::where('id', $team_id)
                        ->with([
                            'user_team_player',
                            'user_team_player.player_roles',
                            'user_team_player.player_tournaments' => function ($q) use ($tournament_id) {
                                $q->where('tournaments.id', $tournament_id);
                            },
                            'teamtournament.tournament_players'
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
        $data['user_team_players'] = $usersSelectedPlayers['user_team_player'];
        //searching players to be transfered in user selected players
        $data['player_info'] = [];
        foreach ($data['user_team_players'] as $key => $val) {
            if ($val['id'] == $player_id)
                $data['player_info'] = $val;
        }
        if (empty($data['player_info']))
            abort(404);
        //  dd($usersSelectedPlayers['user_team_player']);
        //dd($data['player_info']);
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
                ])->where('id', $data['player_info']['player_roles'][0]['id'])->whereHas('players.player_tournaments', function ($query) use ($tournament_id) {
                    $query->where('tournament_id', $tournament_id);
                })->get()->toArray();
        // dd($data['roles']);

        return view('user.tournaments.player_transfer', $data);
    }

    function teamNamePostAjax(Request $request) {
        $tournament_id = Input::get('tournament_id');
        $userteam = Input::get('name');
        $this->validator($request->all())->validate();
        $teamid = \App\UserTeam::where(['tournament_id' => $tournament_id, 'user_id' => Auth::id()])->first();
        $data = [];
        if ($teamid == null) {
            $teamid['id'] = 0;
        } else {
            $teamid = $teamid->first()->toArray();
        }

        $tournamentPrice = \App\Tournament::find($tournament_id)->tournament_price;

        if ($tournamentPrice < (double) getUserTotalScore(Auth::id())) {
            $tournamentData = [
                'tournament_id' => $tournament_id,
                'user_id' => Auth::id(),
                'name' => $userteam,
            ];
            \App\UserTeam::updateOrCreate(
                    ['id' => $teamid['id']], $tournamentData
            );

            $array = array(
                ['action_key' => 'pusrchase_tournament', 'user_id' => Auth::id(), 'points_consumed' => $tournamentPrice]
            );
            \App\UserPointsConsumed::insert($array);
            $userteam = \App\UserTeam::where(['tournament_id' => $tournament_id, 'user_id' => Auth::id()])->first()->toArray();

            $data['team_id'] = $userteam['id'];
            $data['team_name'] = $userteam['name'];
            $data['status'] = "ok";
        } else {
            $data['status'] = "no";
            $data['message'] = "You dont have enough points to play this tournament";
        }


        return response()->json($data);
    }

    function getTImeDifference($tournamentDate) {
        $datetime = new \DateTime($tournamentDate);
        $date = $datetime->format('Y-m-d H:i:sP');
        $dateint = strtotime($date);
        $date1 = new DateTime();
        $date1 = $date1->format('Y-m-d H:i:sP');
        $date1int = strtotime($date1);
        return $difference = round(($dateint - $date1int) / 60, 0);
    }

    function transferPlayerPost(Request $request) {
// dd($request->all());
        $tournamentDate = \App\Tournament::getStartdate($request->tournament_id);
        $difference = $this->getTImeDifference($tournamentDate);
//        $tournamentMaxPlayers = \App\Tournament::getMaxPlayers($request->tournament_id);
//        $currentNoPlayers = \App\UserTeam::find($request->team_id)->user_team_player()->count();
        $objResponse = [];
        $objResponse['success'] = false;
        $tournament_id = $request->tournament_id;
        $player_in_price = \App\Player::where('id', $request->player_in_id)->with(['player_tournaments' => function ($k) use ($tournament_id) {
                        $k->where('tournaments.id', $tournament_id);
                    }])->firstORFail();

        $player_in_price = $player_in_price['player_tournaments'][0]['pivot']['player_price'];
        // dd($player_in_price);
        // die;

        if ($difference > 15 || $difference < 15) {
//            echo $player_in_price." ". getUserTotalScore(Auth::id());
//            die;
            if ($player_in_price<= getUserTotalScore(Auth::id())) {


                if ($request->player_out_price >= $player_in_price) {

//                    $playertransfers = new \App\PlayerTransfer;
//                    $playertransfers->player_in_id = $request->player_in_id;
//                    $playertransfers->player_out_id = $request->player_out_id;
//                    $playertransfers->team_id = $request->team_id;
                    $transferDate = new \DateTime();
                    $transferDate = $transferDate->format('Y-m-d H:i:sP');
                    //  $playertransfers->transfer_date = $transferDate;
//                    $playertransfers->save();
                    $player_out_score=get_individual_player_score($tournament_id,$request->team_id,$request->player_out_id);

                    $array = array(['action_key' => 'transfer_player', 'user_id' => Auth::id(), 'points_consumed' => 0]);
                    \App\UserPointsConsumed::insert($array);
                    $objResponse['success'] = true;
                    $objResponse['msg'] = "Player transfered successfully";
                    DB::table('user_team_players')->insert(
                            ['team_id' => $request->team_id, 'player_id' => $request->player_in_id]
                    );
                    DB::table('user_team_players')->where(['team_id' => $request->team_id, 'player_id' => $request->player_out_id])->delete();
                    DB::table('player_transfer')->insert(
                        ['player_in_id' => $request->player_in_id, 'player_out_id' => $request->player_out_id,
                            'team_id' => $request->team_id,'transfer_date'=>new DateTime(),
                            'player_in_score'=>get_individual_player_score($tournament_id,$request->team_id, $request->player_in_id),
                            'player_out_score'=>$player_out_score]
                    );

//                        $objResponse['player']['id'] = $request->player_in_id;
//                        $objResponse['player']['name'] = \App\Player::get_player($request->player_id[0])->name;
//                        $objResponse['player']['profile_pic'] = getUploadsPath(\App\Player::get_player($request->player_id[0])->profile_pic);
//                        $objResponse['player']['price'] = $request->player_price;
//                        $objResponse['player']['role_id'] = $request->role_id;
//                        $objResponse['player']['role_name'] = $request->role_name;
//                        $objResponse['player']['price'] = $request->player_in_price;

                    $objResponse['team_id'] = $request->team_id;
                    $objResponse['tournament_id'] = $request->tournament_id;
//                        $objResponse['user_score'] = getUserTotalScore(Auth::id());
                } else {

                    $netpoints = $player_in_price - $request->player_out_price;
                    //   dd($netpoints);
                    $array = array(['action_key' => 'transfer_player', 'user_id' => Auth::id(), 'points_consumed' => $netpoints]);
                    \App\UserPointsConsumed::insert($array);
                    $player_out_score=get_individual_player_score($tournament_id,$request->team_id,$request->player_out_id);

                    DB::table('user_team_players')->where(['team_id' => $request->team_id,
                        'player_id' => $request->player_out_id])->delete();
                    DB::table('user_team_players')->insert(
                        ['team_id' => $request->team_id, 'player_id' => $request->player_in_id]
                    );
                    DB::table('player_transfer')->insert(
                        ['player_in_id' => $request->player_in_id, 'player_out_id' => $request->player_out_id,
                            'team_id' => $request->team_id,'transfer_date'=>new DateTime(),
                            'player_in_score'=>get_individual_player_score($tournament_id,$request->team_id, $request->player_in_id),
                            'player_out_score'=>$player_out_score]
                    );

                    $objResponse['team_id'] = $request->team_id;
                    $objResponse['tournament_id'] = $request->tournament_id;
                    $objResponse['success'] = true;
                    $objResponse['msg'] = "Player transfered successfully";
                }
            } else {
                $objResponse['success'] = false;
                $objResponse['msg'] = "You donot have enough points";
            }
        } else {
            $objResponse['success'] = false;
            $objResponse['msg'] = "Tournament starts in 15 minutes you cant add player now";
        }
        return response()->json($objResponse);
    }
         function deletePlayerPost(Request $request){

             DB::table('user_team_players')->where('player_id',$request->player_id)->where('team_id',$request->team_id)->delete();
             $array = array(['action_key' => 'delete_player', 'user_id' => Auth::id(), 'points_scored' => $request->player_price]);
             \App\UserPointsScored::insert($array);
             $objResponse['player_id'] = $request->player_id;
             $objResponse['success']=true;
             $objResponse['score']=getUserTotalScore(Auth::id());;
             $objResponse['msg']="Player Deleted Successfully";

             return response()->json($objResponse);





        }
    function addUserPlayer(Request $request) {
        $tournamentDate = \App\Tournament::getStartdate($request->tournament_id);
        $difference = $this->getTImeDifference($tournamentDate);
        $tournamentMaxPlayers = \App\Tournament::getMaxPlayers($request->tournament_id);
        $currentNoPlayers = \App\UserTeam::find($request->team_id)->user_team_player()->count();


        $data = [];
        $objResponse = [];
        $objResponse['success'] = false;
        if ($tournamentMaxPlayers > $currentNoPlayers) {
            if ($difference > 15 || $difference < 15) {
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
                        $objResponse['player']['tournament_id'] = $request->tournament_id;
                        $objResponse['player_score'] = getUserTotalScore(Auth::id());
                    } else {
                        $objResponse['success'] = false;
                        $objResponse['msg'] = "You cant have more than " . $this->giveanygoodname(Auth::id(), $request->team_id, $request->role_id) . " " . $request->role_name . "s in this Tournament";
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

        //$currentNoPlayers += 1;
        if ($currentNoPlayers >= 10) {

            $userteamsave=\App\UserTeam::find($request->team_id);
            $userteamsave->joined_from_match_date=getGmtTime();
            $userteamsave->save();


            $objResponse['success'] = true;
            $objResponse['teamsuccess'] = true;
            $objResponse['team_id'] = $request->team_id;
            //joined_from_match_date -- I guess update team here
            return response()->json($objResponse);
        } else {
            return response()->json($objResponse);
        }
    }

    public function sucessteam($team_id) {
        $data['team_id'] = $team_id;
        return view('pages.teamconfirmation', $data);
    }

    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'unique:user_teams'
        ]);
    }

}
