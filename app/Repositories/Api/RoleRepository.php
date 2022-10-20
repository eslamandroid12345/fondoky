<?php


namespace App\Repositories\Api;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Interfaces\Api\RoleRepositoryInterface;
use App\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class RoleRepository implements RoleRepositoryInterface
{


    public function index(){


        $roles = Role::orderBy('id','DESC')->get();

        return returnDataSuccess(trans("admin_role.get"),Response::HTTP_OK,"roles",$roles);


    }



    public function store(StoreRoleRequest $request){



            try {

                $role = new Role();
                $role->name = $request->name;
                $role->permissions = json_encode($request->permissions);
                $role->save();


                return returnDataSuccess(trans("admin_role.role"), Response::HTTP_OK, "roles", $role);

            } catch (\Exception $exception) {


                return returnMessageError($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);

            }


    }



    public function update(UpdateRoleRequest $request,$id){



        try {

            $role = Role::findOrFail($id);
            $role->name = $request->name;
            $role->permissions = json_encode($request->permissions);
            $role->save();

            return returnDataSuccess(trans("admin_role.role_update"), Response::HTTP_OK, "roles", $role);



            } catch (\Exception $exception) {


                return returnMessageError($exception->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);

            }


    }

}