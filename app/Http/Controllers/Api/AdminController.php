<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function login(Request $request){


        $rules = [

            'email' => 'required',
            'password' => 'required'


        ];

        $messages = [

            'email.required' => trans('admin.email'),
            'password.required' => trans('admin.password')

        ];

        $validator = Validator::make($request->all(),$rules,$messages);


        if($validator->fails()){


            return returnMessageError($validator->errors(),"500");
        }


        $token = auth()->guard('admin-api')->attempt($request->only(['email','password']));


        if(!$token){


            return returnMessageError(trans('api_user.failed'),"404");
        }


        $admin = new AdminResource(auth()->guard('admin-api')->user());
        $admin->token = $token;


        return returnDataSuccess(trans('api_user.login'),"201","admin",$admin);


    }
}
