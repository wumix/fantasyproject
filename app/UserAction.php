<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAction extends Model {

    protected $table = 'user_action_points';
    protected $fillable = [
        'action_name', 'action_key', 'action_desc', 'action_points', 'created_at', 'updated_at'
    ];

    /**
     * Get points by action key
     * @param type $action_key
     * @return string
     */
    public static function getPointsByKey($action_key) {
        return UserAction::where('action_key', $action_key)->first()->action_points;
    }

}
