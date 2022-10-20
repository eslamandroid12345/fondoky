<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Hotel extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [

        'manger',
        'name_ar',
        'name_en',
        'email',
        'password',
        'location_ar',
        'location_en',
        'currency_ar',
        'currency_en',
        'description',
        'hotel_photos',
        'phone_hotel',
        'slug',
        'blocked',

    ];

    protected $dates = ['deleted_at'];



    public function room(){

        return $this->hasMany(Room::class, 'hotel_id', 'id');
    }



    public function getJWTIdentifier(){

        return $this->getKey();
    }

    public function getJWTCustomClaims(){

        return [];
    }


    public function service(){

        return $this->hasOne(Service::class, 'hotel_id', 'id');

    }


    public function active(){

        return $this->blocked == 1 ? __('data.status_one') : __('data.status_two');
    }




    public function rate(){

        return $this->hasMany(Rate::class,'hotel_id','id');
    }


    public function comment(){

        return $this->hasMany(Comment::class,'hotel_id','id');
    }





    public function roomService(){

        return $this->hasMany(RoomService::class,'hotel_id','id');
    }





    public  function reservations(){

        return $this->hasMany(Reservation::class,'hotel_id','id');

    }




}

