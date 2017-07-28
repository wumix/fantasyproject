<?php

namespace App\Http\Controllers\api;

use Auth;
use DB;
use \JWTAuth;
use App\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DateTime;

class TournamentsController extends Controller
{
    protected $tournamnetObj;

    function __construct()
    {
        $this->tournamnetObj = new Tournament;
    }

    function index(Request $request)
    {
//dd(apache_request_headers());
        dd(getGmtTime());

    }

    public function show(Request $request)
    {
        $game_id = $request->id;
        $tournamnets = [];
        $tournamnets['previous'] = [];
        $tournamnets['current'] = [];
        $tournamnets['upcoming'] = [];
        $data = $this->tournamnetObj->where('game_id', $game_id)->orderBy('start_date', 'DESC')->get()->toArray();


        foreach ($data as $tour) {

            if ($tour['start_date'] < getGmtTime() && $tour['end_date'] < getGmtTime()) {

                $tour['start_date'] = formatDate($tour['start_date']);
                $tour['end_date'] = formatDate($tour['end_date']);
                $tour['t_logo'] = getUploadsPath($tour['t_logo']);
                $tournamnets['previous'][] = $tour;
                continue;
            }
            if ($tour['start_date'] < getGmtTime() && $tour['end_date'] > getGmtTime()) {
                $tour['start_date'] = formatDate($tour['start_date']);
                $tour['end_date'] = formatDate($tour['end_date']);
                $tour['t_logo'] = getUploadsPath($tour['t_logo']);
                $tournamnets['current'][] = $tour;
                continue;
            }
            if ($tour['start_date'] > getGmtTime() && $tour['end_date'] > getGmtTime()) {
                $tour['start_date'] = formatDate($tour['start_date']);
                $tour['end_date'] = formatDate($tour['end_date']);
                $tour['t_logo'] = getUploadsPath($tour['t_logo']);
                $tournamnets['upcoming'][] = $tour;
                continue;
            }

        }

        return response()->json($tournamnets);


    }

