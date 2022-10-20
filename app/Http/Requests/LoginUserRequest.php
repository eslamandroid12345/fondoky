<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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

            'email.required'   => trans('api_user.email'),
            'password.required' => trans('api_user.password'),
        ];

    }
}
