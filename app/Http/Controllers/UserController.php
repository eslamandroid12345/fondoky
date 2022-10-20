<?php

namespace App\Http\Controllers;

use App\Interfaces\Web\UserRepositoryInterface;
use Illuminate\Http\Request;


class UserController extends Controller
{



    public $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {

        $this->userRepositoryInterface = $userRepositoryInterface;

    }

    public function welcome(Request $request){


      return $this->userRepositoryInterface->welcome($request);

    }


    public function index(){

        return $this->userRepositoryInterface->index();
    }




    public function update($id){


        return $this->userRepositoryInterface->update($id);


    }


    public function rooms($id){

       return $this->userRepositoryInterface->rooms($id);


    }



    public function reservation(Request $request,$id){


     return $this->userRepositoryInterface->reservation($request,$id);

    }

    public function delete($id){

        return $this->userRepositoryInterface->delete($id);

    }


    public function rates(Request $request){


        return $this->userRepositoryInterface->rates($request);
    }


    public function ratesCreate($id){


        return $this->userRepositoryInterface->ratesCreate($id);
    }




}
