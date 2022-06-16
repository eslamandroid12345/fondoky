<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [


            'name'  => 'required|unique:roles,name',
            'permissions' => 'required|array|min:1',

        ];
    }


    public function messages()
    {

        return [


                'name.required' => __('admin_role.name_role'),
                'name.unique' => __('admin_role.unique'),
                'permissions.required' => __('admin_role.permissions'),
                'permissions.min' => __('admin_role.min'),


        ];

    }
}
