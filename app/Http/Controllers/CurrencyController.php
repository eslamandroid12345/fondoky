<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreCurrencyRequest;
use App\Interfaces\Web\Currencies\CurrencyRepositoryInterface;
use Illuminate\Http\Request;

class CurrencyController extends Controller{


    public $currencyRepositoryInterface;

    public function __construct(CurrencyRepositoryInterface $currencyRepositoryInterface){

        $this->currencyRepositoryInterface = $currencyRepositoryInterface;


    }

    public function getCurrencies(){

        return $this->currencyRepositoryInterface->getCurrencies();

    }


    public function store(StoreCurrencyRequest $request){

        return $this->currencyRepositoryInterface->store($request);


    }

    public function delete(Request $request){

        return $this->currencyRepositoryInterface->delete($request);


    }

    public function update(Request $request){

        return $this->currencyRepositoryInterface->update($request);


    }
}
