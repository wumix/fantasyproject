<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlayerRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('player_roles', function (Blueprint $table) {
         $table->increments('id');       
         $table->integer('game_role_id')->unsigned();
         $table->foreign('game_role_id')->references('id')->on('game_roles');
         $table->integer('player_id')->unsigned();
         $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');;
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
        Schema::dropIfExists('player_roles');
    }
}
