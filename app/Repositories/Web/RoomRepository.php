<?php


namespace App\Repositories\Web;


use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Interfaces\Web\RoomRepositoryInterface;
use App\Models\Event;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;


class RoomRepository implements RoomRepositoryInterface{

    public const MAX_PAGE_RESERVATION = 1;
    public const EVENT_SHOW_LENGTH = 1;

    public function index(){


        $rooms = Room::with('hotel')->where('hotel_id','=',auth('hotel')->id())
            ->latest()->simplePaginate(self::MAX_PAGE_RESERVATION);

        return view('rooms.index',compact('rooms'));


    }


    public function create(){

        return view('rooms.create');

    }

    public function edit(Room $room){

         Gate::authorize('edit-room',$room);

        return view('rooms.edit',compact('room'));


    }

    public function show(Room $room){


        Gate::authorize('show-room',$room);
        return view('rooms.show', compact('room'));


    }


    public function store(StoreRoomRequest $request){


        try {

            $data = [];
            if($request->hasfile('images'))
            {

                foreach($request->file('images') as $image)
                {
                    $name= time() . rand(1,2000) . uniqid() . '.' . $image->getClientOriginalName();
                    $image->move(public_path().'/rooms/', $name);
                    $data[] = $name;
                }
            }


            $room = new Room();
            $room->room_type = $request->room_type;
            $room->room_description = $request->room_description;
            $room->adults_max = $request->adults_max;
            $room->child_max = $request->child_max;
            $room->hotel_id = auth('hotel')->id();
            $room->images = json_encode($data);
            $room->slug = Str::slug($request->room_description,"-","ar");
            $room->smoke = $request->smoke;
            $room->save();

            toastSuccess(__('room.create'));

            return redirect()->back();


        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }


    public function update(UpdateRoomRequest $request,$id){


        try {

            $room = Room::findOrFail($id);

            $data = [];
            if($request->hasfile('images'))
            {

                foreach($request->file('images') as $image)
                {
                    $name= time() . rand(1,2000) . uniqid() . '.' . $image->getClientOriginalName();
                    $image->move(public_path().'/rooms/',$name);
                    $data[] = $name;
                }

                //to remove all old rooms images from public folder
                $images = json_decode($room->images);
                foreach ($images as $image){

                    if(file_exists(public_path('rooms/' . $image))) {

                        unlink(public_path('rooms/') . $image);

                    }else{

                        return returnMessageError("Error to remove rooms images",Response::HTTP_INTERNAL_SERVER_ERROR);

                    }

                }
            }

            $room->room_type = $request->room_type;
            $room->room_description = $request->room_description;
            $room->adults_max = $request->adults_max;
            $room->child_max = $request->child_max;
            $room->images = json_encode($data);
            $room->save();

            toastSuccess(__('room.room_update'));

            return redirect()->back();


        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }


    public function delete($id)
    {

        try {

            $room = Room::where('id','=',$id)->first();

            $images = json_decode($room->images);
            foreach ($images as $image){

              if(file_exists(public_path('rooms/' . $image))){

                  unlink(public_path('rooms/') . $image);
              }else{

                  return returnMessageError("Error to remove rooms images",Response::HTTP_INTERNAL_SERVER_ERROR);
              }
            }

            $room->delete();
            toastError(__('room.delete'));
            return redirect()->route('rooms.index');

        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }


    public function calendarsShow(Request $request,$id){



            $room = Room::query()->where('id','=',$id)->first();

            Gate::authorize('show-room',$room);


            if ($request->has('check_in') && $request->check_out == null){

           $calendars = Event::with(['room'])->select('id','room_id','room_number','room_price','check_in','check_out')
               ->whereDate('check_in','=',$request->check_in)
               ->where('room_id','=',$id)
               ->orderByDesc('id')->get();

               }elseif ($request->has('check_in') && $request->has('check_out')){

                   $calendars = Event::with(['room'])->select('id','room_id','room_number','room_price','check_in','check_out')
                       ->whereBetween('check_in',[$request->check_in,$request->check_out])
                        ->whereBetween('check_out',[$request->check_in,$request->check_out])
                         ->where('room_id','=',$id)
                           ->orderByDesc('id')->get();

                   } else{

                $calendars = Event::with(['room'])->select('id','room_id','room_number','room_price','check_in','check_out')
                   ->where('room_id','=',$id)
                   ->orderByDesc('id')->simplePaginate(self::EVENT_SHOW_LENGTH);
             }

            return view('rooms.calendars',compact('calendars','id'));

    }


}