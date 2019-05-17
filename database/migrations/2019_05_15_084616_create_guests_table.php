<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->integer('booking_id');
            $table->tinyInteger('is_leader');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
        });

//        Schema::table('guests', function ($table) {
//             $table->foreign('booking_id')->references('id')->on('bookings');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('guests');
    }
}
