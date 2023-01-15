<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest{


    public function authorize(){
        return true;
    }


    public function rules()
    {
        return [

            'name_ar' => 'required',
            'name_en' => 'required',
            'about_ar' => 'required',
            'about_en' => 'required',
            'logo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'privacy_ar' => 'required',
            'privacy_en' => 'required',
            'location_ar' => 'required',
            'location_en' => 'required',
        ];
    }


    public function messages()
    {
      return [

          'name_ar.required' => trans('setting.name_ar_val'),
          'name_en.required' => trans('setting.name_en_val'),
          'about_ar.required' => trans('setting.about_ar_val'),
          'about_en.required' => trans('setting.about_en_val'),
          'location_ar.required' => trans('setting.location_ar_val'),
          'location_en.required' => trans('setting.location_en_val'),
          'privacy_ar.required' => trans('setting.privacy_ar_val'),
          'privacy_en.required' => trans('setting.privacy_en_val'),
          'logo.required' => trans('setting.logo_val'),
          'logo.mimes' => trans('setting.logo_mimes_val'),
          'logo.max' => trans('setting.logo_max_val'),
          'logo.image' => trans('setting.logo_image_val'),

      ];
    }
}
