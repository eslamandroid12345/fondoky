<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'city_to' => 'required',
            'child_max' => 'required',
            'adults_max' => 'required',
            'room_type' => 'required',
            'room_number' => 'required|integer',
            'date_arrive' => 'required',
            'date_leave' => 'required',

        ];
    }


    public function messages()
    {

        return [


            'city_to.required' => __('bookers.city_to'),
            'children.required' => __('bookers.children'),
            'adults.required' => __('bookers.adults'),
            'room_type.required' => __('bookers.room'),
            'room_number.required' => __('bookers.room_number'),
            'room_number.integer' => __('bookers.integer'),
            'date_arrive.required' => __('bookers.date_arrive'),
            'date_leave.required' => __('bookers.date_leave'),

        ];

    }
}
