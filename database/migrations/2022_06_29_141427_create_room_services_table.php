<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomServicesTable extends Migration
{
    public function up()
    {
        Schema::create('room_services', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('hotel_id');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('room_services');
    }
}
