<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoomRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'room_type' => 'required|unique:rooms,' . $this->id,
            'room_description' => 'required',
            'adults_max' => 'required|integer',
            'images' => 'required',
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


        ];

    }
}
