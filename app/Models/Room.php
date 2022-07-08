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

        'room_type_id',
        'room_description',
        'adults_max',
        'child_max',
        'images',
        'hotel_id'

    ];

    protected $dates = ['deleted_at'];

    public function hotel(){

        return $this->belongsTo(Hotel::class, 'hotel_id', 'id');
    }


    public function roomStatus(){


        return $this->room_number == 0 ? 'completed' : $this->room_number;
    }


    public function room_type(){

        return $this->belongsTo(RoomType::class, 'room_type_id', 'id');
    }


    public function calendars(){


        return $this->hasMany(Calendar::class, 'room_id', 'id')->orderBy('id','DESC');
    }


    //many to many relationship
    public function roomService(){


        return $this->belongsToMany(RoomService::class,'hotel_service_rooms','room_id',  'room_service_id','id','id')->withTimestamps();

    }



}
