<?php
namespace App\Repositories\Web;
use App\Interfaces\Web\UserRepositoryInterface;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Hotel;
use App\Models\Rate;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserRepository implements UserRepositoryInterface{


    public function welcome(Request $request){

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

    public function index(){

        $users = User::simplePaginate(6);
        return view('users.index',compact('users'));

    }

    public function update($id){

        try {

            $user = User::findOrFail($id);
            $user->update([

                'blocked' => $user->blocked == 1 ? 0 : 1,

            ]);

            toastr()->success(__('users.update'));return redirect()->back();

        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function rooms($id){

        $rooms = Room::with('hotel')->findOrFail($id);
        return view('users.rooms',compact('rooms'));

    }

    public function reservation(Request $request,$id){


        $room = Room::query()->with(['hotel:id'])->where('id','=',$id)->first();

        $room_price = Event::where('room_id','=',$room->id)
            ->whereBetween('check_in',[request('date_start'),request('date_expire')])->whereDate('check_in','!=',request('date_expire'))->get();

        $calendars = Event::query()->with(['room' => function($room){

            return $room->with(['hotel' => function($hotel){

                $hotel->select('id','currency_ar','currency_en');

            }]);
        }])->where('room_id','=',$room->id)
            ->select('id','check_in','check_out','room_id','room_number','room_price')
                ->whereBetween('check_in',[request('date_start'),request('date_expire')])->whereDate('check_in','!=',request('date_expire'))
                ->get();


        return view('users.reservation_room',compact('room','calendars','room_price'));

    }

    public function delete($id){

        $user = User::findOrFail($id)->delete();

        toastr()->error(__('users.message'));
        return redirect()->back();
    }



    public function ratesCreate($id){

        $hotel = Hotel::query()->where('id','=',$id)->first();
        $rates = Rate::with(['user:id,name','hotel:id'])->where('user_id','=',auth()->id())->where('hotel_id','=',$hotel->id)->sum('rates_number');
        $rates_count = Rate::with(['hotel:id'])->where('hotel_id','=',$hotel->id)->sum('rates_number');
        $comments = Comment::with(['user:id,name','hotel:id'])->where('hotel_id','=',$hotel->id)->latest()->simplePaginate(6);


        return view('rates.create',compact('hotel','rates','rates_count','comments'));
    }

    public function rates(Request $request){

        try {

            $rate = Rate::create([

            'rates_number' => $request->rates_number,
            'hotel_id' => $request->hotel_id,
            'user_id' => auth()->id(),

            ]);

            toastr()->error(__('users.rate'));
            return redirect()->back();

        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }



    }


}
