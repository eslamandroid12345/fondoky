<?php

namespace App\Console\Commands;

use App\Models\Hotel;
use App\Models\User;
use Illuminate\Console\Command;

class ExpireHotels extends Command
{

    protected $signature = 'hotels:expires';

    protected $description = 'hotels expires every month';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $hotels = Hotel::where('blocked','=',1)->get();

        foreach ($hotels as $hotel){
//
//            $hotel->update([
//
//                'blocked' => 0
//
//            ]);
//
            $hotel->blocked = $hotel->blocked == 1 ? 0 : 1;

        }
    }
}
