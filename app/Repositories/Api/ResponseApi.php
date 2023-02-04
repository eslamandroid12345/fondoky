<?php

namespace App\Repositories\Api;

class ResponseApi{


    public static function returnResponseDataApi($data,string $message,int $code,bool $statusData,int $status = 200){

        return response()->json([

            'data' => $data,
            'message' => $message,
            'code' => $code,
            'statusData' =>  $statusData

        ],$status);

    }

    public static function returnResponseError(string $message,int $code,bool $statusData,int $status){

        return response()->json([

            'message' => $message,
            'code' => $code,
            'statusData' =>  $statusData

        ],$status);

    }

    public static function returnResponseSuccess(string $message,int $code,bool $statusData,int $status){

        return response()->json([

            'message' => $message,
            'code' => $code,
            'statusData' =>  $statusData

        ],$status);

    }


}
