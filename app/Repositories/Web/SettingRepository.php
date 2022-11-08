<?php

namespace App\Repositories\Web;

use App\Http\Requests\SettingRequest;
use App\Interfaces\Web\SettingRepositoryInterface;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingRepository implements SettingRepositoryInterface{



    public function getSetting(){

        $settings = Setting::query()->get();

        return view('settings.index', compact('settings'));

    }

    public function store(SettingRequest $request){

        try {

            if ($image = $request->file('logo')) {

                $destinationPath = 'setting/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $request['logo'] = "$profileImage";
            }

            $setting = Setting::create([

                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'about_ar' => $request->about_ar,
                'about_en' => $request->about_en,
                'privacy_ar' => $request->privacy_ar,
                'privacy_en' => $request->privacy_en,
                'location_ar' => $request->location_ar,
                'location_en' => $request->location_en,
                'vat_tax' => $request->vat_tax,
                'tourism_tax' => $request->tourism_tax,
                'municipal_tax' => $request->municipal_tax,
                'logo' => $profileImage,

            ]);

            toastr()->success(trans('settings.message_add'));


        }catch (\Exception $e){

            return returnMessageError($e->getMessage(),500);
        }

    }

    public function delete(Request $request){

        try {

            $setting = Setting::findOrFail($request->id);
            $setting->delete();

            toastr()->error(trans('settings.message_delete'));

        }catch (\Exception $e){

            return returnMessageError($e->getMessage(),500);
        }


    }

    public function update(Request $request){


        try {

            if ($image = $request->file('logo')) {

                $destinationPath = 'setting/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $request['logo'] = "$profileImage";
            }

            $setting = Setting::create([

                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'about_ar' => $request->about_ar,
                'about_en' => $request->about_en,
                'privacy_ar' => $request->privacy_ar,
                'privacy_en' => $request->privacy_en,
                'location_ar' => $request->location_ar,
                'location_en' => $request->location_en,
                'vat_tax' => $request->vat_tax,
                'tourism_tax' => $request->tourism_tax,
                'municipal_tax' => $request->municipal_tax,
                'logo' => $profileImage,

            ]);

            toastr()->success(trans('settings.message_update'));


        }catch (\Exception $e){

            return returnMessageError($e->getMessage(),500);
        }
    }
}