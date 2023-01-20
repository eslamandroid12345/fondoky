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

        $this->middleware('check:hotel-api')->only('updateProfile', 'logout', 'reservations', 'getProfile');
        $this->hotelInterface = $hotelInterface;

    }

    //method login of hotel-api
    public function login(Request $request)
    {


        return $this->hotelInterface->hotelLogin($request);

    }


    public function register(Request $request)
    {


        return $this->hotelInterface->hotelRegister($request);


    }

    public function getProfile(Request $request)
    {

        return $this->hotelInterface->getProfile($request);
    }

    public function updateProfile(Request $request)
    {

        return $this->hotelInterface->updateProfile($request);
    }

    public function reservations()
    {

        return $this->hotelInterface->reservations();
    }


    //user logout in api
    public function logout()
    {

        return $this->hotelInterface->hotelLogout();

    }


}
