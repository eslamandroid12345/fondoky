<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{

    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {


            $table->bigIncrements('id');
            $table->string('name');
            $table->text('image');
            $table->string('address');
            $table->string('national_id');
            $table->string('job_description');
            $table->string('phone');
            $table->double('salary',15,2);
            $table->string('notes')->default('no notes');
            $table->time('works_from');
            $table->time('works_to');
            $table->integer('rate')->default(0);
            $table->string('created_by');
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('department_id');
            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
