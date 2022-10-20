<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomService extends Model
{
    use HasFactory;
    protected $table = 'room_services';

    protected $fillable = [

        'name',
        'hotel_id'

    ];



    public function hotel(){

        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }


    public function room(){


        return $this->belongsToMany(Room::class,'hotel_service_rooms','room_service_id','room_id','id','id')->withTimestamps();

    }
}
