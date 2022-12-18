<?php

namespace App\Console\Commands;

use App\Models\Hotel;
use App\Models\Invoice;
use Illuminate\Console\Command;

class ExpireHotels extends Command
{

    protected $signature = 'hotels:expires';

    protected $description = 'hotels expires every month';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle(){

        $hotels = Hotel::whereHas('invoices', function ($invoice){

            $invoice->where('date_of_end','=', Carbon::now()->format('Y-m-d'))->where('status','=','not_paid')->where('amount','>',0);

        })->where('blocked','=',1)->pluck('id');

        foreach ($hotels as $id){

            Hotel::where('id','=',$id)->update([

                'blocked' => 0
            ]);
        }


    }
}
