<?php

namespace App\Http\Controllers\api;

use \JWTAuth;
use App\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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


    public function tournament_players(Request $request)
    {
      //  dd($request->all());
        $team_id =$request->id;
        $tournament_id=$request->tournament_id;
        $usersSelectedPlayers = \App\UserTeam::where('id', $team_id)->where('user_id', \Auth::id())
            ->with([
                'user_team_player' => function ($q) {
                    $q->orderBy('id', 'ASC');
                },
                'user_team_player.player_roles',
                'user_team_player.player_tournaments' => function ($q) use ($tournament_id) {
                    $q->where('tournaments.id', $tournament_id);
                },
                'teamtournament.tournament_players'
            ])->firstOrFail()->toArray();

        //$tournament_id = $usersSelectedPlayers['tournament_id'];
        $selectedPlayers = [];
        if (!empty($usersSelectedPlayers['user_team_player'])) {
            $selectedPlayers = array_column($usersSelectedPlayers['user_team_player'], 'id');
        }
        //dd($selectedPlayers);


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
                        $player['in_team'] = "false";
//                            $this->checkStatus($this->binary_search(
//                            $selectedPlayers, 0,
//                            sizeof($selectedPlayers), $player['id']));


                        unset($player['player_tournaments']);
                        unset($player['pivot']);

                    }
                    $tournament_players[str_replace(' ', '_', strtolower($role['name']))][] = $player;
                    if (array_search($player['id'], $selectedPlayers)) ;
                }


            }
        }
        if (empty($tournament_players)) {
            return response()->json(['status'=>"false",'message' => 'No Players In this Tournaments', 'more_info' => []], 404);
        }


        return response()->json($tournament_players);

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
    function cmp($a, $b) {
        return ($a < $b) ? -1 : (($a > $b) ? 1 : 0);
    }
    function checkStatus($id){

        if ($id) {
            return "true";
        } else {
            return "false";
        }
    }

    function binary_search(array $a, $first, $last, $key) {
        $lo = $first;
        $hi = $last - 1;

        while ($lo <= $hi) {
            $mid = (int)(($hi - $lo) / 2) + $lo;
            $cmp = $this->cmp( $a[$mid], $key);

            if ($cmp < 0) {
                $lo = $mid + 1;
            } elseif ($cmp > 0) {
                $hi = $mid - 1;
            } else {
                return $mid;
            }
        }
        return false;
    }
}
