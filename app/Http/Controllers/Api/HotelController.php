<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelLoginRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Repositories\Api\HotelRepository;

class HotelController extends Controller
{

    public $hotelRepository;

    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    //method login of hotel-api
    public function login(HotelLoginRequest $request){


       return $this->hotelRepository->hotelLogin($request);

    }


    public function register(StoreHotelRequest $request){


        return $this->hotelRepository->hotelRegister($request);


    }


    //user logout in api
    public function logout(){

        return $this->hotelRepository->hotelLogout();

    }


}
