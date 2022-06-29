<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelServiceRoomsTable extends Migration
{

    public function up()
    {
        Schema::create('hotel_service_rooms', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('room_service_id');
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('room_service_id')->references('id')->on('room_services')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('hotel_service_rooms');
    }
}
