<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Players extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('players', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name', 100);
         $table->string('profile_pic', 255);
         $table->integer('game_id')->unsigned();
         $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');
         
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
        Schema::dropIfExists('players');
    }
}
