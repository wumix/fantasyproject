<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserChallenge extends Model
{
    //
    protected $table = 'user_challenge';
<<<<<<< HEAD
=======
    public $timestamps = false;
    protected $guarded = [];



    function user()
    {
        return $this->belongsTo('\App\User','user_1_id');
    }
>>>>>>> develop
}
