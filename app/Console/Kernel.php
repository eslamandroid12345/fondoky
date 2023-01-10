<?php

namespace App\Console;

use App\Console\Commands\ExpireHotels;
use App\Console\Commands\HotelInvoicesMonthly;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel{

    protected $commands = [ExpireHotels::class,HotelInvoicesMonthly::class];

    protected function schedule(Schedule $schedule){

        $schedule->command('hotels:expires')->weekly();
        $schedule->command('hotels:invoices')->everyMinute();

    }

    protected function commands(){

        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
