<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForumPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable()->default(null);
            $table->foreign('category_id')->references('id')->on('forum_categories')->onUpdate('cascade')->onDelete('set null');
            $table->string('title');
            $table->longText('description');
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
