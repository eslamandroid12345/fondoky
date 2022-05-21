<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [

        'hotel_id',
        'booker_id',
        'total',
        'commission',
        'blocked',
        'canceled',


    ];


    public function booker(){

        return $this->belongsTo(Booker::class,'booker_id','id');
    }

    public function hotel(){

    return $this->belongsTo(Hotel::class,'hotel_id','id');
   }


    public function block(){


        return $this->blocked == 1 ? 'show' : 'notShow';
    }
}
