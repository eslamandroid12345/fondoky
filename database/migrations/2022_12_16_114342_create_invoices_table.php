<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('invoice_number');
            $table->string('from');
            $table->string('to');
            $table->date('date_of_start');
            $table->date('date_of_end');
            $table->double('amount',15,2);
            $table->string('description')->default('Total Amount to paid for myHotel');
            $table->bigInteger('bank_account')->default(5745673456347);
            $table->string('month');
            $table->string('year');
            $table->enum('status', array('paid','not_paid'))->default('not_paid')->comment('حاله الفاتوره مدفوعه او غير مدفوعه');
            $table->unsignedBigInteger('hotel_id');
            $table->foreign('hotel_id')->references('id')->on('hotels')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
