<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookerRequest;
use App\Interfaces\Web\BookerRepositoryInterface;

class BookerController extends Controller
{

    public $bookerRepositoryInterface;

    public function __construct(BookerRepositoryInterface $bookerRepositoryInterface)
    {

        $this->bookerRepositoryInterface = $bookerRepositoryInterface;

    }


    public function store(StoreBookerRequest $request,$id)
    {


      return $this->bookerRepositoryInterface->store($request,$id);
    }


    public function active($id){


       return $this->bookerRepositoryInterface->active($id);

    }


}
