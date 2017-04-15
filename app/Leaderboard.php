<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    //
    public function player() {
        return $this->belongsTo('App\User');
    }
    protected $table = 'leaderboard';
    protected $fillable = [
        'user_id', 'team_id', 'score'
    ];
    public function user_team() {
        return $this->belongsTo('App\UserTeam','team_id');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
}
