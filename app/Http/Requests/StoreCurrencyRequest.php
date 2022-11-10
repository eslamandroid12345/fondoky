<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurrencyRequest extends FormRequest
{

    public function authorize(){


        return true;
    }


    public function rules()
    {
        return [

            'currency_ar' => 'required',
            'currency_en' => 'required',
            'logo' => 'nullable',

        ];
    }



    public function messages()
    {
        return [

            'currency_ar.required' => trans('currency.name_ar_val'),
            'currency_en.required' => trans('currency.name_en_val'),

        ];
    }
}
