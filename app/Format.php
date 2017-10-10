<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    protected $table = 'formats';
    public $timestamps = false;
    protected $guarded = [];
    public function playing_types()
    {
        return $this->belongsToMany('\App\Format','player_stats_details',
            'format_id','format_id');
    }

}
