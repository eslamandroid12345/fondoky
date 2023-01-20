<?php

namespace App\Repositories\Api;

use App\Events\NewHotelNotification;
use App\Http\Requests\HotelLoginRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Resources\HotelResource;
use App\Http\Resources\ReservationResource;
use App\Interfaces\Api\HotelRepositoryInterface;
use App\Models\Hotel;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class HotelRepository implements HotelRepositoryInterface
{

    public function hotelLogin(Request $request)
    {
        try {
            $rules = [
                'email' => 'required|email|exists:hotels,email',
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
                    return helperJson("hotel", null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
                }
                return response()->json(['data' => null, 'message' => $validator->errors()->first(), 'code' => 422], 200);
            }

            $token = auth()->guard('hotel-api')->attempt($request->only(['email', 'password']));

            if (!$token) {

                return helperJson(null ,"كلمه المرور خطاء يرجي المحاوله مره اخري", 200,422);
            }
            $hotel = auth()->guard('hotel-api')->user();
            $hotel['token'] = $token;
            return helperJson(new HotelResource($hotel), trans("hotels.message"),200);

        } catch (\Exception $exception) {

            return helperJson(null, $exception->getMessage(), 500, 500);
        }
    }


    public function hotelRegister(Request $request)
    {

        try {
            $rules = [
                'manger' => 'required|string|min:5|max:50',
                'name_ar' => 'required|string|min:5|max:50',
                'name_en' => 'required|string|min:10|max:50',
                'email' => 'required|email|unique:hotels,email',
                'password' => 'required|min:8|confirmed',
                'location_ar' => 'required',
                'location_en' => 'required',
                'currency_ar' => 'required',
                'currency_en' => 'required',
                'description' => 'required',
                'hotel_photos' => 'required|array|min:1|mimes:jpg,png,jpeg|max:2048',
                'phone_hotel' => 'required|numeric',
            ];
            $validator = Validator::make($request->all(), $rules, [
                'email.unique' => 406,
                'phone.numeric' => 407,
                'phone.confirmed' => 408,
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
                    return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
                }
                return response()->json(['data' => null, 'message' => $validator->errors()->first(), 'code' => 422], 200);
            }

            if (!preg_match("/\p{Arabic}/u", $request->name_ar)) {

                return helperJson(null, "The name ar must be an Arabic Characters", 422, 500);

            } elseif (!preg_match('^(?=.*[A-Za-z0-9].*[A-Za-z0-9])[$!@{}[\]A-Za-z0-9]*$^', $request->name_en)) {

                return helperJson(null, "The name en must be an English Characters", 422, 500);
            }

            $data = [];
            if ($request->hasfile('hotel_photos')) {

                foreach ($request->file('hotel_photos') as $image) {
                    $name = time() . '.' . $image->getClientOriginalName();
                    $image->move(public_path() . '/hotels/', $name);
                    $data[] = $name;
                }
            }

            $storeNewHotel = Hotel::create([
                'manger' => $request->manger,
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'location_ar' => $request->location_ar,
                'location_en' => $request->location_en,
                'currency_ar' => $request->currency_ar,
                'currency_en' => $request->currency_en,
                'description' => $request->description,
                'hotel_photos' => json_encode($data),
                'phone_hotel' => $request->phone_hotel,
            ]);

            if (isset($storeNewHotel)) {
                $data = [
                    "name_ar" => lang() == 'ar' ? __("hotels.message_register") . $request->name_ar : __("hotels.message_register") . $request->name_en,
                    'email' => $request->email,
                ];

                $hotel['token'] = auth()->guard('hotel-api')->attempt($request->only(['email', 'password']));
                event(new NewHotelNotification($data));
                return helperJson(new HotelResource($hotel), trans('hotels.hotel'), 201, 201);

            }
        } catch (\Exception $exception) {

            return response()->json(['message' => $exception->getMessage(), 'code' => 500], 500);
        }
    }

    public function getProfile(Request $request)
    {

        try {

            $getHotelAuth = Auth::guard('hotel-api')->user();
            $getHotelAuth->token = $request->bearerToken();

            if (isset($getHotelAuth)) {
                return helperJson(new HotelResource($getHotelAuth), 'تم الحصول علي بيانات بروفايل الفندق بنجاح', 200);

            }

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage(), 'code' => 500], 500);

        }
    }


    public function updateProfile(Request $request)
    {
        try {
            $rules = [
                'manger' => 'required|string|min:5|max:50',
                'name_ar' => 'required|string|min:5|max:50',
                'name_en' => 'required|string|min:10|max:50',
                'email' => 'required|email|unique:hotels,email,' . Auth::guard('hotel-api')->id(),
                'password' => 'required|min:8|confirmed',
                'location_ar' => 'required',
                'location_en' => 'required',
                'currency_ar' => 'required',
                'currency_en' => 'required',
                'description' => 'nullable',
                'hotel_photos' => 'nullable|array|min:1|mimes:jpg,png,jpeg|max:2048',
                'phone_hotel' => 'required|numeric',
            ];
            $validator = Validator::make($request->all(), $rules, [
                'email.unique' => 406,
                'phone.numeric' => 407,
                'phone.confirmed' => 408,
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
                    return helperJson(null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
                }
                return response()->json(['data' => null, 'message' => $validator->errors()->first(), 'code' => 422], 200);
            }

            if (!preg_match("/\p{Arabic}/u", $request->name_ar)) {

                return helperJson(null, "The name ar must be an Arabic Characters", 422, 500);

            } elseif (!preg_match('^(?=.*[A-Za-z0-9].*[A-Za-z0-9])[$!@{}[\]A-Za-z0-9]*$^', $request->name_en)) {

                return helperJson(null, "The name en must be an English Characters", 422, 500);
            }

            $data = [];
            if ($request->hasfile('hotel_photos')) {

                foreach ($request->file('hotel_photos') as $image) {
                    $name = time() . '.' . $image->getClientOriginalName();
                    $image->move(public_path() . '/hotels/', $name);
                    $data[] = $name;
                }
            }

            $hotelId = Auth::guard('hotel-api')->id();
            $checkHotel = Hotel::where('id', $hotelId)->first();

            if (!$checkHotel) {

                return helperJson(null, "Hotel not found with id", 404, 404);
            }

            $checkHotel->update([
                'manger' => $request->manger,
                'name_ar' => $request->name_ar,
                'name_en' => $request->name_en,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'location_ar' => $request->location_ar,
                'location_en' => $request->location_en,
                'currency_ar' => $request->currency_ar,
                'currency_en' => $request->currency_en,
                'description' => $request->description,
                'hotel_photos' => $request->hotel_photos != null ? json_encode($data) : $checkHotel->hotel_photos,
                'phone_hotel' => $request->phone_hotel,
            ]);

            if (isset($checkHotel)) {

                $checkHotel['token'] = auth()->guard('hotel-api')->attempt($request->only(['email', 'password']));
                return helperJson(new HotelResource($checkHotel), "تم تحديث بيانات الفندق بنجاح", 200, 200);

            }
        } catch (\Exception $exception) {

            return response()->json(['message' => $exception->getMessage(), 'code' => 500], 500);
        }
    }

    public function reservations(){

        $hotelId = Auth::guard('hotel-api')->id();

        try {

            $reservations = Reservation::with(['user','hotel','room'])->where('hotel_id', $hotelId)->orderByDesc('id')->get();

            if($reservations->count() > 0){

                return helperJson(ReservationResource::collection($reservations),"تم الحصول علي بيانات حجوزات الفندق بنجاح",200);
            }else{

                return helperJson(null,"لا يوجد حجوزات الي الان يرجي الانتظار حين وجود حجوزات جديده",200);

            }
        }catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage(), 'code' => 500], 500);

        }


    }

    public function hotelLogout()
    {

        try {

            auth()->guard('hotel-api')->logout();
            return response()->json(['message' => trans('hotels.logout'), 'code' => 200], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage(), 'code' => 500], 500);

        }
    }
}
