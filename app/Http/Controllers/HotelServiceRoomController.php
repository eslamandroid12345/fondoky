<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotelRoomServiceRequest;
use App\Interfaces\Web\HotelServiceRoomRepositoryInterface;


class HotelServiceRoomController extends Controller
{

    public $hotelServiceRoomRepositoryInterface;

    public function __construct(HotelServiceRoomRepositoryInterface $hotelServiceRoomRepositoryInterface){


        $this->hotelServiceRoomRepositoryInterface = $hotelServiceRoomRepositoryInterface;

    }

    public function create(){


        return $this->hotelServiceRoomRepositoryInterface->create();

    }


    public function store(StoreHotelRoomServiceRequest $request){


      return $this->hotelServiceRoomRepositoryInterface->store($request);


    }

}
