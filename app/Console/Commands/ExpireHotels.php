<?php

namespace App\Console\Commands;

use App\Models\Hotel;
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
        $hotels_ids = Hotel::where('blocked','=',1)->pluck('id');

        foreach ($hotels_ids as $id){

            Hotel::where('id','=',$id)->update([

                'blocked' => 0

            ]);


        }
    }
}
