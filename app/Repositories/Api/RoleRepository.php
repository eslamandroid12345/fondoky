<?php


namespace App\Repositories\Api;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Interfaces\Api\RoleRepositoryInterface;
use App\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{


    public function index(){


        $roles = Role::orderBy('id','DESC')->get();

        return returnDataSuccess(trans("admin_role.get"),"201","roles",$roles);


    }



    public function store(StoreRoleRequest $request){



            try {

                $role = new Role();
                $role->name = $request->name;
                $role->permissions = json_encode($request->permissions);
                $role->save();


                return returnDataSuccess(trans("admin_role.role"), "201", "roles", $role);

            } catch (\Exception $exception) {


                return returnMessageError($exception->getMessage(), "500");

            }


    }



    public function update(UpdateRoleRequest $request,$id){



        try {

            $role = Role::findOrFail($id);
            $role->name = $request->name;
            $role->permissions = json_encode($request->permissions);
            $role->save();

            return returnDataSuccess(trans("admin_role.role_update"), "201", "roles", $role);



            } catch (\Exception $exception) {


                return returnMessageError($exception->getMessage(), "500");

            }


    }

}