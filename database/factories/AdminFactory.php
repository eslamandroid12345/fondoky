<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class AdminFactory extends Factory
{

    protected $model = Admin::class;

    public function definition()
    {
        return [

            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('admin123@gmail.com'), // admin123@gmail.com
            'image' => $this->faker->image('public/storage/admins', 640, 480, null, false),
            'phone' => $this->faker->numberBetween(3000,10000),
            'role_id' => rand(1,10000)
        ];
    }
}
