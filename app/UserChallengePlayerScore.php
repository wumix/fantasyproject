<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChallengePlayerScore extends Model
{
    protected $table = 'user_challenge_player_score';

    public $timestamps = false;
    protected $guarded = [];
}
