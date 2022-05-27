<?php

namespace App\Models;

use Database\Seeders\BookerSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Hotel extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [

        'country',
        'country_en',
        'manger',
        'name_ar',
        'name_en',
        'email',
        'password',
        'location_ar',
        'location_en',
        'pound',
        'description',
        'hotel_photos',
        'phone_hotel',
        'blocked',



    ];
    protected $dates = ['deleted_at'];



    public function booker(){

        return $this->hasMany(

            Booker::class,
            'hotel_id',
            'id'
        );
    }


    public function room(){

        return $this->hasMany(

            Room::class,
            'hotel_id',
            'id'
        );
    }



    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    public function service(){

        return $this->hasOne(

            Service::class,
            'hotel_id',
            'id'
        );

    }


    public function active(){

        return $this->blocked == 1 ? __('data.status_one') : __('data.status_two');
    }




    //start employee relation

    public function employee(){

        return $this->hasMany(

            Employee::class,
            'hotel_id',
            'id'
        );
    }



    public function room_type(){

        return $this->hasMany(

            RoomType::class,
            'hotel_id',
            'id'
        );
    }


    //return calendars for hotel through rooms

    public  function calendar(){

        return $this->hasManyThrough(Calendar::class,
            Room::class,'hotel_id',
            'room_id',
            'id',
            'id'
            )->with(['room.hotel'])->orderBy('id','DESC');//get all calendars of hotel with hasManyThrough
    }


    public function reports(){

        return $this->hasMany(Report::class,'hotel_id','id');
    }






}

