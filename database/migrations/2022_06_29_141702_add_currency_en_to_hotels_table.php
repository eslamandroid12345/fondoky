<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCurrencyEnToHotelsTable extends Migration
{

    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {

            $table->string('currency_en')->after('pound')->default('AUR');
        });
    }


    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {

            $table->dropColumn('currency_en');
        });
    }
}
