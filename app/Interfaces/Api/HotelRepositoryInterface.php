<?php

namespace App\Interfaces\Api;
use App\Http\Requests\HotelLoginRequest;
use App\Http\Requests\StoreHotelRequest;
use Illuminate\Http\Request;

interface HotelRepositoryInterface
{

    public function hotelLogin(HotelLoginRequest $request);
    public function hotelRegister(StoreHotelRequest $request);
    public function hotelLogout();

}