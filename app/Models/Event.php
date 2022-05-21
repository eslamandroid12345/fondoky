<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    protected $table = 'events';
    protected $fillable = [

        'room_number',
        'room_price',
        'start',
        'end',
        'room_id'

    ];


    //event belongs to room

    public function room(){

        return $this->belongsTo(Room::class,'room_id');
    }
}
