<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [


            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'required|numeric'
        ];
    }


    public function messages()
    {

        return [


            'name.required' => trans('api_user.name'),
            'email.required'   => trans('api_user.email'),
            'email.unique' => trans('api_user.email_unique'),
            'password.required' => trans('api_user.password'),
            'password.min' => trans('api_user.password_min'),
            'phone.required' => trans('api_user.phone'),
            'phone.numeric' => trans('api_user.phone_numeric'),

        ];

    }
}
