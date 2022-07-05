<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmailPasswordToSupervisorsTable extends Migration
{

    public function up()
    {
        Schema::table('supervisors', function (Blueprint $table) {

            $table->string('email')->unique()->after('name');
            $table->string('password')->after('email');

        });
    }


    public function down()
    {
        Schema::table('supervisors', function (Blueprint $table) {

            $table->dropColumn('email');
            $table->dropColumn('password');
        });
    }
}
