<?php


namespace App\Interfaces\Web;


use App\Http\Requests\StoreHotelRoomServiceRequest;

interface HotelServiceRoomRepositoryInterface
{


    public function create();
    public function store(StoreHotelRoomServiceRequest $request);

}