<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{


    //get all users from database
    public function users(){

        $users = UserResource::collection(User::query()->get());

        return returnDataSuccess("users get all successfully","201","users",$users);

    }

    public function register(Request $request){


        try {

            $rules = [


                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|min:8',
                'phone' => 'required|numeric'

            ];

            $messages = [


                'name.required' => trans('api_user.name'),
                'email.required'   => trans('api_user.email'),
                'email.unique' => trans('api_user.email_unique'),
                'password.required' => trans('api_user.password'),
                'password.min' => trans('api_user.password_min'),
                'phone.required' => trans('api_user.phone'),
                'phone.numeric' => trans('api_user.phone_numeric'),


            ];

            $validator = Validator::make($request->all(),$rules,$messages);


            if($validator->fails()){


                return returnMessageError($validator->errors(),"500");
            }

        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),"500");
        }



        $user = new UserResource(User::create([

            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],

        ]));


        if($user){

            return returnDataSuccess(trans('api_user.create'),"201","user",$user);
        }


    }


    public function login(Request $request){


      $rules = [

            'email' => 'required',
            'password' => 'required'


      ];

      $messages = [

         'email.required'   => trans('api_user.email'),
          'password.required' => trans('api_user.password'),

      ];

      $validator = Validator::make($request->all(),$rules,$messages);


      if($validator->fails()){


          return returnMessageError($validator->errors(),"500");
      }


      $token = auth()->guard('user-api')->attempt($request->only(['email','password']));


      if(!$token){


          return returnMessageError(trans('api_user.failed'),"404");
      }


      $user = new UserResource(auth()->guard('user-api')->user());
      $user->token = $token;


      return returnDataSuccess(trans('api_user.login'),"201","user",$user);


    }



    public function logout(){


        try {

            auth()->guard('user-api')->logout();

            return returnMessageSuccess(trans('api_user.logout'),"201");

        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),"500");

        }

    }
}
