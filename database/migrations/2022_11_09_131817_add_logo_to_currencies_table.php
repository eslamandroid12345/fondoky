<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogoToCurrenciesTable extends Migration
{

    public function up()
    {
        Schema::table('currencies', function (Blueprint $table) {

            $table->text('logo')->nullable()->after('id');
        });
    }


    public function down()
    {
        Schema::table('currencies', function (Blueprint $table) {

            $table->dropColumn('logo');
        });
    }
}
