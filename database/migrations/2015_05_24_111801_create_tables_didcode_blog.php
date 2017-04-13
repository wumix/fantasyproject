<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablesDidcodeBlog extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::create('didcode_blog_categories', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('slug');
            $table->integer('posts_num')->default(0);

            $table->timestamps();
        });

        Schema::create('didcode_blog_options', function(Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('value');

            $table->timestamps();
        });

		Schema::create('didcode_blog_posts', function(Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('slug');

            $table->string('image');

            $table->text('chapo');
            $table->text('content');

            $table->integer('category_id');

            $table->enum('post_status', ['draft', 'published']);

            $table->dateTime('published_at')->nullable();
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
		Schema::drop('didcode_blog_posts');
		Schema::drop('didcode_blog_options');
		Schema::drop('didcode_blog_categories');
	}

}
