<?php

namespace Database\Seeders;

use App\Models\Booker;
use Illuminate\Database\Seeder;

class BookerSeeder extends Seeder
{

    public function run()
    {

        Booker::factory(100)->create();
    }
}
