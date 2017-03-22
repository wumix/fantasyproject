<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAction extends Model
{
    protected $table = 'user_action_points';
    protected $fillable = [
        'action_name', 'action_key','action_desc', 'action_points', 'created_at','updated_at'
    ];
}
