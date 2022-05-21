<?php

namespace Database\Factories;

use App\Models\Hotel;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
   protected $model = Service::class;

    public function definition()
    {
        return [

            'name' => $this->faker->name(3),
            'services' => json_encode(["Parking","Room Service","24-Hour Guest Reception","Complimentary Toiletries","Healthy Breakfast","Ample Wall Outlets","Hair Styling Tools","Flexible Checkout","Pool","Mini-fridge","Complimentary Electronics Chargers","Free Breakfast","Laundry Services","Spa & Wellness Amenities","Exercise Facilities and Accessories","Daily Newspaper","Fancy Bathrobes","Stain Remover Wipes"]),
            'hotel_id'  => rand(1,10000)
        ];
    }
}
