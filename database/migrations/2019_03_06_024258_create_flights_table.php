<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('flight_class_id')->unsigned();
            $table->integer('flight_type')->unsigned();
            $table->string('flight_code');
            $table->integer('flight_airplane_id')->unsigned();
            $table->integer('flight_total_passenger')->default(0);
            $table->integer('flight_cost')->default(0);
            $table->integer('flight_airport_from_id')->unsigned();
            $table->integer('flight_airport_to_id')->unsigned();
            $table->date('flight_departure_date')->nullable();
            $table->date('flight_return_date')->nullable();
            $table->datetime('flight_departure_time');
            $table->datetime('flight_arrival_time');
            $table->time('duration')->nullable();
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
        Schema::dropIfExists('flights');
    }
}
