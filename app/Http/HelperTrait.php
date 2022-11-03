<?php

namespace App\Http;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

trait HelperTrait{


    public function search(Request $request){


        if($request->has('location_ar') || $request->has('location_en') && $request->has('child_max') && $request->has('adults_max') && $request->has('date_start') && $request->has('date_expire')) {

            $rooms = Room::whereDoesntHave('calendars', function ($query) {

                $query->where('room_number', '=', 0);})

                ->whereHas('calendars',function ($query) use($request) {

                $query->whereBetween('check_in',[$request->date_start,$request->date_expire])

                    ->whereDate('check_in','!=',$request->date_expire);

            })->whereHas('hotel', function ($query) use($request){

                $query->where('location_ar', 'like', '%' . $request->location_ar . '%')

                    ->orWhere('location_en', 'like', '%' . $request->location_en . '%');

            })->where('adults_max', '=', $request->adults_max)->where('child_max', '=', $request->child_max)

                ->with(['calendars' => function($query) use($request){

                $query->whereBetween('check_in',[$request->date_start,$request->date_expire])

                    ->whereDate('check_in','!=',$request->date_expire)

                    ->select('id','room_id','room_number','check_in','check_out','room_price');

                 },'hotel' => function($query){

                $query->where('blocked','=',true)->select('id','name_ar','name_en','location_ar','location_en', 'currency_ar','currency_en','hotel_photos');

            }])->select('id','adults_max','child_max','images','room_type','hotel_id')->get();



        }else{

            $rooms = [];

        }

        return view('users.welcome',compact('rooms'));
    }

}