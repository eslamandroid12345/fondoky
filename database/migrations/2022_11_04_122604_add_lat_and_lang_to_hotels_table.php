<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLatAndLangToHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hotels', function (Blueprint $table) {

            $table->string('lat')->after('slug')->nullable();
            $table->string('lang')->nullable();
            $table->string('commercial_register')->comment('رقم السجل التجاري');
            $table->text('picture_tax')->nullable()->comment('صوره البطاقه الضريبيه');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hotels', function (Blueprint $table) {
            //
        });
    }
}
