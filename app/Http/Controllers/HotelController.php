<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelLoginRequest;
use App\Http\Requests\RoomTypeRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Interfaces\Web\HotelRepositoryInterface;


class HotelController extends Controller
{


    public $hotelRepositoryInterface;


    public function __construct(HotelRepositoryInterface $hotelRepositoryInterface)
    {

        $this->hotelRepositoryInterface = $hotelRepositoryInterface;

    }



    public function index(){


        return $this->hotelRepositoryInterface->index();
    }



    public function reservations(){


      return $this->hotelRepositoryInterface->reservations();

    }



    public function room_type_index(){


       return $this->hotelRepositoryInterface->room_type_index();
    }


    public function room_type_create(){


        return $this->hotelRepositoryInterface->room_type_create();
    }


    public function room_type(RoomTypeRequest $request){


        return $this->hotelRepositoryInterface->room_type($request);
    }


    public function block($id){

        return $this->hotelRepositoryInterface->block($id);


    }


    public function stay($id){


       return $this->hotelRepositoryInterface->stay($id);

    }


  public function show(){

        return $this->hotelRepositoryInterface->show();
  }


    public function login(HotelLoginRequest $request){

        return $this->hotelRepositoryInterface->login($request);

    }

    public function showRegister(){


        return $this->hotelRepositoryInterface->showRegister();
    }


    public function register(StoreHotelRequest $request){


     return $this->hotelRepositoryInterface->register($request);


    }


    public function edit(){

       return $this->hotelRepositoryInterface->edit();
    }



    public function update(UpdateHotelRequest $request){


        return $this->hotelRepositoryInterface->update($request);

    }

    public function delete($id){

       return $this->hotelRepositoryInterface->delete($id);

    }


    public function monthOfInvoices(){

        return $this->hotelRepositoryInterface->monthOfInvoices();

    }

    public function invoices(){


        return $this->hotelRepositoryInterface->invoices();

    }



    public function arrivals(){

      return $this->hotelRepositoryInterface->arrivals();

    }


    public function home(){

        return $this->hotelRepositoryInterface->home();

    }




}
