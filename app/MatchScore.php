<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchScore extends Model
{
    protected $table = 'match_scores';
    protected $guarded = [];
    public $timestamps = false;
}
