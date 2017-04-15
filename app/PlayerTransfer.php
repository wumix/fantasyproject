<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerTransfer extends Model
{
    //
    protected $table = 'player_transfer';
    protected $fillable = [
        'player_in_id', 'player_out_id', 'team_id', 'transfer_date'
    ];

    public function player() {
        return $this->belongsTo('App\Player');

    }
}
