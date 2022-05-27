<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelLoginRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'email' => 'required|email',
            'password' => 'required',


        ];
    }


    public function messages()
    {
        return [

            'email.required' => __('hotels.hotel_email'),
            'email.email' => __('hotels.hotel_email_ok'),
            'password.required' => __('hotels.hotel_password')


        ];

    }
}
