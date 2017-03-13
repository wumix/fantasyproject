<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {

    protected $table = 'games';
    protected $fillable = [
        'name', 'is_active', 'created_at', 'updated_at'
    ];

    public function game_roles() {
        return $this->hasMany('App\GameRole');
    }

}
