<?php


namespace App\Repositories\Web;


use App\Http\Requests\StoreHotelRoomServiceRequest;
use App\Interfaces\Web\HotelServiceRoomRepositoryInterface;
use App\Models\Room;
use App\Models\RoomService;
use Symfony\Component\HttpFoundation\Response;

class HotelServiceRoomRepository implements HotelServiceRoomRepositoryInterface{



    public function create()
    {

        $rooms = Room::with(['hotel:id'])->where('hotel_id','=',hotel()->id)->latest()->get();
        $room_services = RoomService::with(['hotel:id'])->select('id','name','hotel_id')->where('hotel_id','=',hotel()->id)->latest()->get();

        return view('hotel_room_services.create',compact('rooms','room_services'));
    }

    public function store(StoreHotelRoomServiceRequest $request)
    {

        try {
            $room = Room::findOrFail($request->room_id);

            if(!$room){

                abort('404','Room not found');
            }

            $room->roomService()->syncWithoutDetaching($request->room_service_id);

            return redirect()->back()->with('create', __('hotels.message_create'));

        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }
}