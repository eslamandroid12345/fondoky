<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model{

    use HasFactory;
    use SoftDeletes;

    protected $table = 'invoices';
    protected $fillable = [

        'invoice_number',
        'from',
        'to',
        'date_of_start',
        'date_of_end',
        'amount',
        'description',
        'bank_account',
        'month',
        'year',
        'status',
        'hotel_id',
        'total'

    ];

    protected $dates = ['deleted_at'];

    public function hotel(){
        return $this->belongsTo(Hotel::class,'hotel_id','id');
    }


    public function invoicesStatus(){

        return $this->status == 'paid' ? trans('hotels.paid') : trans('hotels.not_paid');
    }
}

