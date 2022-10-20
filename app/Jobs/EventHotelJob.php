<?php

namespace App\Jobs;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EventHotelJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public $check_in;
    public $check_out;
    public $room_id;
    public $room_number;
    public $room_price;


    public function __construct($check_in,$check_out,$room_id,$room_number,$room_price)
    {
        $this->check_in = $check_in;
        $this->check_out = $check_out;
        $this->room_id = $room_id;
        $this->room_number = $room_number;
        $this->room_price = $room_price;
    }

    public function handle()
    {
        $begin = new \DateTime($this->check_in);
        $end   = new \DateTime($this->check_out);


        $different = $begin->diff($end);
        $days = $different->format('%a');//now do whatever you like with $days

        for($i = $begin; $i <= $end  ; $i->modify('+1 day')) {


            $event = new Event();
            $event->room_id = $this->room_id;
            $event->room_number = $this->room_number;
            $event->room_price = $this->room_price;
            $event->check_in = $i->format("Y-m-d");
            $event->check_out = $i->modify('+1 day')->format("Y-m-d");
            $event->save();
            if ($days > 1) {
                $i->modify('-1 day')->format("Y-m-d");
            }

        }
    }
}
