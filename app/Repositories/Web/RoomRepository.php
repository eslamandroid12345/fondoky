<?php


namespace App\Repositories\Web;


use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Interfaces\Web\RoomRepositoryInterface;
use App\Models\Room;
use App\Models\RoomType;


class RoomRepository implements RoomRepositoryInterface
{

    public function index(){

        $rooms = Room::with(['room_type'])->where('hotel_id','=',hotel()->id)->latest()->simplePaginate(Max);
        return view('rooms.index',compact('rooms'));


    }


    public function create(){

        $room_types = RoomType::with('hotel')->where('hotel_id','=',hotel()->id)->latest()->select(['id','room_type'])->get();

        return view('rooms.create',compact('room_types'));
    }



    public function edit(Room $room){


        if($room->hotel_id == hotel()->id){

            $room_types = RoomType::with('hotel')->where('hotel_id','=',hotel()->id)->latest()->select(['id','room_type'])->get();
            return view('rooms.edit',compact('room','room_types'));

        }else{

            return view('404');
        }


    }

    public function show(Room $room){

        if($room->hotel_id == hotel()->id) {

            return view('rooms.show', compact('room'));

        }else{

            return view('404');

        }
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
            $room->room_type_id = $request->room_type_id;
            $room->room_description = $request->room_description;
            $room->adults_max = $request->adults_max;
            $room->child_max = $request->child_max;
            $room->images = json_encode($data);
            $room->hotel_id = hotel()->id;
            $room->save();


            return redirect()->route('rooms.index')->with('room',__('room.create'));


        }catch (\Exception $exception){

            return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);

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
            }


            //to remove all old rooms images from public folder
            $images = json_decode($room->images);
            foreach ($images as $image){

                unlink(public_path('rooms/') . $image);

            }


            $room->room_type_id = $request->room_type_id;
            $room->room_description = $request->room_description;
            $room->adults_max = $request->adults_max;
            $room->child_max = $request->child_max;
            $room->images = json_encode($data);
            $room->hotel_id = hotel()->id;
            $room->save();


            return redirect()->route('rooms.index')->with('room_update',__('room.room_update'));


        }catch (\Exception $exception){

            return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);

        }


    }



    public function delete($id)
    {

        $room = Room::findOrFail($id);

        //to remove all old rooms images from public folder
        $images = json_decode($room->images);
        foreach ($images as $image){

            unlink(public_path('rooms/') . $image);

        }

        $room->delete();

        return redirect()->route('rooms.index')->with('delete', __('room.delete'));


    }


    public function calendarsShow($id){


        $calendars = Room::where('hotel_id',hotel()->id)->findOrFail($id)->calendars()->simplePaginate(Max);

        return view('rooms.calendars',compact('calendars'));
    }


}