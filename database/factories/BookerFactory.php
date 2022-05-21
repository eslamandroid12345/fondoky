<?php

namespace Database\Factories;

use App\Models\Booker;
use App\Models\Hotel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookerFactory extends Factory
{

    protected $model = Booker::class;


    public function definition()
    {
        return [

            'city_to' => $this->faker->text(5),
            'children' => rand(1,3),
            'adults' => rand(1,3),
            'room_type' => $this->faker->text(5),
            'room_number' => rand(6,10),
            'room_price' => rand(120,500),
            'date_arrive' => Carbon::now()->format('Y-m-d'),
            'date_leave' => Carbon::now()->addDays(7)->format('Y-m-d'),
            'user_id' => rand(1,10000),
            'hotel_id' => rand(1,10000),
            'vat_tax' => rand(100,300),
            'municipal_tax' => rand(100,300),
            'tourism_tax' => rand(100,300),
            'total_all' => rand(800,1000),
            'total' => rand(500,800),
            'commission' => rand(70,150),
            'num_of_nights' => rand(2,9),
        ];
    }
}
