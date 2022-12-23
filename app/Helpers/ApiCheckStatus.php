<?php

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

//helper method responsible for Api mobile

if(!function_exists('helperJson')){

    function helperJson($data=null,$message,$code = 200,$status = 200){

        return response()->json([

            'data' => $data,
            "message" => $message,
            "code" => $code

        ],$status);
    }
}


