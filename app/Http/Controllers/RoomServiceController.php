<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoomServiceRequest;
use App\Interfaces\Web\RoomServiceRepositoryInterface;

class RoomServiceController extends Controller
{

    public $roomServiceRepositoryInterface;

    public function __construct(RoomServiceRepositoryInterface $roomServiceRepositoryInterface){


        $this->roomServiceRepositoryInterface = $roomServiceRepositoryInterface;

    }


    public function index(){


        return $this->roomServiceRepositoryInterface->index();


    }


    public function create(){


        return $this->roomServiceRepositoryInterface->create();


    }



    public function store(StoreRoomServiceRequest $request){

        return $this->roomServiceRepositoryInterface->store($request);

    }


    public function edit($id){

        return $this->roomServiceRepositoryInterface->edit($id);

    }



    public function update(StoreRoomServiceRequest $request,$id){

        return $this->roomServiceRepositoryInterface->update($request,$id);

    }


    public function delete($id){

        return $this->roomServiceRepositoryInterface->delete($id);


    }
}
