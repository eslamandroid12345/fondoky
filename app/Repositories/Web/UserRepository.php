<?php


namespace App\Repositories\Web;


use App\Interfaces\Web\UserRepositoryInterface;
use App\Models\Hotel;
use App\Models\Rate;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{

    public function welcome(Request $request){


        $country = $request->country;
        $country_en = $request->country_en;
        $child_max = $request->child_max;
        $adults_max = $request->adults_max;
        $start = $request->date_start;
        $end = $request->date_expire;



        if(!is_null($country) OR !is_null($country_en) AND !is_null($start) AND !is_null($end) AND !is_null($child_max) AND !is_null($adults_max)) {


            $rooms = Room::whereHas('calendars', function ($query) use($start,$end){

                $query->whereDate('check_in','<=',$start)->whereDate('check_out','>=',$end)->orWhereBetween('check_in',[$start,$end])->whereDate('check_in','!=',$end);



            })->whereHas('hotel', function ($query) use ($country,$country_en) {

                $query->where('country_ar', '=', $country)->orWhere('country_en','=',$country_en);

            })->where('adults_max', '=', $adults_max)->where('child_max', '=', $child_max)

                ->with(['calendars' => function ($query) use ($start, $end) {

                $query->whereDate('check_in','<=',$start)->whereDate('check_out','>=',$end)
                    ->orWhereBetween('check_in',[$start,$end])
                    ->whereDate('check_in','!=',$end)->select('id','room_id','room_number','check_in','check_out',
                        DB::raw('SUM(room_price)  as total_room_price'),
                        DB::raw('Count(id) as total_calendar'))->groupBy('room_id');

                    ;

               }])->simplePaginate(Search);


            //return $rooms;
            $hotels = [];


        } else{


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



    public function rooms($id){

        $rooms = Room::with('hotel')->findOrFail($id);
        return view('users.rooms',compact('rooms'));


    }



    public function reservation($id){


        $room = Room::with(['hotel','room_type'])->find($id);

//
        $calendars = Room::findOrFail($id)->calendars()->select('id','check_in','check_out','room_id','room_number','room_price','days')->simplePaginate(3);


        return view('users.reservation_room',compact('room','calendars'));

    }

    public function delete($id){

        $user = User::findOrFail($id)->delete();
        return redirect()->back()->with('success',__('users.message'));
    }

    

    public function ratesCreate($id)
    {

        $hotel = Hotel::find(decrypt($id));
        $rates = Rate::with(['user','hotel'])->where('user_id','=',auth()->id())->get();
        $rates_count = Rate::with(['hotel'])->where('hotel_id','=',$hotel->id)->sum('rates_number');


        return view('rates.create',compact('hotel','rates','rates_count'));
    }

    public function rates(Request $request)
    {

        try {


            $rate = new Rate();
            $rate->rates_number = $request->rates_number;
            $rate->hotel_id = $request->hotel_id;
            $rate->user_id = auth()->id();
            $rate->save();

            return redirect()->back()->with('success',__('users.rate'));



        }catch (\Exception $exception){


            return redirect()->back()->withErrors(['errors' => $exception->getMessage()]);
        }



    }


}