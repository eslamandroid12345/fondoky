<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [

        'room_id',
        'room_number',
        'room_price',
        'check_in',
        'check_out',

    ];



    public function room(){

        return $this->belongsTo(Room::class,'room_id','id');
    }
}
