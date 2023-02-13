<?php

namespace App\Repositories\Api;
use App\Events\NewHotelNotification;
use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Resources\AdminResource;
use App\Http\Resources\HotelResource;
use App\Interfaces\Api\AdminRepositoryInterface;
use App\Models\Admin;
use App\Models\Hotel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;


class AdminRepository extends ResponseApi implements AdminRepositoryInterface
{


    public function login(Request $request)
    {

        try {
            $rules = [
                'email' => 'required|email|exists:admins,email',
                'password' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules, [
                'email.email' => 403,
                'email.exists' => 407,
            ]);

            if ($validator->fails()) {
                $errors = collect($validator->errors())->flatten(1)[0];
                if (is_numeric($errors)) {

                    $errors_arr = [
                        403 => 'Failed,Email must be an email',
                        407 => 'Failed,Email not found',
                    ];

                    $code = collect($validator->errors())->flatten(1)[0];
                    return self::returnResponseError( isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code,false,200);
                }
                return response()->json(['data' => null, 'message' => $validator->errors()->first(), 'code' => 422], 200);
            }

            $token = auth()->guard('admin-api')->attempt($request->only(['email', 'password']));

            if (!$token) {

                return self::returnResponseError("كلمه المرور خطاء يرجي المحاوله مره اخري", 404,false, 404);
            }
            $admin = auth()->guard('admin-api')->user();
            $admin['token'] = $token;
            return self::returnResponseDataApi(new AdminResource($admin), "تم تسجيل  دخول الادمن بنجاح", 200,true,200);

        } catch (\Exception $exception) {

            return self::returnResponseError($exception->getMessage(),500,false,500);
        }


    }

    public function register(Request $request)
    {

        try {
            $rules = [
                'name' => 'required|min:3|max:100',
                'email' => 'required|email|unique:admins,email',
                'password' => 'required',
                'phone' => 'required|numeric',
                'image' => 'required|mimes:jpg,png,jpeg',
                'role_id' => 'required|exists:roles,id'
            ];
            $validator = Validator::make($request->all(), $rules, [

                'email.unique' => 406,
                'phone.unique' => 407,
                'role_id.exists' => 408,
                'phone.numeric' => 409
            ]);

            if ($validator->fails()) {
                $errors = collect($validator->errors())->flatten(1)[0];

                if (is_numeric($errors)) {
                    $errors_arr = [
                        406 => 'Failed,Email already exists',
                        407 => 'Failed,Phone number already exists',
                        408 => 'Failed,This role not exists',
                        409 => 'Failed,Phone number must be an number',
                    ];

                    $code = collect($validator->errors())->flatten(1)[0];
                    return self::returnResponseError( isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code,false,200);
                }
                return self::returnResponseError($validator->errors()->first(),422,false,422);
            }

            if ($image = $request->file('image')) {

                $destinationPath = 'admins/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $request['image'] = "$profileImage";
            }

            $storeNewAdmin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'image' => $profileImage,
                'role_id' => $request->role_id
            ]);

            if (isset($storeNewAdmin)) {

                $storeNewAdmin['token'] = auth()->guard('admin-api')->attempt($request->only(['email', 'password']));
                return self::returnResponseDataApi(new AdminResource($storeNewAdmin), "تم تسجيل بيانات الادمن بنجاح", 201,true, 201);

            }
        } catch (\Exception $exception) {

            return self::returnResponseError($exception->getMessage(),500,false,500);
        }

    }


    public function logout()
    {
        try {

            auth()->guard('admin-api')->logout();

            return self::returnResponseSuccess("تم تسجيل خروج الادمن بنجاح",200,true,200);

        } catch (\Exception $exception) {

            return self::returnResponseError($exception->getMessage(),500,false,500);

        }

    }

}
