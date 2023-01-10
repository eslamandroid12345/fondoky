<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;

class Reservation extends Model
{
    use HasFactory;

    protected  $fillable = [

        'destination',
        'children',
        'adults',
        'check_in',
        'check_out',
        'num_of_nights',
        'room_number',
        'user_id',
        'room_id',
        'hotel_id',
        'rate',
        'vat_tax',
        'municipal_tax',
        'tourism_tax',
        'total',
        'total_all',
        'commission',
        'stayed',
        'status'
    ];

    public function user(){

        return $this->belongsTo(User::class,'user_id','id');

    }

    public function room(){

        return $this->belongsTo(Room::class,'room_id','id');

    }

    public function hotel(){

        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }

    public function cancel(){

        return $this->status == true ? __('book.status') : __('book.cancel');
   }

    public function stay(){

        return $this->stayed == true ? __('book.stay') : __('book.not_stay');
    }


    public function scopeInvoicesReservation($query,$month,$year){

        return $query->with(['hotel','user:id,name,phone','room:id,room_type'])->where('hotel_id','=',auth('hotel')->id())->whereMonth('check_in',$month)
            ->whereYear('check_in', $year);
    }


    public function scopeSumAmountOfCommissionEveryMonth($query,$month,$year){

        return $query->with(['hotel','user:id,name,phone','room:id,room_type'])->where('hotel_id','=',auth('hotel')->id())->whereMonth('check_in',$month)
                ->whereYear('check_in', $year)->sum('total');
    }

    public function scopeSumAmountOfTotalEveryMonth($query,$month,$year){

        return $query->with(['hotel','user:id,name,phone','room:id,room_type'])->where('hotel_id','=',auth('hotel')->id())->whereMonth('check_in',$month)
            ->whereYear('check_in', $year)->sum('commission');
    }
}
