<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;


    protected $table = 'payments';
    protected $fillable = [

        'commission',
        'payment_transaction',
        'month',
        'year',
        'description',
        'admin_id',
        'description',
        'hotel_id'

    ];



    public function admin(){

        return $this->belongsTo(Admin::class,'admin_id','id');
    }



    public function hotel(){

        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }


    public function transaction(){

        return $this->payment_transaction == true ? 'مدفوع مسبقا' : 'غير مدفوع';


    }


}