    function getRoleCountInTeam($userid, $teamid, $roleid)
    {

        $count = DB::select("SELECT COUNT(pr.game_role_id) as total FROM `user_team_players` utp
        INNER JOIN player_roles pr ON pr.player_id = utp.player_id
        INNER JOIN user_teams ut ON ut.id = utp.team_id
        where utp.team_id = '$teamid' AND pr.game_role_id = '$roleid' AND ut.user_id = '$userid'");
        return ($count[0]->total);
        $x = \App\UserTeam::where('user_id', $userid)
            ->where('id', $teamid)
            ->with('user_team_player.player_roles')->firstOrFail()->toArray();

        $i = 0;
        foreach ($x['user_team_player'] as $row) {
            if ($row['player_roles'][0]['id'] == $roleid)
                $i++;
        }
        return $i;
    }

    function getTImeDifference($tournamentDate)
    {

        $datetime = new \DateTime($tournamentDate);
        $date = $datetime->format('Y-m-d H:i:s');
        $dateint = strtotime($date);
        $date1int = strtotime(getGmtTime());
        return $difference = round(($dateint - $date1int) / 60, 0);
    }

    function playerRoleLimit($tournament_id, $roleid)
    {
        $max = DB::table('tournament_role_limit')->select('max_limit')->where('tournament_id', $tournament_id)->where('player_role_id', $roleid)->get();

        if (empty($max->toArray())) {
            return 0;
        } else {
            return ($max[0]->max_limit);
        }
    }



    public function add_player(Request $request)
    {
        $tournamentDate = \App\Tournament::getStartdate($request->tournament_id);
        $difference = $this->getTImeDifference($tournamentDate);
        $tournamentMaxPlayers = \App\Tournament::getMaxPlayers($request->tournament_id);
        $currentNoPlayers = \App\UserTeam::find($request->team_id)->user_team_player()->count();
        $objResponse = [];
        $objResponse['status'] = false;
        if ($tournamentMaxPlayers > $currentNoPlayers) {
            if ($difference > 15 || $difference < 15) {
                if ($request->player_price <= getUserTotalScore(Auth::id(), $request->tournament_id)) {
                    if ($this->getRoleCountInTeam(Auth::id(), $request->team_id, $request->role_id) < $this->playerRoleLimit($request->tournament_id, $request->role_id)) {

                        $objteam = \App\UserTeam::find($request->team_id);
                        $objteam->user_team_player()->sync($request->player_id, false);
                        $array = array(['tournament_id' => $request->tournament_id, 'action_key' => 'add_player', 'user_id' => Auth::id(), 'points_consumed' => $request->player_price]);
                        \App\UserPointsConsumed::insert($array);
                        $objResponse['success'] = "true";
                        $objResponse['message'] = "Player added successfully";
                        $objResponse['batsmen'] = $this->getRoleCountInTeam(Auth::id(), $request->team_id, 5);
                        $objResponse['bowler'] = $this->getRoleCountInTeam(Auth::id(), $request->team_id, 6);
                        $objResponse['wicketkeeper'] = $this->getRoleCountInTeam(Auth::id(), $request->team_id, 8);
                        $objResponse['allrounder'] = $this->getRoleCountInTeam(Auth::id(), $request->team_id, 7);

                        $objResponse['player']['id'] = $request->player_id[0];
                        $objResponse['player']['name'] = \App\Player::get_player($request->player_id[0])->name;
                        $objResponse['player']['profile_pic'] = getUploadsPath(\App\Player::get_player($request->player_id[0])->profile_pic);
                        $objResponse['player']['price'] = $request->player_price;
                        $objResponse['player']['role_id'] = $request->role_id;
                        $objResponse['player']['role_name'] = $request->role_name;
                        $objResponse['player']['price'] = $request->player_price;
                        $objResponse['player']['team_id'] = $request->team_id;
                        $objResponse['player']['tournament_id'] = $request->tournament_id;
                        $objResponse['player_score'] = getUserTotalScore(Auth::id(), $request->tournament_id);
                    } else {
                        $objResponse['status'] = false;
                        $objResponse['msg'] = "You cant have more than " . $this->getRoleCountInTeam(Auth::id(), $request->team_id, $request->role_id) . " " . $request->role_name . "s in this Tournament";
                    }
                } else {
                    $objResponse['status'] = false;
                    $objResponse['msg'] = "You donot have enough points";
                }
            } else {
                $objResponse['status'] = false;
                $objResponse['msg'] = "Tournament starts in 15 minutes you cant add player now";
            }
        } else {
            $objResponse['status'] = false;
            $objResponse['msg'] = "You can't have more than $tournamentMaxPlayers in this tournament.";
        }
//        if (getUserTeamPlayersCount($request->team_id) == 11) {
//
//
//            $objResponse['status'] = true;
//            $objResponse['teamsuccess'] = true;
//            $objResponse['team_id'] = $request->team_id;
//            return response()->json($objResponse);
//        }
        //if($objResponse['status']==true){
        return $this->tournament_players($request);
        //  }else{
        //   return response()->json($objResponse);

        //}


    }

    public function delete_player(Request $request)
    {
        $teamdetails = \App\UserTeam::where('id', $request->team_id)->first();
        $tournament_id = $teamdetails->tournament_id;

        DB::table('user_team_players')->where('player_id', $request->player_id)->where('team_id', $request->team_id)->delete();
        $array = array(['tournament_id' => $tournament_id, 'action_key' => 'delete_player', 'user_id' => Auth::id(), 'points_scored' => $request->player_price]);
        \App\UserPointsScored::insert($array);
        return $this->tournament_players($request);

    }

    public function tournament_players(Request $request)
    {
        $team_id = $request->team_id;
        $tournament_id = $request->tournament_id;

        $usersSelectedPlayers = userTeamPlayers($team_id, $tournament_id);
        $team_name = $usersSelectedPlayers['name'];
        $selectedPlayers = [];
        if (!empty($usersSelectedPlayers['user_team_player'])) {
            $selectedPlayers = array_column($usersSelectedPlayers['user_team_player'], 'id');
        }

        $roles = \App\GameRole::with(['players.player_tournaments' => function ($q) use ($tournament_id) {
            $q->where('tournament_id', $tournament_id);
        },
//            'players' => function ($q) use ($selectedPlayers) {
//                $q->whereNotIn('players.id', $selectedPlayers);
//            },
            'players.player_actual_teams' => function ($query) use ($tournament_id) {
                $query->where('tournament_id', $tournament_id);
            },
        ])->whereHas('players.player_tournaments', function ($query) use ($tournament_id) {
            $query->where('tournament_id', $tournament_id);
        })->get()->toArray();

        $tournament_players = [];

        foreach ($roles as &$role) {
            foreach ($role['players'] as $key => &$player) {

                if (empty($player['player_tournaments'])) {
                    unset($role['players'][$key]);

                } else {
                    $player['profile_pic'] = getUploadsPath($player['profile_pic']);
                    if (empty($player['player_actual_teams'])) {
                        $player['team_name'] = NULL;
                    } else {
                        $player['team_id'] = $player['player_actual_teams'][0]['id'];
                        $player['team_name'] = $player['player_actual_teams'][0]['name'];
                        unset($player['player_actual_teams']);
                    }
                    if (empty($player['player_tournaments'])) {

                        $player['tournament_id'] = NULL;
                        $player['tournament_name'] = NULL;
                        $player['player_price'] = NULL;
                    } else {

                        $player['tournament_id'] = $player['player_tournaments'][0]['id'];
                        $player['tournament_name'] = $player['player_tournaments'][0]['name'];
                        $player['player_id'] = $player['player_tournaments'][0]['pivot']['player_id'];
                        $player['player_price'] = $player['player_tournaments'][0]['pivot']['player_price'];
                        $player['role_id'] = $player['pivot']['game_role_id'];

                        $player['in_team'] = $this->checkStatus(
                            $this->binary_search(  //binary search to find players in user team
                                $selectedPlayers, 0,
                                sizeof($selectedPlayers),
                                $player['id']));


                        unset($player['player_tournaments']);
                        unset($player['pivot']);

                    }
                    $tournament_players[str_replace(
                        ' ',
                        '_',
                        strtolower($role['name']))][] = $player;

                }


            }
        }


        if (empty($tournament_players)) {
            return response()->json(['status' => "false", 'message' => 'No Players In this Tournaments', 'more_info' => []], 404);
        }

        $tournament_players['bat_count'] = (String)$this->getRoleCountInTeam(Auth::id(), $team_id, 5);
        $tournament_players['bowl_count'] = (String)$this->getRoleCountInTeam(Auth::id(), $team_id, 6);
        $tournament_players['wicket_count'] = (String)$this->getRoleCountInTeam(Auth::id(), $team_id, 8);
        $tournament_players['allround_count'] = (String)$this->getRoleCountInTeam(Auth::id(), $team_id, 7);
        $tournament_players['total_count'] = (String)getUserTeamPlayersCount($team_id);
        $tournament_players['current_score'] = (String)getUserTotalScore(Auth::id(), $tournament_id);
        $tournament_players['team_name'] = $team_name;
        return response()->json($tournament_players);

    }

    function transfer_player(Request $request)
    {
     //  dd($request->all());

        $start_date = getGmtTime();
        $tournamentMatches = \App\Tournament::where('id', $request->tournament_id)->with(
            [
                'tournament_matches' => function ($query) use ($start_date) {
                    $query->where('start_date', '>', $start_date)->firstOrfail();
                }])->firstOrfail()->toArray();

        $nextMatchStartDate = $tournamentMatches['tournament_matches'][0]['start_date'];
        $difference = $this->getTImeDifference($nextMatchStartDate);
        $difference = abs($difference);
        $tournamentMaxPlayers = \App\Tournament::getMaxPlayers($request->tournament_id);
        $currentNoPlayers = \App\UserTeam::find($request->team_id)->user_team_player()->count();
        $objResponse = [];
        $objResponse['success'] = "false";
        $tournament_id = $request->tournament_id;
        $player_in_price = \App\Player::where('id', $request->player_in_id)->with(
            ['player_tournaments' => function ($k) use ($tournament_id) {
                $k->where('tournaments.id', $tournament_id);
            }])->firstORFail();


        $player_in_price = $player_in_price['player_tournaments'][0]['pivot']['player_price'];
          if ($difference > 15 || $difference < 15) {


            if (((getUserTotalScore(Auth::id(), $tournament_id)) + $request->player_out_price) >= ($player_in_price)) {


                $transferDate = new \DateTime();
                $transferDate = $transferDate->format('Y-m-d H:i:sP');
                $netpointsdeduction = ($request->player_out_price) - ($player_in_price);
                $netpointsdeduction = abs($netpointsdeduction);
                $player_out_score = get_individual_player_score($tournament_id, $request->team_id, $request->player_out_id);

                $array = array(['tournament_id' => $request->tournament_id, 'action_key' => 'transfer_player', 'user_id' => Auth::id(), 'points_consumed' => $netpointsdeduction]);
                \App\UserPointsConsumed::insert($array);
                $objResponse['success'] = "true";
                $objResponse['message'] = "Player transfered successfully";
                DB::table('user_team_players')->insert(
                    ['team_id' => $request->team_id, 'player_id' => $request->player_in_id]
                );
                DB::table('user_team_players')->where(['team_id' => $request->team_id, 'player_id' => $request->player_out_id])->delete();
                DB::table('player_transfer')->insert(
                    ['player_in_id' => $request->player_in_id, 'player_out_id' => $request->player_out_id,
                        'team_id' => $request->team_id, 'transfer_date' => new DateTime(),
                        'player_in_score' => get_individual_player_score($tournament_id, $request->team_id, $request->player_in_id),
                        'player_out_score' => $player_out_score]
                );


                $objResponse['team_id'] = $request->team_id;
                $objResponse['tournament_id'] = $request->tournament_id;

            } else {


                if ($player_in_price >= getUserTotalScore(Auth::id(), $tournament_id)) {
                    $objResponse['success'] = "false";
                    $objResponse['message'] = "You donot have enough points";


                } else {

                    $netpoints = $player_in_price - $request->player_out_price;
                    //   dd($netpoints);
                    $array = array(['tournament_id' => $request->tournament_id, 'action_key' => 'transfer_player', 'user_id' => Auth::id(), 'points_consumed' => $netpoints]);
                    \App\UserPointsConsumed::insert($array);
                    $player_out_score = get_individual_player_score($tournament_id, $request->team_id, $request->player_out_id);

                    DB::table('user_team_players')->where(['team_id' => $request->team_id,
                        'player_id' => $request->player_out_id])->delete();
                    DB::table('user_team_players')->insert(
                        ['team_id' => $request->team_id, 'player_id' => $request->player_in_id]
                    );
                    DB::table('player_transfer')->insert(
                        [
                            'player_in_id' => $request->player_in_id,
                            'player_out_id' => $request->player_out_id,
                            'team_id' => $request->team_id,
                            'transfer_date' => new DateTime(),
                            'player_in_score' => get_individual_player_score($tournament_id, $request->team_id, $request->player_in_id),
                            'player_out_score' => $player_out_score]
                    );

                    $objResponse['team_id'] = $request->team_id;
                    $objResponse['tournament_id'] = $request->tournament_id;
                    $objResponse['success'] = "true";
                    $objResponse['message'] = "Player transfered successfully";
                }

            }

        } else {
            $objResponse['success'] = "false";
            $objResponse['message'] = "Match starts in 15 minutes you cant transfer player now";
        }
        return response()->json($objResponse);
    }

    public function tournament_fixtures(Request $request)
    {
        $tournament_id = $request->id;
        $fixture_details = \App\Tournament::where('id', $tournament_id)->with(['tournament_matches' => function ($query) {
            $query->orderBy('start_date', 'asc');

        }])->first();
        if (empty($fixture_details['tournament_matches'])) {
            return response()->json(['message' => 'No tournament Found', 'more_info' => []], 404);


        } else {
            foreach ($fixture_details['tournament_matches'] as &$row) {
                $row['start_date'] = formatDate($row['start_date']);
                $row['start_time'] = formatTime($row['end_date']);
                $row['team_1_logo'] = getUploadsPath($row['team_1_logo']);
                $row['team_2_logo'] = getUploadsPath($row['team_2_logo']);
                unset($row['end_date'], $row['deleted_at'], $row['created_at'], $row['updated_at']);
            }

            $fixtures['fixtures'] = $fixture_details['tournament_matches'];
            return response()->json($fixtures, 200);

        }

    }

    public function tournament_leaderboard(Request $request)
    {
        $tournament_id = $request->id;
        $result = \App\Leaderboard::where('tournament_id', $tournament_id)->with('user', 'user_team')->take(21)->
        orderBy('score', 'DESC')->get()->toArray();
        //dd($result);
        $leaders = [];
        $leaders['leaders'] = [];
        $i = 0;
        foreach ($result as $val) {
            $val['name'] = $val['user']['name'];
            $val['profile_pic'] = getUploadsPath($val['user']['profile_pic']);

            unset($val['user']);
            unset($val['user_team']);


            $leaders['leaders'][] = $val;

        }
        return response()->json($leaders);

    }

    function cmp($a, $b)
    {
        return ($a < $b) ? -1 : (($a > $b) ? 1 : 0);
    }

    function checkStatus($id)
    {

        if ($id < 0) {
            return "false";
        } else {
            return "true";
        }
    }

    function binary_search(array $a, $first, $last, $key)
    {
        $lo = $first;
        $hi = $last - 1;

        while ($lo <= $hi) {
            $mid = (int)(($hi - $lo) / 2) + $lo;
            $cmp = $this->cmp($a[$mid], $key);

            if ($cmp < 0) {
                $lo = $mid + 1;
            } elseif ($cmp > 0) {
                $hi = $mid - 1;
            } else {
                return $mid;
            }
        }
        return -1;
    }
}
