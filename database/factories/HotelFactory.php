<?php

namespace Database\Factories;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class HotelFactory extends Factory
{


    protected $model = Hotel::class;


    public function definition()
    {

        return [

            'country' => $this->faker->country(),
            'manger' => $this->faker->name(3),
            'name_ar'  => $this->faker->name(3),
            'name_en' => $this->faker->name(3),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => Hash::make('admin123@gmail.com'),
            'location_ar' => "القاهره",
            'location_en' => "Cairo",
            'pound' => $this->faker->randomElement(["الريال العماني","الريال السعودي","جنيه مصري","الدولار الامريكي","الفرنك الجيبوتي"]),
            'description' => $this->faker->paragraph(30),
            'hotel_photos' => json_encode(["app.jpg","call.jpg"]),
            'phone_hotel' => $this->faker->phoneNumber(),
        ];
    }
}
