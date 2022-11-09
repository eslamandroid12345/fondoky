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
            'logo' => 'nullable',
            'location_ar' => 'required',
            'location_en' => 'required',
            'vat_tax' => 'required|numeric',
            'tourism_tax' => 'required|numeric',
            'municipal_tax' => 'required|numeric'

        ];
    }



    public function messages()
    {
      return [

          'name_ar.required' => trans('setting.name_ar_val'),
          'location_ar.required' => trans('setting.location_ar_val'),
          'location_en.required' => trans('setting.location_en_val'),
          'name_en.required' => trans('setting.name_en_val'),
          'vat_tax.required' => trans('setting.vat_tax_val'),
          'vat_tax.numeric' => trans('setting.vat_tax_numeric'),
          'tourism_tax.required' => trans('setting.tourism_tax_val'),
          'tourism_tax.numeric' => trans('setting.tourism_tax_numeric'),
          'municipal_tax.required' => trans('setting.municipal_tax_val'),
          'municipal_tax.numeric' => trans('setting.municipal_tax_numeric'),

      ];
    }
}
