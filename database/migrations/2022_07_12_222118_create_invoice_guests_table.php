<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_guests', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('rate')->default('5%');
            $table->double('vat_tax',15,2)->default(0);
            $table->double('municipal_tax',15,2)->default(0);
            $table->double('tourism_tax',15,2)->default(0);
            $table->double('total_all',15,2)->default(0);
            $table->double('total',15,2)->default(0);//
            $table->double('commission',15,2)->default(0);//
            $table->boolean('stayed')->default(1)->comment('0 is check out 1 check in');
            $table->boolean('blocked')->default(1)->comment('0 is refuse 1 is accept');
            $table->boolean('canceled')->default(1)->comment('0 is cancel 1 is accept');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('reservation_id');
            $table->unsignedBigInteger('reserved_room_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('reserved_room_id')->references('id')->on('reserved_rooms')->onUpdate('cascade')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_guests');
    }
}
