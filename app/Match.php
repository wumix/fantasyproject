<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model {

    //
    protected $table = 'matches';
    protected $guarded = [];
//    protected $fillable = [
//        'name','result', 'team_one', 'venue', 'tournament_id', 'team_two', 'start_date', 'end_date', 'created_at', 'updated_at'
//    ];

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

        $serverTime = config('app.timezone');
        $timeZoneDiff = config('app.timezone_difference');
        $dtz = new \DateTimeZone($serverTime);
        $time_in_server = new \DateTime('now', $dtz);
        $time_in_server = $time_in_server->add(date_interval_create_from_date_string("-300 minutes"));
        $gmtDifference = $time_in_server->format('Y-m-d H:i:s');


        $nextMatch = \App\Match::where('start_date', '>', "$gmtDifference");
        if (!empty($tournament_id)) {
            $nextMatch = $nextMatch->where('tournament_id', $tournament_id);
        }
        $nextMatch = $nextMatch->first();
        return $nextMatch;
    }

//    public function getStartDateAttribute($startDate) {
//        return date('Y-m-d h:i:s', strtotime($startDate));
//    }
}
