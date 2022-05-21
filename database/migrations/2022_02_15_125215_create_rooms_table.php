<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{

    public function up()
    {


        Schema::create('rooms', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('room_type_id');
            $table->text('room_description');
            $table->text('adults_max');
            $table->string('child_max')->default(0);
            $table->longText('images');
            $table->unsignedBigInteger('hotel_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('room_type_id')->references('id')->on('room_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }



    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
