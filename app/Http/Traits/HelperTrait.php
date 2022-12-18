<?php

namespace App\Http\Traits;

use App\Models\Hotel;
use Illuminate\Http\Request;

trait HelperTrait{


    public function search(Request $request){

        if($request->has('location_ar') || $request->has('location_en') && $request->has('child_max') && $request->has('adults_max') && $request->has('date_start') && $request->has('date_expire')) {

            $hotels = Hotel::where('blocked', '=', true)
                ->select('id', 'name_ar', 'name_en', 'location_ar', 'location_en', 'currency_ar', 'currency_en', 'hotel_photos')
                ->whereHas('room', function ($room) use ($request) {

                    $room->whereDoesntHave('calendars', function ($query) {
                        $query->where('room_number', '=', 0);

                    })->where('room_type', '=', 'Double Room')
                        ->where('adults_max', '=', $request->adults_max)->where('child_max', '=', $request->child_max)
                        ->whereHas('calendars', function ($calendars) use ($request) {
                        $calendars->whereBetween('check_in', [$request->date_start, $request->date_expire])->whereDate('check_in', '!=', $request->date_expire);

                    });

                })->where('location_ar', '=', $request->location_ar)->orWhere('location_en', '=', $request->location_en)
                ->with(['room' => function ($room) use ($request) {

                    $room->select('id','room_type','adults_max','child_max','hotel_id')->where('room_type', '=', 'Double Room')
                        ->whereHas('calendars', function ($calendars) use ($request) {

                        $calendars->whereBetween('check_in', [$request->date_start, $request->date_expire])->whereDate('check_in', '!=', $request->date_expire);

                    })->with(['calendars' => function ($calendars) use ($request) {

                        $calendars->select('id','room_id','room_number','room_price','check_in','check_out')
                                ->whereBetween('check_in', [$request->date_start, $request->date_expire])->whereDate('check_in', '!=', $request->date_expire);
                        }]);

                }])->get();

        }
        else{

            $hotels = [];
        }

        return view('users.welcome',compact('hotels'));
    }


}