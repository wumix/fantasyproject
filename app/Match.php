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
        return $this->hasMany(MatchPlayerScore::class);
    }

    public function match_players() {
        return $this->belongsToMany('App\Player', 'player_matches', 'match_id', 'player_id');
    }

    public static function getNextMatch($tournament_id = NULL) {

        $nextMatch = \App\Match::where('start_date', '>', date('Y-m-d h:i:s'));
        if (!empty($tournament_id)) {
            $nextMatch = $nextMatch->where('tournament_id', $tournament_id);
        }
        $nextMatch = $nextMatch->get();

        if (!$nextMatch->isEmpty()) {
            return $nextMatch = $nextMatch->toArray()[0];
        }
        return [];
    }

    public function getStartDateAttribute($startDate) {
        return date('Y-m-d h:i:s', strtotime($startDate));
    }

}
