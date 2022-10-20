<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{

    public function up()
    {
        Schema::create('services', function (Blueprint $table) {


            $table->bigIncrements('id');
            $table->string('name');
            $table->json('services');
            $table->unsignedBigInteger('hotel_id');
            $table->timestamps();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('services');
    }
}
