<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerStatDetail extends Model
{
    protected $table = 'player_stats_details';
    public $timestamps = false;
    protected $guarded = [];
    public function player_stats()
    {
        return $this->belongsToMany('App\Format', 'player_stats_details', 'type_id', 'player_id');
    }

}
