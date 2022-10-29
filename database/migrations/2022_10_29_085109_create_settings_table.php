<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('about_ar')->nullable();
            $table->text('about_en')->nullable();
            $table->text('privacy_ar')->nullable();
            $table->text('privacy_en')->nullable();
            $table->string('location_ar');
            $table->string('location_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
