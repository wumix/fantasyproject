<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumCommentsReply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_comment_replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_id')->unsigned()->nullable()->default(null);
            $table->foreign('comment_id')->references('id')->on('forum_posts')->onUpdate('cascade')->onDelete('set null');
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
