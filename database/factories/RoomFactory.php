<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Hotel;

class RoomFactory extends Factory
{

    protected $model = Room::class;

    public function definition()
    {
        return [

            'room_type_id' => rand(1,10000),
            'room_description' => $this->faker->paragraph(30),
            'adults_max' => rand(1,3),
            'child_max' => rand(1,3),
            'images' => json_encode(["app.jpg","call.jpg"]),
            'hotel_id' => rand(1,3)

        ];
    }
}
