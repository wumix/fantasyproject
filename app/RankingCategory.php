<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RankingCategory extends Model {

    protected $table = 'ranking_category';
    public $timestamps = false;
    function category_players(){
        return $this->hasMany('App\Ranking');
    }


}
