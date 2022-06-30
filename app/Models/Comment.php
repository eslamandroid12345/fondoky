<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [

      'comment',
      'hotel_id',
      'user_id',

    ];


    public function user(){

        return $this->belongsTo(User::class,'user_id','id');
    }



    public function hotel(){

        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }

}
