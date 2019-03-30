<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');            
            $table->integer('user_id')->unsigned();
            $table->string('user_first_name');
            $table->string('user_last_name');
            $table->string('user_phone_contact');
            $table->string('user_email_contact');
            $table->integer('total_passenger')->default(0);
            $table->integer('total_cost')->default(0);
            $table->string('payment_method');
            $table->integer('card_number');
            $table->string('name_card');
            $table->string('ccv_code');
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
        Schema::dropIfExists('booking_list');
    }
}
