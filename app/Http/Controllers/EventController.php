<?php

namespace App\Http\Controllers;

use App\Interfaces\Web\EventRepositoryInterface;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller{


    public $eventRepositoryInterface;

    public function __construct(EventRepositoryInterface $eventRepositoryInterface){

        $this->eventRepositoryInterface = $eventRepositoryInterface;
    }


    public function create($id){

        return $this->eventRepositoryInterface->create($id);



    }
    public function store(StoreEventRequest $request){


        return $this->eventRepositoryInterface->store($request);


    }
    public function edit($id){


        return $this->eventRepositoryInterface->edit($id);


    }
    public function update(UpdateEventRequest $request,$id){


        return $this->eventRepositoryInterface->update($request,$id);


    }
    public function destroy($id){

        return $this->eventRepositoryInterface->destroy($id);



    }

}