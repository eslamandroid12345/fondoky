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
        'user_id',

    ];


    //user relation

    public function user(){

        return $this->belongsTo(User::class,'user_id','id');

    }




    //reserved relation

    public function reserved_room()
    {

        return $this->hasOne(ReservedRoom::class, 'reservation_id', 'id');
    }



        //invoice guest

        public function invoice_guset(){

            return $this->hasOne(InvoiceGuest::class,'reservation_id','id');


        }



}
