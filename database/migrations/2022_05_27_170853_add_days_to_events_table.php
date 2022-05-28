<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDaysToEventsTable extends Migration
{

    public function up()
    {
        Schema::table('events', function (Blueprint $table) {

            $table->string("days")->default(0);
        });
    }


    public function down()
    {
        Schema::table('events', function (Blueprint $table) {

            $table->dropColumn("events");
        });
    }
}
