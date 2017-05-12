<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameTypePoints extends Model
{
    protected $guarded = ['id'];
    public function game(){
        $this->belongsTo('App\Game');
    }
}
