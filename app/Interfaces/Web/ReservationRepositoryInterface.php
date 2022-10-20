<?php

namespace App\Interfaces\Web;


use App\Http\Requests\StoreReservationRequest;
use Illuminate\Http\Request;

interface ReservationRepositoryInterface{


    public function store(StoreReservationRequest $request,$id);
    public function cancel($id);


}