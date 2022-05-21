<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booker extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

        'city_to',
        'children',
        'adults',
        'room_type',
        'room_number',
        'room_price',
        'date_arrive',
        'date_leave',
        'user_id',
        'hotel_id',
        'blocked',
        'canceled',
        'vat_tax',
        'municipal_tax',
        'tourism_tax',
        'total_all',
        'total',
        'commission',
        'num_of_nights',
        'stayed',
        'rate'

    ];


    protected $dates = ['deleted_at'];



    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }


    public function hotel(){

        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }




    public function cancel(){


        return $this->canceled == 1 ? 'active' : 'canceled';
    }


    public function block(){


        return $this->blocked == 1 ? 'show' : 'notShow';
    }


    public function stay(){


        return $this->stayed == 1 ? 'stay' : 'leave';
    }



    //report of booker
    public function report(){

        return $this->hasOne(Report::class,'booker_id','id');
    }



}


