<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{



    public function welcome(Request $request){

//        DB::raw('SUM(room_price) as balance')
        $country = $request->country;//hotel
        $child_max = $request->child_max;//room
        $adults_max = $request->adults_max;//room


        $start = Carbon::parse($request->date_start)->format('Y-m-d');//calendar
        $end = Carbon::parse($request->date_expire)->format('Y-m-d');//calendar


        if($country != null && $start != null && $end != null && $child_max != null && $adults_max != null){



                $rooms = Room::query()

                    ->whereHas('calendars', function ($query) use($start,$end){

                        $query->whereDate('check_in','<=',$start)
                            ->whereDate('check_out','>=',$end)
                            ->orWherebetween('check_in', [$start,$end])
                            ->whereDate('check_in','!=',$end);

                     })->whereHas('hotel', function ($query) use ($country) {

                      $query->where('country', '=', $country);

                     })->with(['calendars' => function ($query) use ($start, $end) {

                    $query->SelectTotal($start, $end);

                    }])->whereHas('calendars', function ($q) use ($start, $end) {

                        $q->CheckDate($start, $end);

                    })->where('adults_max', '=', $adults_max)

                    ->where('child_max', '=', $child_max)

                    ->withSum(['calendars' => function($query) use($start,$end){

                    $query->whereDate('check_in','<=',$start)
                    ->whereDate('check_out','>=',$end)
                        ->orWherebetween('check_in', [$start,$end])
                    ->whereDate('check_in','!=',$end);

                    }],'days')->simplePaginate(Search);




              //return $rooms;

              $hotels = [];


        }else{


            $hotels = Hotel::query()->orderBy('id','DESC')->simplePaginate(Search);
            $rooms = [];
        }

           return view('users.welcome',compact('hotels','rooms'));


    }


    public function index(){

        $users = User::orderBy('id','DESC')->simplePaginate(Max);
        return view('users.index',compact('users'));
    }




    public function update($id){

        $user = User::findOrFail($id);

        $user->update(['blocked' => $user->blocked == 1 ? 0 : 1]);

        return redirect()->back()->with('update',__('users.update'));


    }

    public function hotel_show($id){



        $start = Carbon::createFromDate()->format('Y-m-d');
        $end = Carbon::createFromDate()->format('Y-m-d');


        $hotel = Hotel::findOrFail($id);

        $rooms = Room::select(['id','room_type_id','hotel_id','adults_max','child_max','room_description'])->with(['room_type:id,room_type,hotel_id','calendars' => function($query) use($start,$end){

            $query->select('id','room_id','room_number','check_in','check_out','room_price')->whereDate('check_in','<=',$start)->whereDate('check_out','>=',$end);

        }])->whereBelongsTo($hotel)->get();

        return $rooms;

//     return view('users.calendars_show',compact('hotels'));

    }

    public function rooms($id){

        $rooms = Room::with('hotel')->findOrFail($id);
        return view('users.rooms',compact('rooms'));


    }



    //================================================================================
    public function reservation($id){



        $room = Room::with(['hotel','room_type'])->find($id);

        //return $room;

        return view('users.reservation_room',compact('room'));

    }

    public function delete($id){

        $user = User::findOrFail($id)->delete();
        return redirect()->back()->with('success',__('users.message'));
    }



}
