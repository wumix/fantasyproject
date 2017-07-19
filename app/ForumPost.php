<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    protected $table = 'forum_posts';
    public function replies()
    {
        return $this->hasMany('\App\ForumReply','post_id','id');
    }

}
