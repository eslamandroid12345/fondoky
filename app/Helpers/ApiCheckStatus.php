<?php


  //start method handle error and success message and data in controllers api

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;//use package of language


if(!function_exists('returnMessageError')){


     function returnMessageError($message,$code){


         return response()->json([

             "status" => false,
             "message" => $message,
             "code" => $code

         ]);
     }
 }


if(!function_exists('returnMessageSuccess')){


    function returnMessageSuccess($message,$code){


        return response()->json([

            "status" => true,
            "message" => $message,
            "code" => $code

        ]);
    }

}


if(!function_exists('returnDataSuccess')){


    function returnDataSuccess($message,$code,$key,$value){


        return response()->json([

            "status" => true,
            "message" => $message,
            "code" => $code,
            $key => $value

        ]);
    }


}



//end method of Api --------------------------------------------------------------------------------

if(!function_exists('admin')){

    function admin()
    {

        return auth()->guard('admin')->user();

    }
}


if(!function_exists('hotel')){

    function hotel()
    {


        return auth()->guard('hotel')->user();
    }
}



//check current language
if(!function_exists('lang')){

    function lang(){

        return Config::get('app.locale');

    }
}


if(!function_exists('langConfig')){

    function langConfig(){


        return  LaravelLocalization::getCurrentLocale();
    }
}




//count data of models in dashboard admin ---------------------------------------------------------

if(!function_exists('countAdmins')) {


    function countAdmins(){

        return DB::table('admins')->count();
    }
}



if(!function_exists('countHotels')) {


    function countHotels(){

        return DB::table('hotels')->count();
    }
}

if(!function_exists('countUsers')) {


    function countUsers(){

        return DB::table('users')->count();
    }
}


if(!function_exists('countRooms')) {


    function countRooms(){

        return DB::table('rooms')->count();
    }
}



if(!function_exists('countBooking')) {


    function countBooking(){

        return DB::table('bookers')->count();
    }
}

//-------------------------------------------------------------------------------------------------------


if(!function_exists('hotelBooking')) {


    function hotelBooking(){

        return DB::table('bookers')->where('hotel_id','=',hotel()->id)->count();
    }
}


if(!function_exists('hotelRooms')) {


    function hotelRooms(){

        return DB::table('rooms')->where('hotel_id','=',hotel()->id)->count();
    }
}


if(!function_exists('hotelCalendars')) {


    function hotelCalendars(){

        return hotel()->calendar()->count();
    }
}


if(!function_exists('hotelRoomsTypes')) {


    function hotelRoomsTypes(){

        return DB::table('room_types')->where('hotel_id','=',hotel()->id)->count();

    }
}


