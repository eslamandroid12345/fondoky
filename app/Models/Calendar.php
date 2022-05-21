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


    //start calendar of hotel
//->where('check_out','<=',$end)
//    public function hotel()
//    {
//        return $this->hasOneThrough(Hotel::class, Room::class, 'id', 'id');
//    }


//whereRaw(DB::raw("$end BETWEEN `check_in` AND `check_out` "))
//->orWherebetween('check_in', [$start,$end])
//->whereDate('check_in','!=',$end)




//
//    public function scopeCheckDate($start, $end){
//
//        return $this->whereDate('check_in','<=',$start)->whereDate('check_out','>=',$end)
//            ->orWherebetween('check_in', [$start,$end])
//
//            ->whereDate('check_in','!=',$end);
//    }
//
//    public function scopeSelectTotal($query, $start, $end){
//
//        $query->
//        whereDate('check_in','<=',$start)->whereDate('check_out','>=',$end)
//            ->orWherebetween('check_in', [$start,$end])
//
//            ->whereDate('check_in','!=',$end)
//            ->select('id','room_id','check_in','check_out',
//                DB::raw('SUM(room_price)  as total_room_price'),
//                DB::raw('SUM(days)  as calendars_sum_days'),
//                DB::raw('Count(id) as total_calendar'),
//                )->groupBy('room_id');
//    }




    public function scopeCheckDate($start, $end){

        return $this

            ->whereDate('check_in','<=',$start)
            ->whereDate('check_out','>=',$end)
            ->orWherebetween('check_in', [$start,$end])
            ->where('check_out','<=',$end)
            ->whereDate('check_in','!=',$end);
    }

    public function scopeSelectTotal($query, $start, $end){

        $query

            ->whereDate('check_in','<=',$start)
            ->whereDate('check_out','>=',$end)
            ->orWherebetween('check_in', [$start,$end])
            ->where('check_out','<=',$end)
            ->whereDate('check_in','!=',$end)


            ->select('id','room_id','check_in','check_out',
                DB::raw('SUM(room_price)  as total_room_price'),
                DB::raw('Count(id) as total_calendar'),
                )->groupBy('room_id');
    }



//    public function scopeCheckDate($start, $end){
//
//        return $this
//
//            ->where([
//
//                ['check_out', '!=', $start]
//            ])//==============
//
//           ->where([
//                ['check_in', '<=', $start],
//                ['check_out', '>=', $start]
//            ])
//
//
//            ->orWhere([
//                    ['check_in', '<', $end],
//                    ['check_out', '>=', $end]
//                ])
//
//                ->orWhere([
//                    ['check_in', '>=', $start],
//                    ['check_out', '<', $end]
//                ])
//
//            ->whereBetween('check_in', [$start, $end])
//            ->orWhereBetween('check_out', [$start, $end])
//            ->whereNotBetween('check_out', [$start, $end]);
//    }
//
//    public function scopeSelectTotal($query, $start, $end){
//
//              $query
//
//                  ->where([
//
//                      ['check_out', '!=', $start]
//                  ])
//
//                  ->where([
//                      ['check_in', '<=', $start],
//                      ['check_out', '>=', $start]
//                  ])
//
//
//                  ->orWhere([
//                      ['check_in', '<', $end],
//                      ['check_out', '>=', $end]
//                  ])
//                  ->orWhere([
//                      ['check_in', '>=', $start],
//                      ['check_out', '<', $end]
//                  ])
//                  ->whereBetween('check_in', [$start, $end])
//                  ->orWhereBetween('check_out', [$start, $end])
//                  ->whereNotBetween('check_out', [$start, $end])
//
//
//                  ->select('id','room_id','check_in','check_out',
//            DB::raw('SUM(room_price)  as total_room_price'),
//                      DB::raw('SUM(days)  as calendars_sum_days'),
//            DB::raw('Count(id) as total_calendar'),
//            )->groupBy('room_id');
//    }

}
