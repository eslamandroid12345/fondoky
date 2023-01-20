<?php


namespace App\Repositories\Api;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Interfaces\Api\RoleRepositoryInterface;
use App\Models\Hotel;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class RoleRepository implements RoleRepositoryInterface
{


    public function index()
    {

        $roles = Role::orderBy('name', 'ASC')->get();
        if ($roles->count() > 0) {
            return helperJson(RoleResource::collection($roles), 'تم ارسال جميع الصلاحيات بنجاح', 200, 200);

        } else {

            return response()->json(['data' => null, 'message' => 'لا يوجد صلاحيات الي الان يرجي الانتظار حين اضافه الادمن لصلاحيات جديده', 'code' => 407], 200);
        }

    }

    public function store(Request $request)
    {

        try {
            $rules = [
                'name' => 'required|unique:roles,name',
                'permissions.*' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules, [
                'name.unique' => 406,
                'permissions.*.required' => 'يجب ادخال صلاحيه علي الاقل'
            ]);

            if ($validator->fails()) {
                $errors = collect($validator->errors())->flatten(1)[0];

                if (is_numeric($errors)) {
                    $errors_arr = [
                        406 => 'Failed,Role already exists',
                    ];

                    $code = collect($validator->errors())->flatten(1)[0];
                    return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
                }
                return response()->json(['data' => null, 'message' => $validator->errors()->first(), 'code' => 422], 200);
            }


            $storeNewRole = Role::create([
                'name' => $request->name,
                'permissions' => json_encode($request->permissions)
            ]);

            if (isset($storeNewRole)) {

                return helperJson(new RoleResource($storeNewRole), 'تم اضافه الصلاحيه بنجاح', 200);
            }

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage(), 'code' => 200], 500);

        }

    }

    public function update(Request $request, $id)
    {

        try {

            $rules = [
                'name' => 'required|unique:roles,name,'. $id,
                'permissions.*' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules, [
                'name.unique' => 406,
                'permissions.*.required' => 'يجب ادخال صلاحيه علي الاقل'
            ]);

            if ($validator->fails()) {
                $errors = collect($validator->errors())->flatten(1)[0];

                if (is_numeric($errors)) {
                    $errors_arr = [
                        406 => 'Failed,Role already exists',

                    ];

                    $code = collect($validator->errors())->flatten(1)[0];
                    return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
                }
                return response()->json(['data' => null, 'message' => $validator->errors()->first(), 'code' => 422], 200);
            }

            $role = Role::where('id', $id)->first();

            if (!$role) {

                return helperJson(null, 'هذه الصلاحيه غير موجوده يرجي ادخال رقم صلاحيه اخر');
            }

            $role->update([

                'name' => $request->name,
                'permissions' => json_encode($request->permissions)
            ]);

            if (isset($role)) {

                return helperJson(new RoleResource($role), 'تم تحديث بيانات الصلاحيه بنجاح', 200);
            }

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage(), 'code' => 200], 500);

        }


    }

}
