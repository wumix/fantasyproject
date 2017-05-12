<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameType extends Model
{
    //
    protected $table = 'game_type';
    protected $guarded = ['id'];
    public function game(){
        $this->belongsTo('App\Game');
    }
    public function game_type_points(){
        return $this->belongsToMany('App\Player','game_type_points','game_type_id','player_id')->withPivot('points');
    }

}
