<?php

namespace App\Repositories\Web;

use App\Http\Requests\SettingRequest;
use App\Interfaces\Web\SettingRepositoryInterface;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SettingRepository implements SettingRepositoryInterface{


    public function getSetting(){

        $settings = Setting::query()->get();

        return view('settings.index', compact('settings'));

    }

    public function store(SettingRequest $request){

        try {

            if ($image = $request->file('logo')) {

                $destinationPath = 'setting/';
                $logo = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $logo);
                $request['logo'] = "$logo";

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
                'logo' => $logo,

            ]);


            toastr()->success(trans('setting.message_add'));

            return redirect()->back();


        }catch (\Exception $e){

            return returnMessageError($e->getMessage(),500);
        }

    }

    public function delete(Request $request){

        try {

            $setting = Setting::findOrFail($request->id);

            if(file_exists('setting/'.$setting->logo) && $setting->logo != NULL){

                unlink('setting/'.$setting->logo);

            }else{

                return returnMessageError("Error to remove old logo",Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $setting->delete();

            toastr()->error(trans('setting.message_delete'));
            return redirect()->back();


        }catch (\Exception $e){

            return returnMessageError($e->getMessage(),500);
        }


    }

    public function update(Request $request){

        //update setting
        try {

            $setting = Setting::find($request->id);

            if ($image = $request->file('logo')) {

                $destinationPath = 'setting/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $request['logo'] = "$profileImage";

                if(file_exists('setting/'.$setting->logo) && $setting->logo != NULL){

                    unlink('setting/'.$setting->logo);

                }else{

                    return returnMessageError("Error to remove old logo",Response::HTTP_INTERNAL_SERVER_ERROR);
                }

            }

            $setting->update([

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
                'logo' => $request->file('logo') == null ? $setting->logo : $profileImage
            ]);


            toastr()->success(trans('setting.message_update'));
            return redirect()->back();



        }catch (\Exception $e){

            return returnMessageError($e->getMessage(),500);
        }
    }
}