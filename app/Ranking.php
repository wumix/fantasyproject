<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ranking extends Model {

    protected $table = 'rankings';
    public $timestamps = false;

    public function ranking_category() {
        return $this->hasOne('App\RankingCategory', 'ranking_category_id');
    }

    public function country() {
        return $this->belongsTo('App\Country');
    }

}
