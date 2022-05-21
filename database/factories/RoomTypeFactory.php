<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomTypeFactory extends Factory
{

    protected $model = RoomType::class;
    public function definition()
    {
        return [

            'room_type' => $this->faker->randomElement(["غرفه الملكه","غرفه سنجل","غرفه دوبل","غرفه الملك"]),
            'hotel_id' => rand(1,2),
        ];
    }
}
