<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameTypeStatCategory extends Model
{
    protected $table = 'game_type_stat_category';
    public $timestamps = false;
    protected $guarded = ['id'];

    function game_type_stat_category()
    {
        return $this->belongsTo('App\GameType');


    }
    public function game_type_stats(){ //matches innings wickets etc
        return $this->hasMany('\App\GameTypeStats','game_type_stat_category_id','id');
    }

}
