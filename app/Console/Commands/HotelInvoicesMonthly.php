<?php

namespace App\Console\Commands;

use App\Models\Hotel;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class HotelInvoicesMonthly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hotels:invoices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create invoice for hotel every month';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(){

        $hotels = Hotel::get();


        foreach ($hotels as $hotel){

            $commission = Reservation::where('hotel_id','=',$hotel->id)->whereMonth('check_in','=',date('m'));

            $hotel->invoices()->create([
                'invoice_number' => rand(15000,20000000) . uniqid(),
                'from' => Carbon::now()->firstOfMonth()->translatedFormat('l j F Y'),
                'to' => Carbon::now()->lastOfMonth()->translatedFormat('l j F Y'),
                'date_of_start' => Carbon::now()->startOfMonth()->toDateString(),
                'date_of_end' => Carbon::now()->endOfMonth()->addDays(14)->toDateString(),
                'amount' => $commission->sum('commission') > 0 ? $commission->sum('commission') : 0,
                'month' => date('m'),
                'year' => date('Y'),

            ]);
        }
    }
}
