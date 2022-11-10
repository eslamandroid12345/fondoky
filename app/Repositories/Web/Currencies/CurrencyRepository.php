<?php

namespace App\Repositories\Web\Currencies;

use App\Http\Requests\SettingRequest;
use App\Http\Requests\StoreCurrencyRequest;
use App\Interfaces\Web\Currencies\CurrencyRepositoryInterface;
use App\Models\Currency;
use App\Models\Setting;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CurrencyRepository implements CurrencyRepositoryInterface{


    public function getCurrencies(){

        $currencies = Currency::query()->get();

        return view('currencies.index', compact('currencies'));

    }

    public function store(StoreCurrencyRequest $request){

        try {

            if ($image = $request->file('logo')) {

                $destinationPath = 'currencies/';
                $logo = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $logo);
                $request['logo'] = "$logo";

            }


            $currency = Currency::create([

                'currency_ar' => $request->currency_ar,
                'currency_en' => $request->currency_en,
                'logo' => $logo,

            ]);


            toastr()->success(trans('currency.message_add'));

            return redirect()->back();


        }catch (\Exception $e){

            return returnMessageError($e->getMessage(),500);
        }

    }

    public function delete(Request $request){

        try {

            $currency = Currency::findOrFail($request->id);
            $currency->delete();

            toastr()->error(trans('currency.message_delete'));
            return redirect()->back();


        }catch (\Exception $e){

            return returnMessageError($e->getMessage(),500);
        }


    }

    public function update(Request $request){

        try {

            $currency = Currency::find($request->id);

            if ($image = $request->file('logo')) {

                $destinationPath = 'currencies/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $request['logo'] = "$profileImage";

                if(file_exists('currencies/'.$currency->logo)){

                    unlink('currencies/'.$currency->logo);

                }else{

                    return returnMessageError("Error to remove old logo of currency",Response::HTTP_INTERNAL_SERVER_ERROR);
                }

            }

            $currency->update([

                'currency_ar' => $request->currency_ar,
                'currency_en' => $request->currency_en,
                'logo' => $request->file('logo') == null ? $currency->logo : $profileImage
            ]);


            toastr()->success(trans('currency.message_update'));
            return redirect()->back();



        }catch (\Exception $e){

            return returnMessageError($e->getMessage(),500);
        }
    }

}