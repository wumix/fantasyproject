<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserActionPoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_action_points', function (Blueprint $table) {
            $table->increments('id');
            $table->string('action_name', 50)->unique();;
            $table->string('action_key', 50)->unique();;
            $table->string('action_desc', 255);
            $table->integer('action_points')->unsigned();
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
