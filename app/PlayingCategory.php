<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayingCategory extends Model
{

    protected $table = 'playing_category';
    public $timestamps = false;
    protected $guarded = [];
    public function Player_fromat()
    {
        return $this->belongsToMany('\App\Type','player_stats_details',
            'format_id','type_id');
    }
}
