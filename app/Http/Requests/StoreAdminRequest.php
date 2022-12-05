<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'phone' => 'required|numeric',
            'image' => 'required|mimes:jpg,png,jpeg',
            'role_id' => 'required|exists:roles,id'

        ];
    }


    public function messages()
    {

        return [

            'name.required' => __('admin.name'),
            'email.required' => __('admin.email'),
            'email.email' => __('admin.email_ok'),
            'password.required' => __('admin.password'),
            'phone.required' => __('admin.phone'),
            'password.numeric' => __('admin.numeric'),
            'image.required' => __('admin.image'),
            'role_id.required' => __('admin.role_id'),
            'role_id.exists' => __('admin.exists')

        ];

    }
}
