<?php


namespace App\Interfaces\Web;
use App\Http\Requests\HotelLoginRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use Illuminate\Http\Request;


interface  HotelRepositoryInterface{


    public function index();
    public function reservations(Request $request);
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
    public function arrivals();
    public function comment(StoreCommentRequest $request);


}