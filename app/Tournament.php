<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

class Tournament extends Model {

    protected $table = 'tournaments';
    protected $fillable = [
        'name', 'game_id','tournament_price', 'venue', 'max_players', 'start_date', 'end_date', 'created_at', 'updated_at'
    ];
    public static function getMaxPlayers($tournament_id){
        return Tournament::find($tournament_id)->first()->max_players;
    }
    public static function getStartdate($tournament_id){
        return Tournament::find($tournament_id)->first()->start_date;
    }
    public function tournament_game() { //tournaments ki games
        return $this->belongsTo('App\Game', 'game_id');
    }

    public function tournament_players() {
        return $this->belongsToMany('App\Player', 'player_tournaments', 'tournament_id')
                        ->withPivot('player_price');
    }

    public function game_term_points() {
        return $this->hasMany('App\TournamentGameTermPoint', 'tournament_id');
    }

    public function setEndDateAttribute($value) {
        $this->attributes['end_date'] = date('Y-m-d h:i:s', strtotime(Input::get('end_date')));
    }

    public function setStartDateAttribute($value) {
        $this->attributes['start_date'] = date('Y-m-d h:i:s', strtotime(Input::get('start_date')));
    }
    public function tournament_matches() {
        return $this->hasMany('App\Match', 'tournament_id');
    }
    public function tournament_role_limit() {
        return $this->belongsToMany('App\Player','tournament_role_imit','tournament_id','player_role_id')->withPivot('max_limit');;
    }
    public function tournament_role_max() {
        return $this->belongsToMany('App\GameRole','tournament_role_imit','tournament_id','player_role_id')->withPivot('max_limit');;
    }

}
