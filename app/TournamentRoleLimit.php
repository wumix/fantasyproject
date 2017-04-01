<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentRoleLimit extends Model {

    //
    protected $table = 'tournament_role_limit';
    protected $fillable = [
        'tournament_id', 'player_role_id ', 'max_limit'
    ];

    public function tournaments() {
        return $this->belongsToMany('App\Player', 'tournament_role_limit', 'tournament_id', 'player_role_id');
    }

}
