<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Comments\Traits\Comments; //for gettings commentss


class BlogPost extends Model {


    use Sluggable;

    protected $table = 'blog_posts';
    protected $fillable = [
        'title', 'slug','description','post_type','content','image'
    ];
    function post_category(){
        return $this->belongsToMany('\App\BlogPost','blog_category_post','post_id','category_id');
  }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
