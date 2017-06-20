<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserChallenge extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_challenge', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tournament_id');
            $table->foreign('tournament_id')->references('id')->on('tournaments');
            $table->integer('user_1_id');
            $table->foreign('user_1_id')->references('id')->on('users');
            $table->integer('user_2_id');
            $table->foreign('user_2_id')->references('id')->on('users');
            $table->boolean('is_accepted');
            $table->integer('status')->comment('0 for progress 1 for won 2 for lost');
            $table->string("rewards");

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
