<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {

    protected $table = 'games';
    protected $fillable = [
        'name', 'is_active', 'created_at', 'updated_at'
    ];

    public function game_players() {
        return $this->hasMany('App\Player');
    }

    public function game_roles() {
        return $this->hasMany('App\GameRole');
    }

    public function game_terms() {
        return $this->hasMany('App\GameTerm');
    }

    public function game_tournaments() {
        return $this->hasMany('App\Tournament', 'id');
    }

}
