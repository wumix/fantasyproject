<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlayersController extends Controller
{
    //
    function index(Request $request)
    {


    }

    function getPlayerStats(Request $request)
    {
        $player_id = $request->id;
        $player = \App\Player::where('id', $player_id)->
        with(['player_games.game_type.game_type_stats_category.game_type_stats.player' =>
            function ($k) use ($player_id) {
                $k->where('player_id', $player_id);
            }
        ])->firstOrFail()->toArray();
        $result=[];
        foreach ($player['player_games']['game_type'] as $gametype) {

            foreach ($gametype['game_type_stats_category'] as $key=>$game_type_stats)  //game_type_stats_category are batting bowling etc
            {


                foreach ($game_type_stats['game_type_stats'] as $typestats) {


                   // if (!empty($typestats['player'])) {
     //          dd($result);
                      $result[$gametype['type_name']][$game_type_stats['name']][$typestats['name']] = $typestats['player'][0]['pivot']['stat_points'];

                      // }

                }
               // dd($result);
            }
        }
        // die;
        return response()->json($result);
       // return response()->json($player);
    }
}
