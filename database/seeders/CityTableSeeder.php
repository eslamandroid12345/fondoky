<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cities = [

          "محافظة الداخلية",
            "محافظة الظاهرة",
            "محافظة شمال الباطنة",
            "محافظة جنوب الباطنة",
            "محافظة البريمي",
            "محافظة الوسطى",
            "محافظة شمال الشرقية",
            "محافظة جنوب الشرقية",
            "محافظة ظفار",
            "محافظة مسقط",
        ];

        foreach ($cities as $city){

            City::create([

              'name' => $city,
              'country_id' => 34,
            ]);
        }
    }
}
