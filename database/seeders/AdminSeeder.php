<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{

    public function run()
    {

        Admin::factory(10000)->create();
    }
}
