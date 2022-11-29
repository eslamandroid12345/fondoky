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
            toastr()->success(__('event.create'));
            return redirect()->back();



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
            $event->update([

               'room_number' => $request->room_number,
               'room_price' => $request->room_price
            ]);

            toastr()->success(__('event.update'));

            return redirect()->back();


        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }


    }


    public function destroy($id){


        try {

            $event = Event::findOrFail($id);
            $event->delete();

            toastr()->success(__('event.delete'));

            return redirect()->back();


        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        }


    }
}