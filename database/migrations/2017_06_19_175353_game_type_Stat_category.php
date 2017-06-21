<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GameTypeStatCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_type_stat_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->integer('game_type_id');
            $table->foreign('game_type_id')->references('id')->on('game_type');



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
