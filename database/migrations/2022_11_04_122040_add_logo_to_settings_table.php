<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogoToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {

            $table->text('logo')->after('name_en')->nullable();
            $table->double('vat_tax',15,2)->comment('ضريبه القيمه المضافه')->default(0);
            $table->double('tourism_tax',15,2)->comment('ضريبه السياحه')->default(0);
            $table->double('municipal_tax',15,2)->comment('ضريبه البلديه')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
}
