<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{

    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('destination');
            $table->string('children')->default(0);
            $table->string('adults');
            $table->date('check_in');
            $table->date('check_out');
            $table->integer('num_of_nights');
            $table->integer('room_number');
            $table->string('rate')->default('5%');
            $table->double('vat_tax',15,2)->default(0);
            $table->double('municipal_tax',15,2)->default(0);
            $table->double('tourism_tax',15,2)->default(0);
            $table->double('total_all',15,2)->default(0);
            $table->double('total',15,2)->default(0);//
            $table->double('commission',15,2)->default(0);//
            $table->boolean('stayed')->default(1)->comment('0 is check out 1 check in');
            $table->boolean('status')->default(1)->comment('0 is refuse 1 is accept');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('hotel_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');


        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
