<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{

    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('booker_id');
            $table->unsignedBigInteger('hotel_id');
            $table->double('total',15,2)->default(0);
            $table->double('commission',15,2)->default(0);
            $table->boolean('blocked')->default(1)->comment('0 is refuse 1 is accept');
            $table->boolean('canceled')->default(1)->comment('0 is cancel 1 is accept');
            $table->timestamps();

            $table->foreign('booker_id')->references('id')->on('bookers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
