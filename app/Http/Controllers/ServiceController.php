<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Interfaces\Web\ServiceRepositoryInterface;


class ServiceController extends Controller
{


    public $serviceRepositoryInterface;

    public function __construct(ServiceRepositoryInterface $serviceRepositoryInterface){


        $this->serviceRepositoryInterface = $serviceRepositoryInterface;


    }

    public function create(){

        return $this->serviceRepositoryInterface->create();


    }


    public function store(StoreServiceRequest $request){

     return $this->serviceRepositoryInterface->store($request);

    }


    public function edit($id){


        return $this->serviceRepositoryInterface->edit($id);

    }


    public function update(StoreServiceRequest $request, $id){


        return $this->serviceRepositoryInterface->update($request,$id);

    }

}
