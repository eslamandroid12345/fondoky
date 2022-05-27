<?php

namespace App\Providers;

use App\Interfaces\Api\HotelInterface;
use App\Repositories\Api\HotelRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {


        //Api repositories
        $this->app->bind(HotelInterface::class,HotelRepository::class);
    }


    public function boot()
    {
        //
    }
}
