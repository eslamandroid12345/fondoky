<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Supervisor extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $table = 'supervisors';
    protected $fillable = [


        'name',
        'email',
        'password',
        'address',
        'image',
        'phone',
        'num_of_branches',
        'status',
        'admin_id'

    ];


    public function getJWTIdentifier(){

        return $this->getKey();
    }

    public function getJWTCustomClaims(){

        return [];
    }

    public function admin(){

        return $this->belongsTo(Admin::class,'admin_id','id');
    }


    public function status(){

        return $this->status == true ? 'مفعل' : 'غير مفعل';
    }

}


