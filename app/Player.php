<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model {

    protected $table = 'players';
    protected $fillable = [
        'name', 'game_id', 'created_at', 'updated_at'
    ];

    public function player_games() {
        return $this->belongsTo('App\Game', 'game_id');
    }

    public function player_roles() {
        return $this->belongsToMany('App\GameRole', 'player_roles', 'player_id');
    }

}
