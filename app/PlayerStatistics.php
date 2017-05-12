<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerStatistics extends Model
{
    protected $table = 'player_statistics';
    public $timestamps = false;
    protected $guarded = ['id'];
    public function player() {
        return $this->belongsToMany('App\Player', 'player_statistics','game_type_stat_id','player_id')->withPivot('stat_points');
    }
}
