<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest{

    public function authorize(){

        return true;
    }



    public function rules(){
        return [

            'room_number' => 'required|integer',
            'room_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',


        ];
    }

    public function messages(){

        return [

            'room_number.required' => __('calendars.room_number'),
            'room_price.required' => __('calendars.room_price'),
            'room_price.regex' => __('calendars.room_price_regex'),
        ];
    }
}
