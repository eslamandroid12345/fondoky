<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{


    public function index(){


        $roles = Role::latest()->simplePaginate(Max);
        return view('roles.index',compact('roles'));

    }

    public function create(){

        return view('roles.create');
    }


    public function store(Request $request){

        $rules = [

            'name'  => 'required|unique:roles,name',
            'permissions' => 'required|array|min:1',
        ];

        $messages = [

            'name.required' => __('admin_role.name_role'),
            'name.unique' => __('admin_role.unique'),
            'permissions.required' => __('admin_role.permissions'),

        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        $role = Role::create([

            'name' => $request['name'],
             'permissions' => json_encode($request['permissions']),

        ]);

        return redirect()->back()->with('role',__('admin_role.role'));


    }


    public function edit($id){

        $role = Role::find($id);

        return view('roles.edit',compact('role'));

    }


    public function update(Request $request,$id){


        $role = Role::find($id);


        $rules = [

            'name'  => 'required',
            'permissions' => 'required|array|min:1',
        ];

        $messages = [

            'name.required' => __('admin_role.name'),
            'permissions.required' => __('admin_role.permissions'),

        ];

        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        $role->update([

            'name' => $request['name'],
            'permissions' => json_encode($request['permissions']),

        ]);

        return redirect()->route('roles.index')->with('role_update',__('admin_role.role_update'));


    }

}
