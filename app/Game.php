<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {

    protected $table = 'games';
    protected $fillable = [
        'name', 'is_active', 'created_at', 'updated_at'
    ];
    

}
