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
        // dd(getGmtTime());
        $tournamnets = [];
        $tournamnets['previous'] = [];
        $tournamnets['current'] = [];
        $tournamnets['upcoming'] = [];
        $data = $this->tournamnetObj->orderBy('start_date', 'DESC')->get()->toArray();


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

    public function show($tournament_id)
    {


    }


    public function tournament_players(Request $request)
    {
        $tournament_id=3;
        $usersSelectedPlayers = \App\UserTeam::where('id', 264)->where('user_id', 317)
            ->with([
                'user_team_player'=>function($q){
                $q->orderBy('id','ASC');
                },
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
        //dd($selectedPlayers);

        $tournament_id = $request->id;
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
                    dd($player);
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
                        unset($player['player_tournaments']);
                        unset($player['pivot']);

                    }
                    $tournament_players[$role['name']][] = $player;
                    if(array_search($player['id'],$selectedPlayers));
                }


            }
        }
        if (empty($tournament_players)) {
            return response()->json(['message' => 'No Players In this Tournaments', 'more_info' => []], 404);
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
    public function tournament_leaderboard(Request $request){
        $tournament_id=$request->id;
        $result = \App\Leaderboard::where('tournament_id', $tournament_id)->with('user', 'user_team')->take(21)->
        orderBy('score', 'DESC')->get()->toArray();
     //dd($result);
        $leaders=[];
        $leaders['leaders']=[];
        $i=0;
        foreach ($result as $val){
            $val['name']=$val['user']['name'];
            $val['profile_pic']=getUploadsPath($val['user']['profile_pic']);

            unset($val['user']);
            unset($val['user_team']);


           $leaders['leaders'][]=$val;

        }
        return response()->json($leaders);

    }
    function binarySearch($needle, array $haystack, $compare, $high, $low = 0, $containsDuplicates = false)
    {
        $key = false;
        // Whilst we have a range. If not, then that match was not found.
        while ($high >= $low) {
            // Find the middle of the range.
            $mid = (int)floor(($high + $low) / 2);
            // Compare the middle of the range with the needle. This should return <0 if it's in the first part of the range,
            // or >0 if it's in the second part of the range. It will return 0 if there is a match.
            $cmp = call_user_func($compare, $needle, $haystack[$mid]);
            // Adjust the range based on the above logic, so the next loop iteration will use the narrowed range
            if ($cmp < 0) {
                $high = $mid - 1;
            } elseif ($cmp > 0) {
                $low = $mid + 1;
            } else {
                // We've found a match
                if ($containsDuplicates) {
                    // Find the first item, if there is a possibility our data set contains duplicates by comparing the
                    // previous item with the current item ($mid).
                    while ($mid > 0 && call_user_func($compare, $haystack[($mid - 1)], $haystack[$mid]) === 0) {
                        $mid--;
                    }
                }
                $key = $mid;
                break;
            }
        }

        return $key;
    }
}
