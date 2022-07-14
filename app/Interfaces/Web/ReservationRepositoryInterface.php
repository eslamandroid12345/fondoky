<?php

namespace App\Interfaces\Web;


use Illuminate\Http\Request;

interface ReservationRepositoryInterface{


    public function store(Request $request,$id);
    public function cancel($id);


}