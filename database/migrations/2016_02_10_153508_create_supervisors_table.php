<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorsTable extends Migration
{

    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
            $table->string('address');
            $table->longText('image');
            $table->string('phone');
            $table->integer('num_of_branches');
            $table->boolean('status')->default(true);
            $table->unsignedBigInteger('admin_id');
            $table->timestamps();

            $table->foreign('admin_id')->references('id')->on('admins')->onUpdate('cascade')->onDelete('cascade');


        });
    }


    public function down()
    {
        Schema::dropIfExists('supervisors');
    }
}
