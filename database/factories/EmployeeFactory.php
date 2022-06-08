<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{

    protected $model = Employee::class;

    public function definition()
    {
        return [

            'name' => $this->faker->name(3),
            'image' => $this->faker->image('public/storage/employees', 640, 480, null, false),
            'address' => $this->faker->address(),
            'national_id' => rand(12000,52000),
            'salary' => rand(3000,5000),
            'role_name' => $this->faker->randomElement(["employee","manger","supervisor","tester"]),
            'day_of_money' => rand(25,40),
            'phone' => $this->faker->phoneNumber(),
            'hotel_id' => rand(1,3)
        ];
    }
}
