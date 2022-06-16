<?php


namespace App\Repositories\Api;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Interfaces\Api\RoleRepositoryInterface;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;

class RoleRepository implements RoleRepositoryInterface
{


    public function index(){

        if(Gate::allows('roles',adminApi())){

            $roles = Role::orderBy('id','DESC')->get();

            return returnDataSuccess(trans("admin_role.get"),"201","roles",$roles);


        }else{

            return returnMessageError(trans("api_user.allow"),"403");


        }


    }



    public function store(StoreRoleRequest $request){

        if(Gate::allows('roles',adminApi())) {


            try {

                $role = new Role();
                $role->name = $request->name;
                $role->permissions = json_encode($request->permissions);
                $role->save();


                return returnDataSuccess(trans("admin_role.role"), "201", "roles", $role);

            } catch (\Exception $exception) {


                return returnMessageError($exception->getMessage(), "500");

            }

        }else{

            return returnMessageError(trans("api_user.allow"),"403");


        }


    }




    public function update(UpdateRoleRequest $request,$id){


        if(Gate::allows('roles',adminApi())) {


               try {

                    $role = Role::findOrFail($id);
                    $role->name = $request->name;
                    $role->permissions = json_encode($request->permissions);
                    $role->save();

                    return returnDataSuccess(trans("admin_role.role_update"), "201", "roles", $role);



            } catch (\Exception $exception) {


                return returnMessageError($exception->getMessage(), "500");

            }

        }else{

            return returnMessageError(trans("api_user.allow"),"403");

        }


    }

}