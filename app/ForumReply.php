<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumReply extends Model
{
    protected $table = 'forum_post_replies';

    public function forum_post (){
        return $this->belongs('\App\ForumPost');

    }
    public function user(){
        return $this->belongsTo('\App\User');
    }
}
