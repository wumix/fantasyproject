<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tournaments extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);

            $table->integer('game_id')->unsigned();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');

            $table->dateTime('start_date')->comment('GMT standard time')->default('0000-00-00 00:00:00');
            $table->dateTime('end_date')->comment('GMT standard time')->default('0000-00-00 00:00:00');

            $table->integer('max_players')->unsigned();

            $table->string('venue', 100)->nullable();

            $table->string('t_logo', 100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tournaments');
    }

}
