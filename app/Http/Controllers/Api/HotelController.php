<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HotelLoginRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Interfaces\Api\HotelRepositoryInterface;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    public $hotelInterface;

    public function __construct(HotelRepositoryInterface $hotelInterface)
    {
        $this->hotelInterface = $hotelInterface;

    }

    //method login of hotel-api
    public function login(Request $request){


        return $this->hotelInterface->hotelLogin($request);

    }


    public function register(Request $request){


        return $this->hotelInterface->hotelRegister($request);


    }


    //user logout in api
    public function logout(){

        return $this->hotelInterface->hotelLogout();

    }


}