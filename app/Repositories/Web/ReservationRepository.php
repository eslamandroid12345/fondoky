<?php

namespace App\Repositories\Web;
use App\Events\NewReservation;
use App\Interfaces\Web\ReservationRepositoryInterface;
use App\Models\InvoiceGuest;
use App\Models\Reservation;
use App\Models\ReservedRoom;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationRepository implements ReservationRepositoryInterface{


    public function store(Request $request, $id)
    {
        // TODO: Implement store() method.


        try {


            DB::beginTransaction();

            $reservation = new Reservation();
            $reservation->destination = $request->destination;
            $reservation->children = $request->children;
            $reservation->adults = $request->adults;
            $reservation->check_in = $request->check_in;
            $reservation->check_out = $request->check_out;
            $reservation->num_of_nights = $request->num_of_nights;
            $reservation->user_id = auth()->id();
            $reservation->save();


            $reserved_room = new ReservedRoom();
            $reserved_room->room_number = $request->room_number;
            $reserved_room->reservation_id = $reservation->id;
            $reserved_room->room_id = $request->room_id;
            $reserved_room->save();


            $invoice_guest = new InvoiceGuest();
            $invoice_guest->vat_tax = $request->vat_tax;
            $invoice_guest->municipal_tax = $request->municipal_tax;
            $invoice_guest->tourism_tax = $request->tourism_tax;
            $invoice_guest->total_all = $request->total_all;
            $invoice_guest->total = $request->total;
            $invoice_guest->commission = $request->commission;
            $invoice_guest->user_id = auth()->id();
            $invoice_guest->hotel_id = $request->hotel_id;
            $invoice_guest->reservation_id = $reservation->id;
            $invoice_guest->reserved_room_id = $reserved_room->id;
            $invoice_guest->save();


            //step number 3
            $start = Carbon::parse($request->check_in)->format('Y-m-d');
            $end = Carbon::parse($request->check_out)->format('Y-m-d');


            //step number 4
            $calendars = Room::findOrFail($id)->calendars()
                ->whereDate('check_in','<=',$start)->whereDate('check_out','>=',$end)->orWhereBetween('check_in',[$start,$end])
                ->whereDate('check_in','!=',$end)
                ->where('room_id','=',$id)->get();


            //step number 5
            foreach ($calendars as $calendar) {

                $calendar->decrement('room_number', $request->room_number);
                $calendar->update();

            }


            DB::commit();

            event(new NewReservation($invoice_guest->hotel_id,$reservation));


        }catch (\Exception $exception){

            DB::rollBack();

            return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);

        }

        return redirect()->route('home')->with('success',__('users.booking'));


    }


    public function cancel($id){

        // TODO: Implement cancel() method.
        try {

            $invoice = InvoiceGuest::findOrFail($id);
            $invoice->canceled = $invoice->canceled == 1 ? 0 : 1;
            $invoice->vat_tax = 0;
            $invoice->municipal_tax = 0;
            $invoice->tourism_tax = 0;
            $invoice->total_all = 0;
            $invoice->total = 0;
            $invoice->commission = 0;
            $invoice->blocked = 0;
            $invoice->stayed = 0;
            $invoice->save();


        }catch (\Exception $exception){

            return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);

        }

        return redirect()->back()->with('canceled',__('users.canceled'));

    }
}