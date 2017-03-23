<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTeam extends Model
{
    protected $table = 'user_teams';
    protected $fillable = [
        'name', 'tournament_id', 'user_id'
    ];

    function user_team_player()
    {
        return $this->belongsToMany('App\Player', 'user_team_players','team_id');
    }

}
