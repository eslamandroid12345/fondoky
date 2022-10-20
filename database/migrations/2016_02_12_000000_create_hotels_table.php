<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{

    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('manger');
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('location_ar');
            $table->text('location_en');
            $table->text('currency_ar');
            $table->string('currency_en');
            $table->longText('description');
            $table->longText('hotel_photos');
            $table->text('phone_hotel');
            $table->text('slug');
            $table->boolean('blocked')->default(1)->comment('0 is expire and 1 is active');
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
