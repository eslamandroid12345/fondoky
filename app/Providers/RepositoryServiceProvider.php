<?php

namespace App\Providers;

use App\Interfaces\Api\HotelRepositoryInterface;
use App\Repositories\Api\HotelRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {


        //Api repositories
        $this->app->bind(HotelRepositoryInterface::class,HotelRepository::class);
    }


    public function boot()
    {
        //
    }
}
