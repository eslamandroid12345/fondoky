<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    public function run(){

         DB::table('admins')->insert(
             [

                 [
                     'name' => "admin",
                     'email' => "admin123@gmail.com",
                     'password' => Hash::make("admin123@gmail.com"),
                     'image' => "admin1.jpg",
                     'phone' => "32432",
                     'role_id' => rand(1,2),
                     'created_at' => now(),
                     'updated_at' => now()
                 ],

                 [
                     'name' => "admin2",
                     'email' => "admin12345@gmail.com",
                     'password' => Hash::make("admin12345@gmail.com"),
                     'image' => "admin2.jpg",
                     'phone' => "98534",
                     'role_id' => rand(1,2),
                     'created_at' => now(),
                     'updated_at' => now()
                 ]

             ]

         );

    }
}
