<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelServiceRoom extends Model
{
    use HasFactory;
    protected $table = 'hotel_service_rooms';

    protected $fillable = [

        'room_id',
        'room_service_id'


    ];


}

