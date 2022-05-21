<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $table = 'room_types';

    protected $fillable = ['room_type','hotel_id'];

    public function room(){


        return $this->hasMany(Room::class,'room_type_id','id');
    }


    public function hotel(){

        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }

}
