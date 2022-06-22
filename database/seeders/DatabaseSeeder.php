<?php

namespace Database\Seeders;
use App\Models\Booker;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /*
     * user
     * role
     * hotel
     * admin
     * room_type
     * room
     * booker
     * service
     */
    public function run()
    {


        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(RoomTypeSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(BookerSeeder::class);
        $this->call(ServiceSeeder::class);


    }
}
