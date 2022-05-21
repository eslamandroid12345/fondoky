<?php

namespace App\Http\Controllers;

use App\Events\NewReservation;
use App\Models\Booker;
use App\Models\Calendar;
use App\Models\Report;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BookerController extends Controller
{


    public function store(Request $request,$id){



        $rules = [

            'city_to' => 'required',
            'child_max' => 'required',
            'adults_max' => 'required',
            'room_type' => 'required',
            'room_number' => 'required|integer',
            'date_arrive' => 'required',
            'date_leave' => 'required',

        ];

        $message = [


            'city_to.required' => __('bookers.city_to'),
            'children.required' => __('bookers.children'),
            'adults.required' => __('bookers.adults'),
            'room_type.required' => __('bookers.room'),
            'room_number.required' => __('bookers.room_number'),
            'room_number.integer' => __('bookers.integer'),
            'date_arrive.required' => __('bookers.date_arrive'),
            'date_leave.required' => __('bookers.date_leave'),


        ];


        $validator = Validator::make($request->all(),$rules,$message);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


               DB::transaction(function () use ($request,$id) {//transactions of


                   try {

                       $booker = Booker::create([

                           'city_to' => $request['city_to'],
                           'children' => $request['child_max'],
                           'adults' => $request['adults_max'],
                           'room_type' => $request['room_type'],
                           'room_number' => $request['room_number'],//room number
                           'room_price' => $request['room_price'],//room price booking
                           'num_of_nights' => $request['num_of_nights'], //number of nights
                           'date_arrive' => $request['date_arrive'],
                           'date_leave' => $request['date_leave'],
                           'user_id' => auth()->id(),
                           'hotel_id' => $request['hotel_id'],
                           'vat_tax' => $request['vat_tax'],
                           'municipal_tax' => $request['municipal_tax'],
                           'tourism_tax' => $request['tourism_tax'],
                           'total_all' => $request['total_all'],
                           'total' => $request['total'],
                           'commission' => $request['commission'],


                       ]);


                        Report::create([

                            'hotel_id' => $request['hotel_id'],
                            'booker_id' => $booker->id,
                            'total' => $request['total'],
                            'commission' => $request['commission'],

                        ]);




                       //start update room number in calendars =============================

                       $start = Carbon::parse($request->date_arrive)->format('Y-m-d');//date_start
                       $end = Carbon::parse($request->date_leave)->format('Y-m-d');//date_expire

                       $calendars = Room::findOrFail($id)->calendars()
                           ->wherebetween('check_in', [$start,$end])->whereDate('check_in','!=',$end)->get();



                       foreach ($calendars as $calendar){

                           $calendar->decrement('room_number', $request['room_number']);
                           $calendar->update();

                       }

                       //end update room number in calendars =================================

                       DB::commit();

                       event(new NewReservation($booker->hotel_id, $booker));


                   } catch (\Exception $exception) {

                       DB::rollBack();

                       return $exception->getMessage();
                   }

               });


        return redirect()->route('home')->with('success','تم اضافه حجزك بنجاح');

    }


    public function active($id){


        $booker = Booker::findOrFail($id);
        $report = Report::where('booker_id',$id)->get();




        DB::transaction(function () use ($booker,$report){

            try {

                $booker->update([

                    'canceled' => $booker->canceled == 1 ? 0 : 1,
                    'vat_tax' => 0,
                    'municipal_tax' => 0.,
                    'tourism_tax'  => 0,
                    'total_all'  => 0,
                    'total'  => 0,
                    'commission'  => 0,
                    'blocked' => 0,

                ]);

                $report->update([

                    'blocked' => 0,
                    'commission'  => 0,
                    'canceled' => 0,

                ]);


                DB::commit();

            }catch (\Exception $exception){

                DB::rollBack();

                return $exception->getMessage();
            }

        });


        return redirect()->back()->with('update','Booking canceled successfully');

    }


}
