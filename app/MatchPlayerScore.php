<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchPlayerScore extends Model {

    protected $table = 'match_player_scores';
    protected $guarded = [];
    public $timestamps = false;

    public function game_terms() {
        return $this->belongsTo(GameTerm::class, 'game_term_id');
    }

    public function matches() {
        return $this->belongsTo(Match::class, 'match_id');
    }

    public function points_devision_tournament() {
        return $this->hasMany(TournamentGameTermPoint::class, 'game_term_id', 'game_term_id');
    }

}
