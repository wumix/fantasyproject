<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('provider_user_id')->nullable()->comment = "If user is from social media then his social media id";
            $table->string('provider')->nullable()->comment = "If user is from social media then his social media name";

            $table->string('name');
            $table->string('profile_pic')->nullable();
            $table->string('email')->unique();
            $table->enum('user_type', [0, 1])->default(1)->comment = "0 for admin 1 normal user";
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->string('referral_key')->unique()->nullable();
            $table->enum('is_active', [0, 1])->default(1);

            $table->rememberToken();
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
        Schema::dropIfExists('user');
    }

}
