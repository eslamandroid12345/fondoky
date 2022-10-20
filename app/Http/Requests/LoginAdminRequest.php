<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends FormRequest
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

            'email.required' => __('admin.email'),
            'email.email' => __('admin.email_ok'),
            'password.required' => __('admin.password')

        ];

    }
}
