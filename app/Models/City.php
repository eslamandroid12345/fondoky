<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['name','country_id'];

    public function country(){

        return $this->belongsTo(Country::class,'country_id','id');
    }

    public function tourism_places(){

        return $this->hasMany(TourismPlace::class,'city_id','id');
    }
}
