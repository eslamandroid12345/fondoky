<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{

    public function authorize(){


        return true;
    }


    public function rules(){
        return [

            'name' => 'required',
            'services' => 'required|array|min:1',

        ];
    }


    public function messages(){


        return [

            'name.required' => __('services.name'),
            'services.required' => __('services.services'),
            'services.min' => __('services.services_min'),

        ];
    }
}
