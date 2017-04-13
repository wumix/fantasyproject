<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlayerTransfer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_transfer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_in_id')->unsigned();
            $table->foreign('player_in_id')->references('id')->on('players')->onDelete('cascade');
            $table->integer('player_out_id')->unsigned();
            $table->foreign('player_out_id')->references('id')->on('players')->onDelete('cascade');
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('user_teams')->onDelete('cascade');
            $table->timestamp('transfer_date')->nullable();
            $table->double('	player_out_score');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
