<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{

    public function boot(){

        Broadcast::routes(["middleware" => ["web","auth:hotel"]]);

        require base_path('routes/channels.php');
    }
}
