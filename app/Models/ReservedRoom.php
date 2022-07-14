<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservedRoom extends Model
{
    use HasFactory;


    protected $fillable = ['room_number','reservation_id','room_id'];

    //reservation relation

    public function reservation(){

        return $this->belongsTo(Reservation::class,'reservation_id','id');

    }


    //room relation

    public function room(){

        return $this->belongsTo(Room::class,'room_id','id');

    }


    //invoice guest

    public function invoice_guset(){

        return $this->hasOne(InvoiceGuest::class,'reserved_room_id','id');


    }

}
