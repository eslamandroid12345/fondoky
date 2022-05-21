<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [

        'name',
        'image',
        'address',
        'national_id',
        'salary',
        'role_name',
        'day_of_money',
        'phone',
        'hotel_id'
    ];


    public function hotel(){


        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }
}
;
