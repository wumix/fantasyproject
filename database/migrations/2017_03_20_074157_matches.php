<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class matches extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 100);
            $table->string('team_one', 100);
            $table->string('team_two', 100);
            $table->integer('tournament_id')->unsigned();
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->string('venue', 100);
            $table->dateTime('start_date')->comment('GMT standard time');
            $table->dateTime('end_date')->comment('GMT standard time');
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
        Schema::dropIfExists('matches');
    }

}
