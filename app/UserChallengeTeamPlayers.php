<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChallengeTeamPlayers extends Model
{
    protected $table = 'user_challenge_team';

    public $timestamps = false;
    protected $guarded = [];
}
