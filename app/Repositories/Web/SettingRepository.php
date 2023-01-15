<?php

namespace App\Repositories\Web;

use App\Http\Requests\SettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Interfaces\Web\SettingRepositoryInterface;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class SettingRepository implements SettingRepositoryInterface{


    public function index(){

        $settings = Setting::get();
        return view('settings.index', compact('settings'));

    }

    public function create(){

       return view('settings.create');
    }

    public function store(SettingRequest $request){

        try {

            if ($image = $request->file('logo')) {
                $destinationPath = 'setting/';
                $logo = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $logo);
                $request['logo'] = "$logo";
            }

            Setting::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'about_ar' => $request->about_ar,
            'about_en' => $request->about_en,
            'privacy_ar' => $request->privacy_ar,
            'privacy_en' => $request->privacy_en,
            'location_ar' => $request->location_ar,
            'location_en' => $request->location_en,
            'logo' => $logo

            ]);

            return redirect()->route('settings.index')->with('setting_add', trans('setting.message_add'));

        }catch (\Exception $e){

            return response()->json(['data' => null,'message' => $e->getMessage(),'code' => 500]);
        }

    }

    public function delete($id){

        try {

            $setting = Setting::findOrFail($id);

            if(File::exists('setting/'.$setting->logo)){

                unlink('setting/'.$setting->logo);

            }else{
                return response()->json(['data' => null,'message' => 'The image not delete please try again','code' => 500]);
            }

            $setting->delete();
            return redirect()->back()->with('setting_delete', trans('setting.message_delete'));


        }catch (\Exception $e){

            return response()->json(['data' => null,'message' => $e->getMessage(),'code' => 500]);
        }


    }

    public function edit($id){

        $setting = Setting::findOrFail($id);
        return view('settings.edit',compact('setting'));
    }


    public function show($id){

        $setting = Setting::findOrFail($id);
        return view('settings.edit',compact('setting'));
    }

    public function update(UpdateSettingRequest $request,$id){

        //update setting
        try {

            $setting = Setting::find($id);

            if ($image = $request->file('logo')) {

                $destinationPath = 'setting/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $request['logo'] = "$profileImage";

                if(File::exists('setting/'.$setting->logo)){

                    unlink('setting/'.$setting->logo);

                }else{

                    return response()->json(['data' => null,'message' => 'The old image not delete please try again','code' => 500]);
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
                'logo' => $request->file('logo') == null ? $setting->logo : $profileImage
            ]);

            return redirect()->route('settings.index')->with('setting_update',trans('setting.message_update'));

        }catch (\Exception $e){

            return response()->json(['data' => null,'message' => $e->getMessage(),'code' => 500]);
        }
    }

}
