<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameTypeStats extends Model
{
    protected $table = 'game_type_stats';
    public $timestamps = false;
    protected $guarded = ['id'];
    public function game()
    {
       return $this->belongsTo('App\Game');
    }
    public function game_type_category()
    {
        return $this->belongsTo('App\GameTypeStatCategory');
    }
    public function player() {
        return $this->belongsToMany('App\Player', 'player_statistics','game_type_stat_id','player_id')->withPivot('stat_points');
    }

}
