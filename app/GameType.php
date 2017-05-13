<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameType extends Model //table Name is game format
{
    //
    protected $table = 'game_type';
    public $timestamps = false;
    protected $guarded = ['id'];
    public function game(){
        $this->belongsTo('App\Game');
    }
    public function game_type_points(){
        return $this->belongsToMany('App\Player','game_type_points','game_type_id','player_id')->withPivot('points');
    }
    public function game_type_stats_category(){ //batting bowling fielding etc
        return $this->hasMany('\App\GameTypeStatCategory','game_type_id','id');
    }

}
