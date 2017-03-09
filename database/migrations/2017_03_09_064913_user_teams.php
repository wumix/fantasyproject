<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_teams', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name', 100);
         $table->integer('tournament_id')->unsigned();
         $table->foreign('tournament_id')->references('id')->on('tournaments');
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
        Schema::dropIfExists('user_teams');
    }
}
