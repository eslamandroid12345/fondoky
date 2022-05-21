<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CalendarController extends Controller
{




    public function create(){

       $rooms = Room::with(['hotel','room_type'])->where('hotel_id','=',hotel()->id)->orderBy('id','DESC')->get();
       return view('calendars.create',compact('rooms'));


    }


    public function store(Request $request){


        try {

            $rules = [

                'room_id' => 'required',
                'room_number' => 'required|integer',
                'check_in' => 'required',
                'check_out' => 'required',
                'room_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',

            ];



            $messages = [

                'room_id.required' => __('calendars.room_id'),
                'room_number.required' => __('calendars.room_number'),
                'room_number.integer' => __('calendars.room_integer'),
                'check_in.required' => __('calendars.check_in'),
                'check_out.required' => __('calendars.check_out'),
                'room_price.required' => __('calendars.room_price'),
                'room_price.regex' => __('calendars.room_price_regex'),

            ];


            $validator = Validator::make($request->all(),$rules,$messages);

            if($validator->fails()){

                return redirect()->back()->withErrors($validator)->withInput($request->all());
            }


        }catch (\Exception $exception){

            return $exception->getMessage();
        }


        //add different days to calendar
        $to_date =     Carbon::createFromFormat('Y-m-d', $request['check_in']);
        $from_date =   Carbon::createFromFormat('Y-m-d',$request['check_out']);

        $diff = $to_date->diffInDays($from_date);


        $calendars = Calendar::create([

            'room_id' => $request['room_id'],
            'room_number' => $request['room_number'],
            'check_in' => $request['check_in'],
            'check_out' => $request['check_out'],
            'room_price' => $request['room_price'],
            'days' => $diff,

        ]);


        return redirect()->back()->with('success_add',__('calendars.message'));


    }

    public function edit($id){


        $calendar = Calendar::findOrFail($id);

       return view('calendars.edit',compact('calendar'));


    }



    public function update(Request $request,$id){

        $calendar = Calendar::findOrFail($id);


        $rules = [

            'room_number' => 'required|integer',
            'check_in' => 'required',
            'check_out' => 'required',
            'room_price' => 'required|regex:/^\d+(\.\d{1,2})?$/',

        ];



        $messages = [

            'room_number.required' => __('calendars.room_number'),
            'room_number.integer' => __('calendars.room_integer'),
            'check_in.required' => __('calendars.check_in'),
            'check_out.required' => __('calendars.check_out'),
            'room_price.required' => __('calendars.room_price'),
            'room_price.regex' => __('calendars.room_price_regex'),

        ];


        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }

        //add different days to calendar
        $to_date =     Carbon::createFromFormat('Y-m-d', $request['check_in']);
        $from_date =   Carbon::createFromFormat('Y-m-d',$request['check_out']);

        $diff = $to_date->diffInDays($from_date);

        $calendar->update([

            'room_number' => $request['room_number'],
            'check_in' => $request['check_in'],
            'check_out' => $request['check_out'],
            'room_price' => $request['room_price'],
            'days' => $diff,


        ]);


        Session::flash('success_update',__('calendars.message_update'));
        return redirect()->back();


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
