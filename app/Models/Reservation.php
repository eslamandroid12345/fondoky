<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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




}
