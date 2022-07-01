<?php


namespace App\Repositories\Api;


use App\Events\NewHotelNotification;
use App\Http\Requests\HotelLoginRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Resources\HotelResource;
use App\Interfaces\Api\HotelRepositoryInterface;
use App\Models\Hotel;
use Illuminate\Support\Facades\Hash;


class HotelRepository implements HotelRepositoryInterface
{

    public function hotelLogin(HotelLoginRequest $request)
    {


        try {


            $credentials = $request->only(['email','password']);

            $token = auth()->guard('hotel-api')->attempt($credentials);

            if(!$token){

                return returnMessageError(trans("admin.error"),"404");
            }


            $hotel = new HotelResource(auth()->guard('hotel-api')->user());
            $hotel->token = $token;

            if($hotel){


                return returnDataSuccess(trans('hotels.message'),"200","hotel",$hotel);
            }



        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),"500");

        }
    }



    public function hotelRegister(StoreHotelRequest $request)
    {

        try {

            //create images for hotel-api
            $data = [];
            if($request->hasfile('hotel_photos'))
            {

                foreach($request->file('hotel_photos') as $image)
                {
                    $name= time() . '.' . $image->getClientOriginalName();
                    $image->move(public_path().'/hotels/', $name);
                    $data[] = $name;
                }
            }



            $hotel = new Hotel();
            $hotel->country = $request->country;
            $hotel->manger = $request->manger;
            $hotel->name_ar = $request->name_ar;
            $hotel->name_en = $request->name_en;
            $hotel->email = $request->email;
            $hotel->password = Hash::make($request->password);
            $hotel->location_ar = $request->location_ar;
            $hotel->location_en = $request->location_en;
            $hotel->pound = $request->pound;
            $hotel->currency_en = $request->currency_en;
            $hotel->description = $request->description;
            $hotel->hotel_photos = json_encode($data);
            $hotel->phone_hotel = $request->phone_hotel;
            $hotel->save();

            $data = [

                "name_ar" =>  " لقد تم تسجيل فندق جديد " . $request->name_ar,
                'email' => $request->email,

            ];


            event(new NewHotelNotification($data));

            if($hotel){


                return returnDataSuccess(trans('hotels.hotel'),"201","hotel",new HotelResource($hotel));
            }


        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),"500");

        }

    }



    public function hotelLogout()
    {

        try {

            auth()->guard('hotel-api')->logout();

            return returnMessageSuccess(trans('hotels.logout'),"201");

        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),"500");

        }


    }
}