<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
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

            abort('403','غير مصرح لك بالدخول لتك الصفحه');
        }


    }

    public function show(Room $room){

        if($room->hotel_id == hotel()->id) {

            return view('rooms.show', compact('room'));

        }else{

            abort('403','غير مصرح لك بالدخول لتك الصفحه');

            }
    }



    public function store(Request $request){


        $rules = [

            'room_type_id' => 'required',
            'room_description' => 'required',
            'adults_max' => 'required|integer',
            'images' => 'required',



        ];


        $messages = [


            'room_type_id.required' => __('room.room_type'),
            'room_description.required' => __('room.room_description'),
            'adults_max.required' => __('room.adults_max'),
            'adults_max.integer' => __('room.adults_int'),
            'images.required' => __('room.images'),


        ];


        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }



        $data = [];//empty array
        if($request->hasfile('images'))
        {

            foreach($request->file('images') as $image)
            {
                $name= time() . '.' . $image->getClientOriginalName();
                $image->move(public_path().'/rooms/', $name);
                $data[] = $name;
            }
        }


        $room = Room::create([

            'room_type_id' => $request['room_type_id'],
            'room_description' => $request['room_description'],
            'adults_max' => $request['adults_max'],
            'child_max' => $request['child_max'],
            'images' => json_encode($data),
            'hotel_id' => hotel()->id,

        ]);


        return redirect()->route('rooms.index')->with('room',__('room.create'));


    }


    public function update(Request $request,$id){


        $rules = [

            'room_type_id' => 'required',
            'room_description' => 'required',
            'adults_max' => 'required|integer',
            'images' => 'required',



        ];


        $messages = [


            'room_type_id.required' => __('room.room_type'),
            'room_description.required' => __('room.room_description'),
            'adults_max.required' => __('room.adults_max'),
            'adults_max.integer' => __('room.adults_int'),
            'images.required' => __('room.images'),


        ];



        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }



        $room = Room::find($id);


        $data = [];//empty array
        if($request->hasfile('images'))
        {

            foreach($request->file('images') as $image)
            {
                $name= time() . '.' . $image->getClientOriginalName();
                $image->move(public_path().'/rooms/', $name);
                $data[] = $name;
            }
        }



        //to remove all old rooms images from public folder
        $images = json_decode($room->images);
        foreach ($images as $image){

            unlink(public_path('rooms/') . $image);

        }

        $room->update([


            'room_type_id' => $request['room_type_id'],
            'room_description' => $request['room_description'],
            'adults_max' => $request['adults_max'],
            'child_max' => $request['child_max'],
            'images' => json_encode($data),
            'hotel_id' => hotel()->id,

            ]);


        return redirect()->route('rooms.index')->with('room_update',__('room.room_update'));



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
