<?php


namespace App\Repositories\Web;


use App\Http\Requests\CalendarStoreRequest;
use App\Http\Requests\CalendarUpdateRequest;
use App\Interfaces\Web\CalendarRepositoryInterface;
use App\Models\Calendar;
use App\Models\Room;
use Carbon\Carbon;

class CalendarRepository implements CalendarRepositoryInterface
{


    public function create($id){


        $room = Room::where('hotel_id','=',hotel()->id)->findOrFail($id);
        return view('calendars.create',compact('room'));


    }


    public function store(CalendarStoreRequest $request){

        try{

            $to_date =     Carbon::createFromFormat('Y-m-d', $request['check_in']);
            $from_date =   Carbon::createFromFormat('Y-m-d',$request['check_out']);

            $diff = $to_date->diffInDays($from_date);



            $calendar = new Calendar();
            $calendar->room_id = $request->room_id;
            $calendar->room_number = $request->room_number;
            $calendar->check_in = $request->check_in;
            $calendar->check_out = $request->check_out;
            $calendar->room_price = $request->room_price;
            $calendar->days = $diff;
            $calendar->save();

            return redirect()->back()->with('success_add',__('calendars.message'));

        }catch (\Exception $e){

            return  redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }


    }

    public function edit($id){


        $calendar = Calendar::findOrFail($id);

        return view('calendars.edit',compact('calendar'));


    }



    public function update(CalendarUpdateRequest $request,$id){



        try{


            $start =     Carbon::createFromFormat('Y-m-d', $request['check_in']);
            $end =   Carbon::createFromFormat('Y-m-d',$request['check_out']);

            $diff = $start->diffInDays($end);



            $calendar = Calendar::findOrFail($id);
            $calendar->room_number = $request->room_number;
            $calendar->check_in = $request->check_in;
            $calendar->check_out = $request->check_out;
            $calendar->room_price = $request->room_price;
            $calendar->days = $diff;
            $calendar->save();

            return redirect()->back()->with('success_update',__('calendars.message_update'));

        }catch (\Exception $e){

            return  redirect()->back()->withErrors(["error" => $e->getMessage()]);
        }



    }


    //show calendar of toDay
    public function toDay($id){


        $start = Carbon::now()->format('Y-m-d');

        $calendars = Room::where('hotel_id',hotel()->id)->findOrFail($id)->calendars()->whereDate('check_in',$start)->get();

        return view('calendars.today',compact('calendars'));
    }



    public function delete($id){

        $calendar = Calendar::find($id)->delete();
        return redirect()->back()->with('delete', __('calendars.delete'));
    }

}