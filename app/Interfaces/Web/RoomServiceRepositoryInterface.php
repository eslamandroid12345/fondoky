<?php


namespace App\Interfaces\Web;
use App\Http\Requests\StoreRoomServiceRequest;

interface RoomServiceRepositoryInterface{



    public function index();
    public function create();
    public function store(StoreRoomServiceRequest $request);
    public function edit($id);
    public function update(StoreRoomServiceRequest $request,$id);
    public function delete($id);


}