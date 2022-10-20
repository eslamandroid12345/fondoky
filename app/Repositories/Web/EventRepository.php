<?php

namespace App\Repositories\Web;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Interfaces\Web\EventRepositoryInterface;
use App\Jobs\EventHotelJob;
use App\Models\Event;
use App\Models\Room;
use Symfony\Component\HttpFoundation\Response;

class EventRepository implements EventRepositoryInterface {




    public function store(StoreEventRequest $request){


        try {

            EventHotelJob::dispatch($request->check_in,$request->check_out,$request->room_id,$request->room_number,$request->room_price)->delay(now()->second(1));
            return redirect()->back()->with('create',__('event.create'));



        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }


    }


    public function create($id){


        $room = Room::findOrFail($id);
        return view('events.create',compact('room'));


    }


    public function edit($id){

        $event = Event::findOrFail($id);

        return view('events.edit',compact('event'));


    }


    public function update(UpdateEventRequest $request,$id){

        try {

            $event = Event::findOrFail($id);
            $event->room_number = $request->room_number;
            $event->room_price = $request->room_price;
            $event->save();

            return redirect()->back()->with('update',__('event.update'));


        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }


    }


    public function destroy($id){


        try {

            $event = Event::findOrFail($id);
            $event->delete();

            return redirect()->back()->with('delete',__('event.delete'));



        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }


    }
}