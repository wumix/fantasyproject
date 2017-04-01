<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameAction extends Model {

    protected $table = 'game_actions';

    public function game_terms() {
        return $this->hasMany('App\GameTerm');
    }

    public function game() {
        return $this->belongsTo('App\Game', 'game_id');
    }

}
