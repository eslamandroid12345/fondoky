<?php

namespace Database\Factories;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoleFactory extends Factory
{

    protected $model = Role::class;

    public function definition()
    {
        return [

            'name' => $this->faker->randomElement(["employee","manger","supervisor","tester"]),
            'permissions' => json_encode(["users","hotels","reservations","roles","rooms","admins","reports"]),
        ];
    }
}
