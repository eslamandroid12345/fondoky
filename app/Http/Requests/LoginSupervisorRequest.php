<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginSupervisorRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'email' => 'required',
            'password' => 'required'
        ];
    }


    public function messages()
    {

        return [

            'email.required'   => trans('supervisor.email'),
            'password.required' => trans('supervisor.password'),
        ];

    }
}
