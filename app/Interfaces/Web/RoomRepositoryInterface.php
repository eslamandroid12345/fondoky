<?php


namespace App\Interfaces\Web;


use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;


interface RoomRepositoryInterface
{


    public function index();
    public function create();
    public function edit(Room $room);
    public function show(Room $room);
    public function store(StoreRoomRequest $request);
    public function update(UpdateRoomRequest $request,$id);
    public function delete($id);
    public function calendarsShow(Request $request,$id);

}