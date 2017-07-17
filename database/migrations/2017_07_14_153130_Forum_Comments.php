<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_post_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->unsigned()->nullable()->default(null);
            $table->foreign('post_id')->references('id')->on('forum_posts')->onUpdate('cascade')->onDelete('set null');
            $table->longText('text');
            $table->string('slug')->unique();
            $table->string('image', 255)->nullable;
            $table->timestamps();
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
