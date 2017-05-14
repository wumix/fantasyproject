<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class StatsController extends Controller
{

    //
    public function index()
    {

    }

    function editPlayerStatForm(Request $request, $player_id)
    {
        $data['player'] = \App\Player::where('id', $player_id)->
        with(['player_games.game_type.game_type_stats_category.game_type_stats.player' =>
            function ($k) use ($player_id) {
                $k->where('player_id', $player_id);            }
        ])->firstOrFail()->toArray();
        // dd($data['player']);
        return view('adminlte::players.player_edit_stat_form', $data);
    }

    function postPlayerStats(Request $request, $player_id)
    {

        \App\PlayerStatistics::where('player_id', $player_id)->delete();


        $syncdata = [];
        foreach ($request->stats as $key => $val) {
            $syncdata = array(
                array('stat_points' => $val['name'], 'game_type_stat_id' => $val['id'], 'player_id' => $player_id)


            );
            \App\PlayerStatistics::insert($syncdata);

        }
//        dd($request->all());

        return redirect()->back()->with('status', 'Stats Updated Sucessfully');


    }

    function addPlayerStats(Request $request, $player_id)
    {

        $player = \App\Player::where('id', $player_id)->with('player_stats')->get()->toArray();
        $data['player_info'] = $player;
        // dd($player);
        $game_types = \App\GameType::where('game_id', 1)->
        with('game_type_stats_category.game_type_stats')->get()->toArray();
        $data['game_types'] = $game_types;
        //dd($game_types);


        return view('adminlte::players.player_add_stat_form', $data);


    }

    function addGameTypeStat(Request $request, $game_id)
    {

        $data['game_id'] = $game_id;
        $data['game_type'] = $request->game_type;
        $game_types = \App\GameType::where('game_id', $game_id)->where('id', $request->game_type)->with('game_type_stats_category.game_type_stats')->firstOrFail()->toArray();
        $data['game_types'] = $game_types;

        //dd($game_types);

        return view('adminlte::games.add_game_type_stats', $data);
    }

    function postAddGameStat(Request $request)
    {
        //dd($request->all());

        foreach ($request->name as $row) {
            \App\GameTypeStats::updateOrCreate(
                ['id' => $row['prime_id']],
                ['name' => $row['name'], 'game_type_stat_category_id' => $row['id']]
            );
        }


        return redirect()->back()->with('status', 'Values Updated');


    }

    function showGameTypeForm(Request $request, $game_id)
    {
        $data['game_id'] = $game_id;
        $game_types = \App\GameType::where('game_id', $game_id)->get()->toArray();
        $data['game_types'] = $game_types;

        return view('adminlte::games.game_type_form', $data);
    }

    function postAddGameFormat(Request $request, $game_id)
    {
        $flight = \App\GameType::updateOrCreate(
            ['game_id' => $game_id, 'type_name' => $request->name],
            ['type_name' => $request->name]
        );
        return redirect()->back()->with('status', 'Type Added Successfully');

    }

    public function addStatForm($id)
    {

        $player = \App\Player::where('id', $id)->with('game_types.game_type_points')->get()->toArray();
        if (!empty($player)) {
            $data['player_info'] = $player[0];
        }
        //   dd( $data['player_info'] );
        //dd($player['0']['game_id']);
        $gameType = \App\GameType::where('game_id', $player['0']['game_id'])->get()->toArray();
        $data['game_types'] = $gameType;
        //dd( $data['game_types']);
        return view('adminlte::stats.add_player_points', $data);
    }

    public function postAddStat(Request $request, $id)
    {
        $player = \App\Player::find($id);
        $arrz = [];
        foreach ($request->game_type_id as $key => $val) {
            //   $arrz[]=$key;
            $arrz[$key]['points'] = $val;
        }
        $player->game_types()->sync($arrz);

//            $player->game_types()->sync(
//                array(
//                    '70' => array('points' =>'5'),
//                    '86' => array('points' =>'50'),
//
//
//                )
//            );
        // }
        // dd($arrz);
        //array($key => array('points' =>$val))
//        dd($request->all());
//
//        $gameTypePoints = \App\Player::updateOrCreate(['pla'], []);
//        foreach ($request->game_type_id as $key => $val) {
//            $gameTypePoints->game_type_id = $key;
//            $gameTypePoints->player_id = $id;
//            $gameTypePoints->points = $val;
//            $gameTypePoints->save();
//        }
        // dd($request->all());
        return redirect()->route('showAddStatForm', [
            'player_id' => $id])->with('status', ' Stats Added Successfully.');


    }

}
