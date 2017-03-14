<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'players';
    protected $fillable = [
        'name', 'game_id', 'created_at', 'updated_at'
    ];

    public function game_roles() {
        return $this->hasMany('App\PlayerRole');
    }

}
