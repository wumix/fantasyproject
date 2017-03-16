<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
class Tournament extends Model {

    protected $table = 'tournaments';
    protected $fillable = [
        'name', 'game_id', 'venue','max_players', 'start_date', 'end_date', 'created_at', 'updated_at'
    ];

    public function tournament_game() { //tournaments ki games
        return $this->belongsTo('App\Game', 'game_id');
    }
    public function tournament_players() {
        return $this->belongsToMany('App\Player','tournament_players','tournament_id');
    }

    public function setEndDateAttribute($value) {

        $this->attributes['end_date'] = date('Y-m-d h:i:s', strtotime(Input::get('end_date')));
    }

    public function setStartDateAttribute($value) {
        $this->attributes['start_date'] = date('Y-m-d h:i:s', strtotime(Input::get('start_date')));
    }

}
