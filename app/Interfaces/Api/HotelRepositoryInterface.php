<?php

namespace App\Interfaces\Api;
use App\Http\Requests\HotelLoginRequest;
use App\Http\Requests\StoreHotelRequest;
use Illuminate\Http\Request;

interface HotelRepositoryInterface
{

    public function hotelLogin(Request $request);
    public function hotelRegister(Request $request);
    public function hotelLogout();

}