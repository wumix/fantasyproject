<?php

namespace App\Forum;

use Illuminate\Database\Eloquent\Model;

class ForumCategory extends Model
{
    protected $table = 'forum_categories';
    // public $timestamps = false;
    protected $guarded = [];

    public function parent()
    {
       return $this->belongsTo('App\Forum\ForumCategory', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Forum\ForumCategory', 'parent_id');
    }

//    public function pets()
//    {
//        return $this->hasMany('\App\Pets');
//    }

//    public function posts(){
//        return $this->hasMany('App\Forum\ForumPost', 'parent_id');
//    }
    public function getImageAttribute($val)
    {
        return \URL::to('storage/' . $val);
    }

    public function getNameAttribute($value)
    {
        return ucfirst(strtolower($value));
    }
}
