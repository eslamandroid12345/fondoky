<?php


namespace App\Repositories\Web;
use App\Http\Requests\StoreRoomServiceRequest;
use App\Interfaces\Web\RoomServiceRepositoryInterface;
use App\Models\RoomService;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RoomServiceRepository implements RoomServiceRepositoryInterface
{


    public function index()
    {

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

                toastSuccess(__('hotels.service_room_create'));
                return redirect()->back();

            } catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }



    public function edit($id){


        $room_service = RoomService::findOrFail($id);

        Gate::authorize('edit-service',$room_service);
        return view('room_services.edit',compact('room_service'));

    }

    public function update(StoreRoomServiceRequest $request, $id){


        try {


              $room_service = RoomService::findOrFail($id);
              $room_service->name = $request->name;
              $room_service->hotel_id = $request->hotel_id;
              $room_service->save();

              toastSuccess(__('hotels.service_room_update'));
              return redirect()->route('room-services.index');


        } catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }


    public function delete($id){

        try {

            $room_service = RoomService::findOrFail($id);
            $room_service->delete();

            toastError(__('hotels.service_room_delete'));
            return redirect()->back();

        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }

    }
}