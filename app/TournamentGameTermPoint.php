<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TournamentGameTermPoint extends Model {

    protected $table = 'tournament_game_term_points';

    public function tournaments() {
        return $this->belongsTo('App\Tournament');
    }

}
