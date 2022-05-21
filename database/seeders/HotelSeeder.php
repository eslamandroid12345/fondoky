<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{

    public function run()
    {
        Hotel::factory(10000)->create();
    }
}
