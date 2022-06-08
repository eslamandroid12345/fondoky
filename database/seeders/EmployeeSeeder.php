<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{

    public function run()
    {

        Employee::factory(100)->create();
    }
}
