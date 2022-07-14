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

        'country_ar',
        'country_en',
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




    public function room_type(){

        return $this->hasMany(RoomType::class, 'hotel_id', 'id');
    }


    //return calendars for hotel through rooms

    public  function calendar(){

        return $this->hasManyThrough(Calendar::class, Room::class,'hotel_id', 'room_id', 'id', 'id')->orderBy('id','DESC');//get all calendars of hotel with hasManyThrough
    }




    public function rate(){

        return $this->hasMany(Rate::class,'hotel_id','id');
    }


    public function comment(){

        return $this->hasMany(Comment::class,'hotel_id','id');
    }



    public function payment(){

        return $this->hasMany(Payment::class,'hotel_id','id');
    }


    public function department(){

        return $this->hasMany(Department::class,'hotel_id','id');
    }


    public function employee(){

        return $this->hasMany(Employee::class,'hotel_id','id');
    }




    public function roomService(){

        return $this->hasMany(RoomService::class,'hotel_id','id');
    }




    //invoice guest

    public function invoice_guset(){

        return $this->hasMany(InvoiceGuest::class,'hotel_id','id');

    }





}

