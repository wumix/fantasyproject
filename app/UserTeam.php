<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTeam extends Model {

    protected $table = 'user_teams';
    protected $fillable = [
        'name', 'tournament_id', 'user_id', 'joined_from_match_date'
    ];

    function user_team_player() {
        return $this->belongsToMany('App\Player', 'user_team_players', 'team_id');
    }
//    function user_team_player_transfers() {
//        return $this->belongsToMany('App\Player', 'player_transfer','team_id','player_in_id')
//            ->withPivot('player_out_score','player_in_score');
//    }
    function user_team_player_transfers() {
        return $this->belongsToMany('App\Player', 'player_transfer','team_id','player_out_id')
            ->withPivot('player_out_score','player_in_score','player_in_id');
    }

    function teamtournament() {
        return $this->belongsTo('App\Tournament', 'tournament_id');
    }
    public function user_leaderboard(){

        return $this->hasMany('App\LeaderBoard', 'team_id', 'id');
    }

}
