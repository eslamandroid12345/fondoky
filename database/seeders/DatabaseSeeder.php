<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{


    public function run(){


     User::factory(20)->create();
     $this->call(RoleSeeder::class);
     $this->call(AdminSeeder::class);
     $this->call(CountryTableSeeder::class);
     $this->call(CityTableSeeder::class);


    }
}
