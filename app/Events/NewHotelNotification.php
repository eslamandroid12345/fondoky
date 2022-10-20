<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewHotelNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $name_ar;
    public $email;
    public $date;


    public function __construct($data = [])
    {
        $this->name_ar = $data['name_ar'];
        $this->email = $data['email'];
        $this->date = Carbon::createFromDate()->format('Y-m-d');

    }


    public function broadcastOn()
    {
        return new Channel('hotel');
    }
}
