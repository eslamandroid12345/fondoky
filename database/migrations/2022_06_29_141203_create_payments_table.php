<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{

    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->boolean('payment_transaction')->default(0);
            $table->integer('month')->comment('month of pay');
            $table->string('year')->comment('year of pay');
            $table->string('description')->default('No notes');
            $table->string('created_by');
            $table->unsignedBigInteger('hotel_id');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
