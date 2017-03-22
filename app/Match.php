<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model {

    //
    protected $table = 'matches';
    protected $fillable = [
        'name', 'team_one', 'venue', 'tournament_id', 'team_two', 'start_date', 'end_date', 'created_at', 'updated_at'
    ];

    public function match_tournament() {
        return $this->belongsTo('App\Tournament', 'tournament_id');
    }

    public function player_scores() {
        return $this->hasMany('App\MatchPlayerScore');
    }

}
