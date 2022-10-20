<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewReservation implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $hotel_id;
    public $data;

    public function __construct($hotel_id,$data)
    {

        $this->hotel_id = $hotel_id;
        $this->data = $data;


    }


    public function broadcastOn()
    {
        return new PrivateChannel('new-reservations.'.$this->hotel_id);
    }


    public function broadcastAs()
    {
        return 'new-reservations-event';
    }
}
