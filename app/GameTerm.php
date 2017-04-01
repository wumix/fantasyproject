<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameTerm extends Model {

    protected $table = 'game_terms';
    protected $fillable = [
        'name', 'game_id'
    ];

    public function game() {
        return $this->belongsToMany('App\Game');
    }

}
