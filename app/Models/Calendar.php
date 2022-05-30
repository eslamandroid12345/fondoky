<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Calendar extends Model
{
    use HasFactory;



    protected $fillable = [

        'room_id',
        'room_number',
        'check_in',
        'check_out',
        'room_price',
        'days'

    ];




    public function room(){

        return $this->belongsTo(Room::class,'room_id','id');
    }

    public function hotel(){

        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }


}
