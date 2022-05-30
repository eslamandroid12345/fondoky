<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalendarUpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'room_number' => 'required|integer',
            'check_in' => 'required',
            'check_out' => 'required',
            'room_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',


        ];
    }


    public function messages()
    {

        return [

            'room_number.required' => __('calendars.room_number'),
            'room_number.integer' => __('calendars.room_integer'),
            'check_in.required' => __('calendars.check_in'),
            'check_out.required' => __('calendars.check_out'),
            'room_price.required' => __('calendars.room_price'),
            'room_price.regex' => __('calendars.room_price_regex'),

        ];

    }
}
