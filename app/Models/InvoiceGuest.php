<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceGuest extends Model
{
    use HasFactory;


    protected $fillable = [


        'rate',
        'vat_tax',
        'municipal_tax',
        'tourism_tax',
        'total_all',
       'total',
       'stayed',
       'blocked',
       'canceled',
       'user_id',
       'hotel_id',
       'reservation_id',
       'reserved_room_id',
    ];


    //user relation

    public function user(){

        return $this->belongsTo(User::class,'user_id','id');

    }


    //hotel relation

    public function hotel(){

        return $this->belongsTo(Hotel::class,'hotel_id','id');

    }

    //reservation relation

    public function reservation(){

        return $this->belongsTo(Reservation::class,'reservation_id','id');

    }


    //reservation relation

    public function reserved_room(){

        return $this->belongsTo(ReservedRoom::class,'reserved_room_id','id');

    }


    public function stay() : string{

        return $this->stayed ==  true ? __('hotels.stayed') : __('hotels.leaved');

    }



    public function block() : string {

        return $this->blocked == true ? 'show' : 'notShow';

    }


    public function cancel() : string {


        return $this->canceled == true ? 'show' : 'notShow';

    }
}
