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
        $arrz=[];
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
