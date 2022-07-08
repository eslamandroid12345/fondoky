<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelRoomServiceRequest extends FormRequest{


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'room_id' => 'required|exists:rooms,id',
            'room_service_id' => 'required|exists:room_services,id',


        ];
    }


    public function messages()
    {
        return [

            'room_id.required' => __('hotels.room_id'),
            'room_service_id.required' => __('hotels.room_service_id_valid'),
            'room_id.exists' => __('hotels.room_id_exists'),
            'room_service_id.exists' => __('hotels.room_service_id_exists'),

        ];
    }
}
