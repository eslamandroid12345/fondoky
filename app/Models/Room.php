<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

        'room_type',
        'hotel_id',
        'room_description',
        'adults_max',
        'child_max',
        'images',
        'slug',
        'smoke',

    ];

    protected $dates = ['deleted_at'];



    public function roomStatus(){


        return $this->room_number == 0 ? 'completed' : $this->room_number;
    }




    public function calendars(){


        return $this->hasMany(Event::class, 'room_id', 'id');

    }


    public function roomService(){


        return $this->belongsToMany(RoomService::class,'hotel_service_rooms','room_id',  'room_service_id','id','id')->withTimestamps();

    }



    public function smokeStatus(){

        return $this->smoke == true ? 'مسموح بالتدخين' : 'غير مسموح بالتدخين';

    }




    public function reservation(){

        return $this->hasMany(Reservation::class,'room_id','id');

    }



    public function hotel(){

        return $this->belongsTo(Hotel::class,'hotel_id','id');

    }




}
