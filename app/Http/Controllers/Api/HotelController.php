<?php

namespace App\Http\Controllers\Api;

use App\Events\NewHotelNotification;
use App\Http\Controllers\Controller;
use App\Http\Resources\HotelResource;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{


    //method login of hotel-api
    public function login(Request $request){


        try {

            $rules = [

                'email' => 'required|email',
                'password' => 'required',
            ];

            $message = [

                'email.required' => __('hotels.hotel_email'),
                'email.email' => __('hotels.hotel_email_ok'),
                'password.required' => __('hotels.hotel_password')
            ];


            $validator = Validator::make($request->all(),$rules,$message);

            if($validator->fails()){


                return returnMessageError($validator->errors(),"500");


            }

        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),"500");
        }


        $token = auth()->guard('hotel-api')->attempt($request->only(['email','password']));

        if(!$token){

            return returnMessageError(trans("admin.error"),"404");
        }


        $hotel = new HotelResource(auth()->guard('hotel-api')->user());
        $hotel->token = $token;

        if($hotel){


            return returnDataSuccess(trans('hotels.message'),"200","hotel",$hotel);
        }


    }


    public function register(Request $request){

        try {

            $rules = [

                'country' => 'required',
                'manger' => 'required',
                'name_ar' => 'required',
                'name_en' => 'required',
                'email' => 'required|email|unique:hotels',
                'password' => 'required|min:8',
                'location_ar' => 'required',
                'location_en' => 'required',
                'pound' => 'required',
                'description' => 'required',
                'hotel_photos' => 'required|max:2048',
                'phone_hotel' => 'required|numeric',

            ];

            $message = [

                'country.required'  => __('hotels.country'),
                'manger.required'  => __('hotels.manger'),
                'name_ar.required' => __('hotels.name_ar'),
                'name_en.required' => __('hotels.name_en'),
                'email.required' => __('hotels.email'),
                'email.email' => __('hotels.email_ok'),
                'email.unique' => __('hotels.unique'),
                'password.required' => __('hotels.password'),
                'password.min' => __('hotels.password_min'),
                'location_ar.required' => __('hotels.location_ar'),
                'location_en.required' => __('hotels.location_en'),
                'pound.required' => __('hotels.pound'),
                'description.required' => __('hotels.description'),
                'hotel_photos.required' => __('hotels.photo'),
                'phone_hotel.required' => __('hotels.phone_hotel'),

            ];



            $validator = Validator::make($request->all(),$rules,$message);

            if($validator->fails()){

                return returnMessageError($validator->errors(),"500");

            }
        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),"500");


        }


        $data = [];//empty array
        if($request->hasfile('hotel_photos'))
        {

            foreach($request->file('hotel_photos') as $image)
            {
                $name= time() . '.' . $image->getClientOriginalName();
                $image->move(public_path().'/hotels/', $name);
                $data[] = $name;
            }
        }


        $hotel = new HotelResource(Hotel::create([


            'country' => $request['country'],
            'manger' => $request['manger'],
            'name_ar' => $request['name_ar'],
            'name_en' => $request['name_en'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'location_ar' => $request['location_ar'],
            'location_en' => $request['location_en'],
            'pound' => $request['pound'],
            'description' => $request['description'],
            'hotel_photos' => json_encode($data),
            'phone_hotel' => $request['phone_hotel'],

        ]));


        $data = [

            "name_ar" =>  " لقد تم تسجيل فندق جديد " . $request['name_ar'],
            'email' => $request['email'],

        ];


        event(new NewHotelNotification($data));

        if($hotel){


            return returnDataSuccess(trans('hotels.hotel'),"201","hotel",$hotel);
        }



        }//end method register



    //user logout in api
    public function logout(){

        try {

            auth()->guard('hotel-api')->logout();

            return returnMessageSuccess(trans('hotels.logout'),"201");

        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),"500");

        }

    }


}
