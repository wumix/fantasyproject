<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameRole extends Model {

    protected $table = 'game_roles';
    protected $fillable = [
        'name', 'game_id'
    ];

    public function game() {
        return $this->belongsTo('App\Game');
    }

    public function players() {
        return $this->belongsToMany('App\Player', 'player_roles');
    }

}
