<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterGameTermsWithActions extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('game_terms', function (Blueprint $table) {
            $table->integer('game_action_id')->unsigned()->after('game_id');
            $table->foreign('game_action_id')->references('id')->on('game_actions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('game_terms', function(Blueprint $table) {
            $table->dropForeign('game_action_id');
        });
    }

}
