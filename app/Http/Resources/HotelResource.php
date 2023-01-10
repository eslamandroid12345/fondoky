<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource{

    public function toArray($request){
        return [

            'id' => $this->id,
            'manger' => $this->manger,
            'name' => lang() == 'ar' ? $this->name_ar : $this->name_en,
            'email' => $this->email,
            'location' => lang() == 'ar' ? $this->location_ar : $this->location_en,
            'currency' => lang() == 'ar' ? $this->currency_ar : $this->currency_en,
            'description' => $this->description,
            'hotel_photos' => asset('hotels/' . $this->hotel_photos),
            'phone_hotel' => $this->phone_hotel,
            'blocked' => $this->active(),
            'token' => $this->token,
            'token_type' => 'Bearer',
            'created_at' => $this->created_at->format('Y-m-d'),
            'updated_at' => $this->updated_at->format('Y-m-d')
        ];
    }
}
