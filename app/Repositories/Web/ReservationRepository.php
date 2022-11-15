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

            $reservation = new Reservation();
            $reservation->destination = $request->destination;
            $reservation->children = $request->children;
            $reservation->adults = $request->adults;
            $reservation->check_in = $request->check_in;
            $reservation->check_out = $request->check_out;
            $reservation->room_number = $request->room_number;
            $reservation->num_of_nights = $request->num_of_nights;
            $reservation->room_id = $request->room_id;
            $reservation->user_id = auth()->id();
            $reservation->hotel_id = $request->hotel_id;
            $reservation->vat_tax = $request->vat_tax;
            $reservation->municipal_tax = $request->municipal_tax;
            $reservation->tourism_tax = $request->tourism_tax;
            $reservation->total_all = $request->total_all;
            $reservation->total = $request->total;
            $reservation->commission = $request->commission;
            $reservation->save();


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
            $reservation->status = $reservation->status == 1 ? 0 : 1;
            $reservation->vat_tax = 0;
            $reservation->municipal_tax = 0;
            $reservation->tourism_tax = 0;
            $reservation->total_all = 0;
            $reservation->total = 0;
            $reservation->commission = 0;
            $reservation->stayed = 0;
            $reservation->save();


        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }

        toastSuccess(__('users.canceled'));
        return redirect()->back();

    }
}