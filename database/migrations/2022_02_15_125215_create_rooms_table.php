<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('room_type');
            $table->text('room_description');
            $table->text('adults_max');
            $table->string('child_max')->default(0);
            $table->longText('images');
            $table->boolean('smoke')->comment('true is smoke and false is not smoke');
            $table->text('slug');
            $table->unsignedBigInteger('hotel_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('hotel_id')->references('id')->on('hotels')->onUpdate('cascade')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
