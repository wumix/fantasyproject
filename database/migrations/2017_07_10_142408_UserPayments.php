<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('user_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paypal_payment_id');
            $table->string("intent");
            $table->string("amount");
            $table->string("merchant_id");
            $table->string("currency");
            $table->string("description");
            $table->string("email");
            $table->integer("user_id");
            $table->dateTime('transaction_date');

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
