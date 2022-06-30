<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
{

    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'country' => $this->country,
            'manger' => $this->manger,
            'name' => lang() == 'ar' ? $this->name_ar : $this->name_en,
            'email' => $this->email,
            'password' => $this->password,
            'location' => lang() == 'ar' ? $this->location_ar : $this->location_en,
            'pound' => $this->pound,
            'description' => $this->description,
            'hotel_photos' => asset('hotels/' . $this->hotel_photos),
            'phone_hotel' => $this->phone_hotel,
            'blocked' => $this->active(),
            'token' => $this->token,
            

        ];
    }
}
