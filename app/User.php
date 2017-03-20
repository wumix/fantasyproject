<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name', 'email','profile_pic', 'password', 'user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Type casting of db columns
     * @var type 
     */
    protected $casts = [
        'user_type' => 'int',
    ];

    /**
     * Check if this is an admin
     * @return type
     */
    public static function isAdmin() {
        return (\Auth::user()->user_type == 0) ? true : false;
    }
    public static function isUser() {
        return (\Auth::user()->user_type == 1) ? true : false;
    }

}
