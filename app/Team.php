<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';
    protected $fillable = [
        'name', 'tournament_id'
    ];
    public function team_players() {
        return $this->belongsToMany('App\Player', 'player_team','team_id','player_id');
    }

}
