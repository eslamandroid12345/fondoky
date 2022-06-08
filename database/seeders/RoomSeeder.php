<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{

    public function run()
    {

        Room::factory(100)->create();
    }
}
