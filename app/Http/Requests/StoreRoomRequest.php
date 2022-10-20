<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRoomRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [


            'room_type' => ['required', Rule::unique('rooms')->where(function ($query) {return $query->where('hotel_id', hotel()->id);}),],
            'room_description' => 'required',
            'adults_max' => 'required|integer',
            'images' => 'required',
            'smoke' => 'required',

        ];
    }


    public function messages()
    {

        return [


            'room_type.required' => __('room.room_type'),
            'room_type.unique' => __('room.unique'),
            'room_description.required' => __('room.room_description'),
            'adults_max.required' => __('room.adults_max'),
            'adults_max.integer' => __('room.adults_int'),
            'images.required' => __('room.images'),
            'smoke.required' => __('room.smoke'),
        ];

    }
}
