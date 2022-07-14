<?php

namespace App\Http\Controllers;

use App\Interfaces\Web\ReservationRepositoryInterface;
use Illuminate\Http\Request;

class ReservationController extends Controller{


    public $reservationRepositoryInterface;

    public function __construct(ReservationRepositoryInterface $reservationRepositoryInterface){

        $this->reservationRepositoryInterface = $reservationRepositoryInterface;

    }


    public function store(Request  $request,$id){

        return $this->reservationRepositoryInterface->store($request,$id);
    }


    public function cancel($id){

        return $this->reservationRepositoryInterface->cancel($id);


    }


}
