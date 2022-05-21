<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;

class ServiceController extends Controller
{



    public function create()
    {
        $service = Service::where('hotel_id','=',hotel()->id)->get();
        return view('services.create',compact('service'));
    }


    public function store(Request $request)
    {

        $rules = [

            'name' => 'required',
            'services' => 'required|array|min:1',
        ];

        $messages = [

            'name.required' => __('services.name'),
            'services.required' => __('services.services'),
            'services.min' => __('services.services_min'),

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        $service = Service::create([

            'name' => $request['name'],
            'services' => json_encode($request['services']),
            'hotel_id' => hotel()->id,

        ]);

        return redirect()->back()->with('create', __('services.create'));


    }


    public function edit($id)
    {

        $service = Service::findOrFail($id);

        return view('services.edit', compact('service'));

    }


    public function update(Request $request, $id)
    {


        $service = Service::findOrFail($id);


        $rules = [

            'name' => 'required',
            'services' => 'required|array|min:1',
        ];

        $messages = [

            'name.required' => __('services.name'),
            'services.required' => __('services.services'),
            'services.min' => __('services.services_min'),

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        $service->update([

            'name' => $request['name'],
            'services' => json_encode($request['services']),

        ]);

        return redirect()->route('services.create')->with('update_service', __('services.update'));

    }

}
