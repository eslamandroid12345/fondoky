<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{


    public function run()
    {

        RoomType::factory(1000)->create();
    }
}
