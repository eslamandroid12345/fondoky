<?php


namespace App\Repositories\Web;
use App\Http\HelperTrait;
use App\Interfaces\Web\UserRepositoryInterface;
use App\Models\Comment;
use App\Models\Event;
use App\Models\Hotel;
use App\Models\Rate;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class UserRepository implements UserRepositoryInterface{

     use HelperTrait;
     public const MAX_PAGE_COMMENT = 6;


    public function welcome(Request $request){

      return $this->search($request);

    }


    public function index(){

        $users = User::simplePaginate(Max);
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

    

    public function ratesCreate($id)
    {

        $hotel = Hotel::query()->where('id','=',$id)->first();

        $rates = Rate::with(['user:id,name','hotel:id'])
            ->where('user_id','=',auth()->id())->where('hotel_id','=',$hotel->id)->sum('rates_number');

        $rates_count = Rate::with(['hotel:id'])->where('hotel_id','=',$hotel->id)->sum('rates_number');

        $comments = Comment::with(['user:id,name','hotel:id'])->where('hotel_id','=',$hotel->id)
            ->latest()->simplePaginate(self::MAX_PAGE_COMMENT);


        return view('rates.create',compact('hotel','rates','rates_count','comments'));
    }

    public function rates(Request $request)
    {

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