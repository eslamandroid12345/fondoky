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



//    public function  scopeCheck($start,$end){
//
//
//        return $this->whereDate('check_in','<=',$start)->whereDate('check_out','>=',$end)
//            ->orWhereBetween('check_in',[$start,$end])
//            ->whereDate('check_in','!=',$end);
//
//    }
//
//
//    public function  scopeWith($start,$end){
//
//        return $this->whereDate('check_in','<=',$start)->whereDate('check_out','>=',$end)
//            ->orWhereBetween('check_in',[$start,$end])
//            ->whereDate('check_in','!=',$end)->select('id','room_id','room_number','check_in','check_out',
//                DB::raw('SUM(room_price)  as total_room_price'),
//                DB::raw('Count(id) as total_calendar'))->groupBy('room_id');
//
//
//
//    }
//
//
//
//    public function  scopeSum($start,$end){
//
//
//        return $this->whereDate('check_in','<=',$start)->whereDate('check_out','>=',$end)
//            ->orWhereBetween('check_in',[$start,$end])
//            ->whereDate('check_in','!=',$end);
//
//
//    }


}
