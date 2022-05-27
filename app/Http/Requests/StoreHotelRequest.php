<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'country' => 'required',
            'manger' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'required|email|unique:hotels',
            'password' => 'required|min:8',
            'location_ar' => 'required',
            'location_en' => 'required',
            'pound' => 'required',
            'description' => 'required',
            'hotel_photos' => 'required|max:2048',
            'phone_hotel' => 'required|numeric',

        ];
    }


    public function messages()
    {
        return [

            'country.required'  => __('hotels.country'),
            'manger.required'  => __('hotels.manger'),
            'name_ar.required' => __('hotels.name_ar'),
            'name_en.required' => __('hotels.name_en'),
            'email.required' => __('hotels.email'),
            'email.email' => __('hotels.email_ok'),
            'email.unique' => __('hotels.unique'),
            'password.required' => __('hotels.password'),
            'password.min' => __('hotels.password_min'),
            'location_ar.required' => __('hotels.location_ar'),
            'location_en.required' => __('hotels.location_en'),
            'pound.required' => __('hotels.pound'),
            'description.required' => __('hotels.description'),
            'hotel_photos.required' => __('hotels.photo'),
            'phone_hotel.required' => __('hotels.phone_hotel'),

        ];

    }
}
