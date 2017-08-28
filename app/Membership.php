<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'memberships';
    protected $guarded=[];

    public function user(){
        return $this->belongsToMany('App\User', 'user_memberships',
            'membership_id','user_id');

    }


}
