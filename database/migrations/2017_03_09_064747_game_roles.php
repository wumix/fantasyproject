<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GameRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //games roles are roles with a gmae e.g a wicket keeper 
         Schema::create('game_roles', function (Blueprint $table) {
         $table->increments('id');      
         $table->integer('game_id')->unsigned();
         $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
         $table->string('name', 100);
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
       Schema::dropIfExists('game_roles');
    }
}
