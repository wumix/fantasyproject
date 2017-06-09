<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChallenge extends Model
{
    //
    protected $table = 'user_challenge';
    public $timestamps = false;
    protected $guarded = [];
    function user(){
        return $this->belongsTo('\App\User');
    }
}
