<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerRole extends Model
{
    protected $table = 'players';
    protected $fillable = [
        'game_role_id', 'player_id', 'created_at', 'updated_at'
    ];

   

}
