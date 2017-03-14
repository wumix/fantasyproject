<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model {

    protected $table = 'tournaments';
    protected $fillable = [
        'name', 'game_id', 't_logo', 'created_at', 'updated_at'
    ];

    public function tournament_game() {
        return $this->belongsTo('App\Game');
    }

}
