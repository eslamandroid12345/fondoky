<?php


namespace App\Repositories\Web;


use App\Events\NewReservation;
use App\Http\Requests\StoreBookerRequest;
use App\Interfaces\Web\BookerRepositoryInterface;
use App\Models\Booker;
use App\Models\Report;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookerRepository implements  BookerRepositoryInterface
{

    public function store(StoreBookerRequest $request,$id)
    {



        DB::beginTransaction();


            try {

                //step number 1
                $booker = new Booker();
                $booker->city_to = $request->city_to;
                $booker->children = $request->child_max;
                $booker->adults = $request->adults_max;
                $booker->room_type = $request->room_type;
                $booker->room_number = $request->room_number;
                $booker->room_price = $request->room_price;
                $booker->num_of_nights = $request->num_of_nights;
                $booker->date_arrive = $request->date_arrive;
                $booker->date_leave = $request->date_leave;
                $booker->user_id = auth()->id();
                $booker->hotel_id = $request->hotel_id;
                $booker->vat_tax = $request->vat_tax;
                $booker->municipal_tax = $request->municipal_tax;
                $booker->tourism_tax = $request->tourism_tax;
                $booker->total_all = $request->total_all;
                $booker->total = $request->total;
                $booker->commission = $request->commission;
                $booker->save();



                //step number 2
                $report = new Report();
                $report->hotel_id = $request->hotel_id;
                $report->booker_id = $booker->id;
                $report->total = $request->total;
                $report->commission = $request->commission;
                $report->save();



                //step number 3
                $start = Carbon::parse($request->date_arrive)->format('Y-m-d');
                $end = Carbon::parse($request->date_leave)->format('Y-m-d');


                //step number 4
                $calendars = Room::findOrFail($id)->calendars()
                    ->whereDate('check_in','<=',$start)->whereDate('check_out','>=',$end)
                    ->orWhereBetween('check_in',[$start,$end])
                    ->whereDate('check_in','!=',$end)
                    ->where('room_id','=',$id)
                    ->get();


                //step number 5
                foreach ($calendars as $calendar) {

                    $calendar->decrement('room_number', $request->room_number);
                    $calendar->update();

                }


                DB::commit();

                event(new NewReservation($booker->hotel_id, $booker));


            } catch (\Exception $exception) {

                DB::rollBack();

                return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);
            }




        return redirect()->route('home')->with('success',__('users.booking'));

    }


    public function active($id){


        DB::beginTransaction();

            try {

                $booker = Booker::findOrFail($id);
                $report = Report::where('booker_id',$id)->first();


                $booker->canceled = $booker->canceled == 1 ? 0 : 1;
                $booker->vat_tax = 0;
                $booker->municipal_tax = 0;
                $booker->tourism_tax = 0;
                $booker->total_all = 0;
                $booker->total = 0;
                $booker->commission = 0;
                $booker->blocked = 0;
                $booker->save();


                $report->total = 0;
                $report->commission = 0;
                $report->blocked = 0;
                $report->canceled = 0;
                $report->save();




                DB::commit();


            }catch (\Exception $exception){

                DB::rollBack();

                return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);
            }



        return redirect()->back()->with('update',__('bookers.remove'));



    }


}