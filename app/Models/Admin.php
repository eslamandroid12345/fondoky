<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;


class Admin extends Authenticatable implements JWTSubject
{
    use HasFactory;
    use SoftDeletes;


    protected $table ="admins";
    protected $fillable = [

        'name',
        'email',
        'password',
        'image',
        'phone',
        'role_id'

    ];
    protected $dates = ['deleted_at'];


    public function getJWTIdentifier(){

        return $this->getKey();
    }

    public function getJWTCustomClaims(){

        return [];
    }



    public function role(){


        return $this->belongsTo(Role::class,'role_id','id');
    }


    public function hasAbility($permissions){

        $role = $this->role;

        if(!$role){

            return false;

        }else{

            foreach (json_decode($role->permissions) as $permission){


                if(is_array($permissions) && in_array($permission,$permissions) || is_string($permissions) && strcmp($permissions,$permission) == 0){

                    return true;

                }

            }

            return false;
        }
    }


    public function payment(){

        return $this->hasMany(Payment::class,'admin_id','id');
    }



}
