<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';
    protected $fillable = [

        'name',
        'hotel_id'

    ];



    public function hotel(){

        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }


    public function employee(){

        return $this->hasMany(Employee::class,'department_id','id');
    }


}
