<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlayerTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_team_players', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('player_id')->unsigned();
         $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');;
         $table->integer('team_id')->unsigned();
         $table->foreign('team_id')->references('id')->on('user_teams')->onDelete('cascade');;
         $table->timestamps();
         $table->softDeletes();
        
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_teams');
    }
}
