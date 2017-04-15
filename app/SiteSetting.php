<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model {

    public $timestamps = false;
    protected $table = 'site_settings';
    protected $fillable = ['meta_key', 'meta_value'];

}
