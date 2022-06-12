<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarsTable extends Migration
{

    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('room_id');
            $table->string('room_number');
            $table->date('check_in');
            $table->date('check_out');
            $table->double('room_price',15,2)->default(0);
            $table->string('days');
            $table->timestamps();

            $table->foreign('room_id')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('calendars');
    }
}
