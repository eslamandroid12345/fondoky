<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{

    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('comment');
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
