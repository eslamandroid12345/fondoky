<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourismPlace extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'images',
        'location_ar',
        'location_en',
        'description',
        'city_id'

    ];


    public function city(){

        return $this->belongsTo(City::class,'city_id','id');
    }
}
