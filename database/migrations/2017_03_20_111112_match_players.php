<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MatchPlayers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_player_scores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('player_id')->unsigned();
            $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            $table->integer('match_id')->unsigned();
            $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
            $table->integer('game_term_id')->unsigned();
            $table->foreign('game_term_id')->references('id')->on('game_terms')->onDelete('cascade');
            $table->string("player_term_count")->comment = "tells about not of players terms i.e no of catches no of wickets";
            $table->timestamps();
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
