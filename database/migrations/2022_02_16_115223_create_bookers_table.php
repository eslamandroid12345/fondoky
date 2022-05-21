<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookersTable extends Migration
{

    public function up()
    {
        Schema::create('bookers', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('city_to');
            $table->string('children')->default(0);
            $table->string('adults');
            $table->string('room_type');
            $table->string('room_number');
            $table->double('room_price',15,2)->default(0);
            $table->text('date_arrive');
            $table->text('date_leave');
            $table->double('vat_tax',15,2)->default(0);
            $table->double('municipal_tax',15,2)->default(0);
            $table->double('tourism_tax',15,2)->default(0);
            $table->double('total_all',15,2)->default(0);
            $table->double('total',15,2)->default(0);//
            $table->double('commission',15,2)->default(0);//
            $table->string('num_of_nights');
            $table->boolean('stayed')->default(1)->comment('0 is check out 0 check in');
            $table->string('rate')->default('5%');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('hotel_id');
            $table->timestamps();
            $table->softDeletes();
            $table->boolean('blocked')->default(1)->comment('0 is refuse 1 is accept');
            $table->boolean('canceled')->default(1)->comment('0 is cancel 1 is accept');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('bookers');
    }
}
