<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model {

    protected $table = 'tournaments';
    protected $fillable = [
        'name', 'game_id','venue','start_date','end_date', 'created_at', 'updated_at'
    ];

    public function tournament_game() { //tournaments ki games
        return $this->belongsTo('App\Game','game_id');
        
    }

}
