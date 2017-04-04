<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class GameTerm extends Model {

    protected $table = 'game_terms';
    protected $fillable = [
        'name', 'game_id', 'game_action_id'
    ];

    public function game() {
        return $this->belongsToMany('App\Game');
    }

    public function game_actions() {
        return $this->belongsTo('App\GameAction', 'game_action_id');
    }
    function game_term_tournament_points(){
  return $this->belongsToMany('App\Tournament','tournament_game_term_points','game_term_id')->withpivot('points','qty_to','qty_from');
    }


}
