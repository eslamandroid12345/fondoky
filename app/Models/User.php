<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;
    protected $fillable = [

        'name',
        'email',
        'password',
        'phone',
        'blocked',

    ];


   protected $dates = ['deleted_at'];

    protected $hidden = [

        'password',
        'remember_token',
    ];


    protected $casts = [

        'email_verified_at' => 'datetime',
    ];


    public function active() : string{

        return $this->blocked == 1 ? __('users.act') : __('users.unAct');
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }



    public function rate(){

        return $this->hasOne(Rate::class,'user_id','id');
    }


    public function comment(){

        return $this->hasMany(Comment::class,'user_id','id');
    }

    //reservation relation

    public function reservation(){

        return $this->hasMany(Reservation::class,'user_id','id');
    }






}
