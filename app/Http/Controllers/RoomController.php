<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Interfaces\Web\RoomRepositoryInterface;
use App\Models\Room;
use Illuminate\Http\Request;
class RoomController extends Controller
{


    public $roomRepositoryInterface;

    public function __construct(RoomRepositoryInterface $roomRepositoryInterface)
    {

        $this->roomRepositoryInterface = $roomRepositoryInterface;

    }

    public function index(){

        return $this->roomRepositoryInterface->index();

    }


    public function create(){


        return $this->roomRepositoryInterface->create();

    }



    public function edit(Room $room){


      return $this->roomRepositoryInterface->edit($room);


    }

    public function show(Room $room){

        return $this->roomRepositoryInterface->show($room);
    }



    public function store(StoreRoomRequest $request){


        return $this->roomRepositoryInterface->store($request);

    }


    public function update(UpdateRoomRequest $request,$id){


       return $this->roomRepositoryInterface->update($request,$id);
    }

    public function delete($id)
    {


        return $this->roomRepositoryInterface->delete($id);


    }


    public function calendarsShow(Request $request,$id){


        return $this->roomRepositoryInterface->calendarsShow($request,$id);

    }

}
