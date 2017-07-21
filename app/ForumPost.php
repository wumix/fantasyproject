<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    public $timestamps = false;
    protected $table = 'forum_posts';
    public function replies()
    {
        return $this->hasMany('\App\ForumReply','post_id','id');
    }
    public function category(){
        return $this->belongsTo('\App\ForumCategory');
    }
    public function user(){
        return $this->belongsTo('\App\User');
    }


}
