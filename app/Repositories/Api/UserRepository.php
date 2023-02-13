<?php

namespace App\Repositories\Api;

use App\Events\NewHotelNotification;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\AdminResource;
use App\Http\Resources\HotelResource;
use App\Http\Resources\RoleResource;
use App\Http\Resources\UserResource;
use App\Interfaces\Api\UserRepositoryInterface;
use App\Models\Hotel;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;


class UserRepository extends ResponseApi implements UserRepositoryInterface
{


    public function users(){

        $users = User::query()->orderByDesc("name")->get();
        if ($users->count() > 0) {
            return self::returnResponseDataApi(UserResource::collection($users), 'تم ارسال جميع المستخدمين بنجاح', 200,true, 200);

        } else {

            return self::returnResponseSuccess("لا يوجد مستخدمين الي الان يرجي الانتظار لحين تسجيل عملاء جدد",200,true,200);
        }
    }

    public function register(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|string|min:4|max:50',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
                'phone' => 'required|numeric',
            ];
            $validator = Validator::make($request->all(), $rules, [
                'email.unique' => 406,
                'phone.numeric' => 407,
                'password.confirmed' => 408,
            ]);

            if ($validator->fails()) {
                $errors = collect($validator->errors())->flatten(1)[0];

                if (is_numeric($errors)) {
                    $errors_arr = [
                        406 => 'Failed,Email already exists',
                        407 => 'Failed,Phone number must be an number',
                        408 => 'Failed,Password must be confirmed',
                    ];

                    $code = collect($validator->errors())->flatten(1)[0];
                    return self::returnResponseError( isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code,false,200);
                }
                return self::returnResponseError($validator->errors()->first(),422,false,422);
            }

            $storeNewUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
            ]);

            if (isset($storeNewUser)) {

                $storeNewUser['token'] = auth()->guard('user-api')->attempt($request->only(['email', 'password']));
                return self::returnResponseDataApi(new UserResource($storeNewUser), "تم تسجيل بيانات المستخدم بنجاح",200, true, 200);

            }
        } catch (\Exception $exception) {

            return self::returnResponseError($exception->getMessage(),500,false,500);
        }


    }


    public function login(Request $request)
    {
        try {
            $rules = [
                'email' => 'required|email|exists:users,email',
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
                return self::returnResponseError($validator->errors()->first(),422,false,422);
            }

            $token = auth()->guard('user-api')->attempt($request->only(['email', 'password']));

            if (!$token) {

                return self::returnResponseError( "كلمه المرور خطاء يرجي المحاوله مره اخري", 404,false, 404);
            }
            $user = auth()->guard('user-api')->user();
            $user['token'] = $token;
            return self::returnResponseDataApi(new UserResource($user), "تم تسجيل دخول المستخدم بنجاح", 200,true,200);

        } catch (\Exception $exception) {

            return self::returnResponseError($exception->getMessage(),500,false,500);
        }

    }


    public function logout()
    {

        try {

            auth()->guard('user-api')->logout();
            return self::returnResponseSuccess("تم تسجيل خروج المستخدم بنجاح",200,true,200);

        } catch (\Exception $exception) {

            return self::returnResponseError($exception->getMessage(),500,false,500);

        }

    }

}
