<?php

namespace App\Repositories\Api;
use Illuminate\Http\JsonResponse;
class ResponseApi{


    public static function returnResponseDataApi($data,string $message,int $code,bool $statusData,int $status = 200): JsonResponse
    {

        return response()->json([

            'data' => $data,
            'message' => $message,
            'code' => $code,
            'statusData' =>  $statusData

        ],$status);

    }

    public static function returnResponseError(string $message,int $code,bool $statusData,int $status): JsonResponse
    {

        return response()->json([

            'message' => $message,
            'code' => $code,
            'statusData' =>  $statusData

        ],$status);

    }

    public static function returnResponseSuccess(string $message,int $code,bool $statusData,int $status): \Illuminate\Http\JsonResponse
    {

        return response()->json([

            'message' => $message,
            'code' => $code,
            'statusData' =>  $statusData

        ],$status);

    }

    /*
     *  $now = Carbon::now();
     *   $start = Carbon::createFromTimeString($time_start);
      *  $end = Carbon::createFromTimeString($time_end);
      *  $now->isBetween($start,$end)
     */


}
