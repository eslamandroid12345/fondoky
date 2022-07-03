<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = [

         'name',
        'image',
        'address',
        'national_id',
        'job_description',
        'phone',
        'salary',
        'notes',
        'works_from',
        'works_to',
        'rate',
        'created_by',
        'hotel_id',
        'department_id'

    ];



    public function department(){

        return $this->belongsTo(Department::class, 'department_id','id');
    }



    public function hotel(){

        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }
}


