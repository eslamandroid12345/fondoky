<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalendarStoreRequest;
use App\Http\Requests\CalendarUpdateRequest;
use App\Interfaces\Web\CalendarRepositoryInterface;


class CalendarController extends Controller
{


    public $calendarRepositoryInterface;


    public function __construct(CalendarRepositoryInterface $calendarRepository)
    {

        $this->calendarRepositoryInterface = $calendarRepository;

    }


    
    public function create($id){


        return $this->calendarRepositoryInterface->create($id);

    }


    public function store(CalendarStoreRequest $request){


        return $this->calendarRepositoryInterface->store($request);


    }

    public function edit($id){


       return $this->calendarRepositoryInterface->edit($id);

    }



    public function update(CalendarUpdateRequest $request,$id){

        return $this->calendarRepositoryInterface->update($request,$id);

    }


    //show calendar of toDay
    public function toDay($id){


        return $this->calendarRepositoryInterface->toDay($id);

    }



    public function delete($id){

        return $this->calendarRepositoryInterface->delete($id);
    }

}
