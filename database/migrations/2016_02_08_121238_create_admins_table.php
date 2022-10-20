<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{

    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->longText('image');
            $table->string('phone');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
