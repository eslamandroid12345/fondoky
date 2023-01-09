<?php

namespace App\Console\Commands;

use App\Models\Hotel;
use App\Models\Invoice;
use Illuminate\Console\Command;

class ExpireHotels extends Command{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hotels:expires';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'hotels expires every month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle(){

        $ids = Hotel::whereHas('invoices', function ($invoice){

            $invoice->where('date_of_end','=', Carbon::now()->format('Y-m-d'))->where('status','=','not_paid')->where('amount','>',0);

        })->where('blocked','=',1)->pluck('id');

        Hotel::whereIn('id',$ids)->update(['blocked' => 0]);

    }
}
