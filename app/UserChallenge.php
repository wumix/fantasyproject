<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChallenge extends Model
{
    //
    protected $table = 'user_challenge';

    public $timestamps = false;
    protected $guarded = [];


    function user()
    {
        return $this->belongsTo('\App\User', 'user_1_id', 'id');
    }
    function user_by()
    {
        return $this->belongsTo('\App\User', 'user_2_id', 'id');
    }

    function challenge_players()
    {
        return $this->belongsToMany('\App\Player','user_challenge_team', 'challenge_id', 'player_id')
            ->withPivot('user_id');
    }
    function match(){
        return $this->belongsTo('\App\Match','id');
    }


}
