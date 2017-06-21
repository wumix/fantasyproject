<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GameTypeStat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_type_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->integer('game_type_stat_category_id');
            $table->foreign('game_type_stat_category_id')->references('id')->on('game_type_stat_category');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_type_stats');
    }
}
