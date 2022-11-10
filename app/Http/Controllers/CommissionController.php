<?php


namespace App\Http\Controllers;
use App\Interfaces\Web\CommissionRepositoryInterface;
use Illuminate\Http\Request;


class CommissionController extends Controller
{

    public $commissionRepositoryInterface;

    public function __construct(CommissionRepositoryInterface $commissionRepositoryInterface){

      $this->commissionRepositoryInterface = $commissionRepositoryInterface;

    }

    public function commissions(Request $request){


        return $this->commissionRepositoryInterface->commissions($request);


    }


    public function index($id){


     return $this->commissionRepositoryInterface->index($id);

    }



    public function commissionOfMonth($id){

        return $this->commissionRepositoryInterface->commissionOfMonth($id);

    }

}
