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
        $this->belongsTo('App\Game');
    }

}
