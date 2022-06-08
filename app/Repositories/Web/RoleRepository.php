<?php


namespace App\Repositories\Web;


use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Interfaces\Web\RoleRepositoryInterface;
use App\Models\Role;


class RoleRepository implements RoleRepositoryInterface
{

    public function index(){


        $roles = Role::latest()->simplePaginate(Max);
        return view('roles.index',compact('roles'));

    }

    public function create(){

        return view('roles.create');
    }


    public function store(StoreRoleRequest $request){


        try {

            $role = new Role();
            $role->name = $request->name;
            $role->permissions = json_encode($request->permissions);
            $role->save();


            return redirect()->back()->with('role',__('admin_role.role'));

        }catch (\Exception $exception){


            return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);

        }
       


    }


    public function edit($id){

        $role = Role::find($id);

        return view('roles.edit',compact('role'));

    }


    public function update(UpdateRoleRequest $request,$id){


        try {

            $role = Role::find($id);
            $role->name = $request->name;
            $role->permissions = json_encode($request->permissions);
            $role->save();


            return redirect()->route('roles.index')->with('role_update',__('admin_role.role_update'));

        }catch (\Exception $exception){


            return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);

        }


    }

}