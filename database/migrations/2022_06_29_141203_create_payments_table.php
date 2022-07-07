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
            $table->double('commission',15,2)->default(0);
            $table->boolean('payment_transaction')->default(0);
            $table->integer('month')->comment('month of pay');
            $table->year('year')->comment('year of pay');
            $table->string('description')->default('No notes');
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('admin_id');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('admin_id')->references('id')->on('admins')->onUpdate('cascade')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
