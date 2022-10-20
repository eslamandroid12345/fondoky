<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomServiceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [


            'name' => 'required',
            'hotel_id' => 'required|exists:hotels,id',


        ];
    }


    public function messages()
    {
        return [


            'name.required' => __('hotels.room_service_name'),
            'hotel_id.required' => __('hotels.hotel_name_required'),
            'hotel_id.exists' => __('hotels.hotel_exists'),


        ];
    }
}
