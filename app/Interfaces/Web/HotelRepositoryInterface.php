<?php


namespace App\Interfaces\Web;

use App\Http\Requests\HotelLoginRequest;
use App\Http\Requests\RoomTypeRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;


interface  HotelRepositoryInterface{


    public function index();
    public function reservations();
    public function room_type_index();
    public function room_type_create();
    public function room_type(RoomTypeRequest $request);
    public function block($id);
    public function stay($id);
    public function show();
    public function login(HotelLoginRequest $request);
    public function showRegister();
    public function register(StoreHotelRequest $request);
    public function edit();
    public function update(UpdateHotelRequest $request);
    public function delete($id);
    public function monthOfInvoices();
    public function invoices();
    public function paidYear();
    public function arrivals();


}