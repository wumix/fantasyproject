<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GameTypeStats extends Migration
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
            //$table->integer('game_type');
            $table->enum('stat_form', ['bowling', 'fielding','batting'])->default('batting');


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
