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
    public function membership_details()
    {
        return $this->hasMany('\App\MembershipDetail','package_id','id');
    }

}
