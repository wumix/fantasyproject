<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    protected $table = 'user_payments';
    public $timestamps = false;
    protected $guarded = [];

}
