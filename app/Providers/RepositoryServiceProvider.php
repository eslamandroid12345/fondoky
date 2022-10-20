<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\Api\HotelRepositoryInterface;
use App\Interfaces\Api\UserRepositoryInterface;
use App\Interfaces\Web\AdminRepositoryInterface;
use App\Interfaces\Web\CommissionRepositoryInterface;
use App\Interfaces\Web\EventRepositoryInterface;
use App\Interfaces\Web\HotelServiceRoomRepositoryInterface;
use App\Interfaces\Web\ReservationRepositoryInterface;
use App\Interfaces\Web\RoleRepositoryInterface;
use App\Interfaces\Web\RoomRepositoryInterface;
use App\Interfaces\Web\RoomServiceRepositoryInterface;
use App\Interfaces\Web\ServiceRepositoryInterface;
use App\Repositories\Api\HotelRepository;
use App\Repositories\Api\UserRepository;
use App\Repositories\Web\AdminRepository;
use App\Repositories\Web\CommissionRepository;
use App\Repositories\Web\EventRepository;
use App\Repositories\Web\HotelServiceRoomRepository;
use App\Repositories\Web\ReservationRepository;
use App\Repositories\Web\RoleRepository;
use App\Repositories\Web\RoomRepository;
use App\Repositories\Web\RoomServiceRepository;
use App\Repositories\Web\ServiceRepository;
use App\Interfaces\Api\RoleRepositoryInterface as RoleRepositoryInterfaceApi;
use App\Repositories\Api\RoleRepository as RoleRepositoryApi;
use App\Interfaces\Api\AdminRepositoryInterface as AdminRepositoryInterfaceApi;
use App\Repositories\Api\AdminRepository as AdminRepositoryApi;
use App\Interfaces\Web\HotelRepositoryInterface as HotelRepositoryInterfaceWeb;
use App\Repositories\Web\HotelRepository as HotelRepositoryWeb;
use App\Interfaces\Web\UserRepositoryInterface as UserRepositoryInterfaceWeb;
use App\Repositories\Web\UserRepository as UserRepositoryWeb;


class RepositoryServiceProvider extends ServiceProvider{


    public function register(){


        //Api repositories
        $this->app->bind(HotelRepositoryInterface::class,HotelRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
        $this->app->bind(RoleRepositoryInterfaceApi::class,RoleRepositoryApi::class);
        $this->app->bind(AdminRepositoryInterfaceApi::class,AdminRepositoryApi::class);


        //web repositories
        $this->app->bind(HotelRepositoryInterfaceWeb::class,HotelRepositoryWeb::class);
        $this->app->bind(AdminRepositoryInterface::class,AdminRepository::class);
        $this->app->bind(RoleRepositoryInterface::class,RoleRepository::class);
        $this->app->bind(RoomRepositoryInterface::class,RoomRepository::class);
        $this->app->bind(UserRepositoryInterfaceWeb::class,UserRepositoryWeb::class);
        $this->app->bind(ServiceRepositoryInterface::class,ServiceRepository::class);
        $this->app->bind(CommissionRepositoryInterface::class,CommissionRepository::class);
        $this->app->bind(EventRepositoryInterface::class,EventRepository::class);

        //Repository pattern of room service
        $this->app->bind(RoomServiceRepositoryInterface::class,RoomServiceRepository::class);
        $this->app->bind(HotelServiceRoomRepositoryInterface::class,HotelServiceRoomRepository::class);
        $this->app->bind(ReservationRepositoryInterface::class,ReservationRepository::class);

    }


}
