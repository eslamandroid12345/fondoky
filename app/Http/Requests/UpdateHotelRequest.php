<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UpdateHotelRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {


        return [

            'manger' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'required|unique:hotels,email,' . hotel()->id,
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
            'location_ar' => 'required',
            'location_en' => 'required',
            'description' => 'required',
            'hotel_photos' => 'nullable|max:2048',
            'phone_hotel' => 'required|numeric',
        ];



    }


    public function messages()
    {
        return [


            'manger.required'  => __('hotels.manger'),
            'name_ar.required' => __('hotels.name_ar'),
            'name_en.required' => __('hotels.name_en'),
            'email.required' => __('hotels.email'),
            'email.email' => __('hotels.email_ok'),
            'email.unique' => __('hotels.unique'),
            'current_password.required' => __('hotels.current'),
            'confirm_password.required' => __('hotels.confirm_password'),
            'password.required' => __('hotels.password'),
            'password.min' => __('hotels.password_min'),
            'password.same' => __('hotels.same'),
            'location_ar.required' => __('hotels.location_ar'),
            'location_en.required' => __('hotels.location_en'),
            'description.required' => __('hotels.description'),
            'hotel_photos.required' => __('hotels.photo'),
            'phone_hotel.required' => __('hotels.phone_hotel'),
            'phone_hotel.numeric' => __('hotels.numeric'),

        ];

    }
}
