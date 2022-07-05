<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupervisorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [

            'name' => 'required',
            'email' => 'required|email|unique:supervisors,email',
            'password' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
            'num_of_branches' => 'required|integer',
            'image' => 'required',
            'admin_id' => 'required|exists:admins,id',


        ];
    }



    public function messages()
    {

        return [

            'name.required' => __('supervisor.name'),
            'email.required' => __('supervisor.email_one'),
            'email.email' => __('supervisor.email_ok'),
            'password.required' => __('supervisor.password_one'),
            'phone.required' => __('supervisor.phone'),
            'address.required' => __('supervisor.address'),
            'num_of_branches.required' => __('supervisor.num_of_branches'),
            'num_of_branches.integer' => __('supervisor.num_of_branches_int'),
            'password.numeric' => __('supervisor.numeric'),
            'image.required' => __('supervisor.image'),
            'admin_id.required' => __('supervisor.role_id'),
            'admin_id.exists' => __('supervisor.exists')


        ];

    }
}
