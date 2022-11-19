<?php

namespace App\Repositories\Web;
use App\Events\NewReservation;
use App\Http\Requests\StoreReservationRequest;
use App\Interfaces\Web\ReservationRepositoryInterface;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ReservationRepository implements ReservationRepositoryInterface{


    public function store(StoreReservationRequest $request, $id)
    {

        try {


            DB::beginTransaction();

            $reservation = Reservation::create([

            'destination' => $request->destination,
            'children' => $request->children,
            'adults' => $request->adults,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'room_number' => $request->room_number,
            'num_of_nights' => $request->num_of_nights,
            'room_id' => $request->room_id,
            'user_id' => auth()->id(),
            'hotel_id' => $request->hotel_id,
            'vat_tax' =>$request->vat_tax,
            'municipal_tax' => $request->municipal_tax,
            'tourism_tax' => $request->tourism_tax,
            'total_all' => $request->total_all,
            'total' => $request->total,
            'commission' => $request->commission,

            ]);


            $calendars = Event::whereBetween('check_in',[$request->check_in,$request->check_out])->whereDate('check_in','!=',$request->check_out)->where('room_id','=',$id)->get();

            foreach ($calendars as $calendar) {

                $calendar->decrement('room_number', $request->room_number);
                $calendar->update();

            }


            DB::commit();
            event(new NewReservation($request->hotel_id,$reservation));


        }catch (\Exception $exception){

            DB::rollBack();

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }

        toastSuccess(__('users.booking'));
        return redirect()->route('home');


    }


    public function cancel($id){

        try {

            $reservation = Reservation::findOrFail($id);
            $reservation->update([

            'status' => $reservation->status == 1 ? 0 : 1,
            'vat_tax' => 0,
            'municipal_tax' => 0,
            'tourism_tax' => 0,
            'total_all' => 0,
            'total' => 0,
            'commission' => 0,
            'stayed' => 0,
            ]);

        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }

        toastSuccess(__('users.canceled'));
        return redirect()->back();

    }
}