<?php


namespace App\Repositories\Web;
use App\Http\Requests\StoreRoomServiceRequest;
use App\Interfaces\Web\RoomServiceRepositoryInterface;
use App\Models\RoomService;

class RoomServiceRepository implements RoomServiceRepositoryInterface
{


    public function index()
    {
        // TODO: Implement index() method.


        $Services = RoomService::with('hotel:id,name_ar,name_en')->select('id','name','hotel_id')->where('hotel_id','=',hotel()->id)->simplePaginate(Max);

        return view('room_services.index',compact('Services'));
    }


    public function create(){

        return view('room_services.create');

    }

    public function store(StoreRoomServiceRequest $request){


        try {


                $room_service = new RoomService();
                $room_service->name = $request->name;
                $room_service->hotel_id = $request->hotel_id;
                $room_service->save();

                return redirect()->back()->with('create', __('hotels.service_room_create'));

            } catch (\Exception $exception){


            return redirect()->back()->withErrors(['errors' => $exception->getMessage()]);

        }

    }



    public function edit($id){


        $room_service = RoomService::findOrFail($id);
        if($room_service->hotel_id != hotel()->id){

            return view('404');

        }else{

            return view('room_services.edit',compact('room_service'));

        }


    }

    public function update(StoreRoomServiceRequest $request, $id){


        try {


              $room_service = RoomService::findOrFail($id);
              $room_service->name = $request->name;
             $room_service->hotel_id = $request->hotel_id;
             $room_service->save();

              return redirect()->route('room-services.index')->with('update', __('hotels.service_room_update'));


        } catch (\Exception $exception){


            return redirect()->back()->withErrors(['errors' => $exception->getMessage()]);

        }


    }


    public function delete($id){

        try {

            $room_service = RoomService::findOrFail($id);
            $room_service->delete();

            return redirect()->back()->with('delete', __('hotels.service_room_delete'));

        }catch (\Exception $exception){


            return redirect()->back()->withErrors(['errors' => $exception->getMessage()]);

        }

    }
}