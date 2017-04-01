<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TournamentRolesLimit extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tournament_role_limit', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tournament_id')->unsigned();
            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->integer('player_role_id')->unsigned();
            $table->foreign('player_role_id')->references('id')->on('player_roles')->onDelete('cascade');
            $table->integer('max_limit')->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('user_action_points');
    }

}
