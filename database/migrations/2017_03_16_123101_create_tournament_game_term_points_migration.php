<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentGameTermPointsMigration extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tournament_game_term_points', function (Blueprint $table) {
            $table->increments('id');
            $table->double('points')->default('0.00');

            $table->integer('tournament_id')->unsigned();
            $table->foreign('tournament_id')
                    ->references('id')
                    ->on('tournaments')
                    ->onDelete('cascade');

            $table->integer('game_term_id')->unsigned();
            $table->foreign('game_term_id')
                    ->references('id')
                    ->on('game_terms')
                    ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tournament_game_term_points');
    }

}
