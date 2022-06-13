<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class RoomTypeRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {


            return[

                'room_type' => ['required', Rule::unique('room_types')->where(function ($query) {

                    return $query->where('hotel_id', hotel()->id);

                }),
                ],

            ];

    }


    public function messages()
    {
        return [

            'room_type.required' => __('hotels.room_type_create'),
            'room_type.unique' => __('hotels.unique_type'),

        ];
    }
}
