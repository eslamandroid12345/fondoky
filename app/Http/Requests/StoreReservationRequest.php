<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [



            'destination' => 'required',
            'children' => 'required',
            'adults' => 'required',
            'check_in' => 'required|before:check_out',
            'check_out' => 'required|after:check_in',
            'room_number' => 'required',
            'num_of_nights' => 'required',
            'room_id' => 'required',
            'hotel_id' => 'required',
            'vat_tax' => 'required',
            'municipal_tax' => 'required',
            'tourism_tax' => 'required',
            'total' => 'required',
            'total_all' => 'required',
            'commission' => 'required',

        ];
    }


    public function messages()
    {

        return [


            'children.required' => __('bookers.children'),
            'adults.required' => __('bookers.adults'),
            'room_number.required' => __('bookers.room_number'),
            'room_number.integer' => __('bookers.integer'),
            'check_in.required' => __('bookers.date_arrive'),
            'check_out.required' => __('bookers.date_leave'),

        ];

    }
}
