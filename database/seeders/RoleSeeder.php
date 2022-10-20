<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder{

    public function run(){

       DB::table('roles')->insert( [

               [
                   'name' => 'admin',
                   'permissions' => json_encode([ 'users', 'hotels', 'reservations','roles','admins','reports' , 'notifications']),
                   'created_at' => now(),
                   'updated_at' => now()
               ],
               [
                   'name' => 'supervisor',
                   'permissions' => json_encode(['reservations','roles','admins',]),
                   'created_at' => now(),
                   'updated_at' => now()
               ],
               [
                   'name' => 'employee',
                   'permissions' => json_encode([ 'reservations']),
                   'created_at' => now(),
                   'updated_at' => now()
               ]


           ]
       );

    }
}
