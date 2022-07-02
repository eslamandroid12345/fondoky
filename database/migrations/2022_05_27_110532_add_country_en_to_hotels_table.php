<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryEnToHotelsTable extends Migration
{

    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {

            $table->string('country_en')->after('country');
        });
    }


    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {

            $table->dropColumn('country_en');

        });
    }
}
