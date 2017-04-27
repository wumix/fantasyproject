<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'user_id', 'content_id','content_type','comment','created_at','updated_at'
    ];
    public function user() {
        return $this->belongsTo('App\User');

    }
}
