<?php


namespace App\Repositories\Web;


use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Interfaces\Web\RoleRepositoryInterface;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class RoleRepository implements RoleRepositoryInterface
{

    public function index(){

        $roles = Role::query()->orderByDesc('id')->get();
        return view('roles.index',compact('roles'));

    }

    public function create(){

        return view('roles.create');
    }


    public function store(StoreRoleRequest $request){


        try {

            $role = Role::create([
                'name' => $request->name,
                'permissions' => json_encode($request->permissions),

            ]);

            toastSuccess(__('admin_role.role'));

            return redirect()->back();

        }catch (\Exception $exception){

            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }


    public function edit($id){

        $role = Role::find($id);

        return view('roles.edit',compact('role'));

    }


    public function update(UpdateRoleRequest $request,$id){


        try {

            $role = Role::find($id);
            $role->update([

            'name' => $request->name,
           'permissions' => json_encode($request->permissions),

            ]);

            toastSuccess(__('admin_role.role_update'));

            return redirect()->route('roles.index');

        }catch (\Exception $exception){


            return returnMessageError($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);

        }


    }

}