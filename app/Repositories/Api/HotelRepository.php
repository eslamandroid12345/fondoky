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

class HotelRepository extends ResponseApi implements HotelRepositoryInterface
{

    public function hotelLogin(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $rules = [
                'email' => 'required|email|exists:hotels,email',
                'password' => 'required',
            ];
            $validator = Validator::make($request->only(['email','password']), $rules, [
                'email.email' => 409,
                'email.exists' => 407,
            ]);

            if ($validator->fails()) {

                $errors = collect($validator->errors())->flatten(1)[0];
                if (is_numeric($errors)) {

                    $errors_arr = [
                        409 => 'البريد الالكتروني يجب ان يكون ايميل',
                        407 => 'البريد الالكتروني غير مسجل من قبل',
                    ];

                    $code = collect($validator->errors())->flatten(1)[0];
                    return self::returnResponseError($errors_arr[$errors] ?? 500, $code,false,200);
                }
                return self::returnResponseError($validator->errors()->first(),422,false,422);
            }

            $token = Auth::guard('hotel-api')->attempt($request->only(['email', 'password']));
            if (!$token) {
                return self::returnResponseError( "كلمه المرور خطاء يرجي المحاوله مره اخري", 200, false,422);
            }
            $hotel = Auth::guard('hotel-api')->user();
            $hotel['token'] = $token;
            return self::returnResponseDataApi(new HotelResource($hotel),trans("hotels.message"),200,true,200);

        } catch (\Exception $exception) {

            return self::returnResponseError($exception->getMessage(),500,false,500);
        }
    }


    public function hotelRegister(Request $request)
    {

        try {
            $rules = [
                'manger'       => 'required|string|min:5|max:50',
                'name_ar'      => 'required|string|min:5|max:50',
                'name_en'      => 'required|string|min:10|max:50',
                'email'        => 'required|email|unique:hotels,email',
                'password'     => 'required|min:8|confirmed',
                'location_ar'  => 'required',
                'location_en'  => 'required',
                'currency_ar'  => 'required',
                'currency_en'  => 'required',
                'description'  => 'required',
                'hotel_photos' => 'required|array|min:1|mimes:jpg,png,jpeg|max:2048',
                'phone_hotel'  => 'required|numeric',
            ];

            $validator = Validator::make($request->all(), $rules, [
                'email.unique'       => 406,
                'phone.numeric'      => 407,
                'password.confirmed' => 408,
            ]);

            if ($validator->fails()) {
                $errors = collect($validator->errors())->flatten(1)[0];
                if (is_numeric($errors)) {
                    $errors_array = [
                        406    => 'هذا البريد الالكتروني موجود من قبل',
                        407    => 'الهاتف يجب ان يكون رقم',
                        408    => 'كلمه المرور يجب ان تكون مؤكده',
                    ];

                    $code = collect($validator->errors())->flatten(1)[0];
                    return self::returnResponseError($errors_array[$errors] ?? 500, $code,false,200);

                }
                return self::returnResponseError($validator->errors()->first(),422,false,422);
            }

            if(!preg_match("/\p{Arabic}/u", $request->name_ar)) {
                return self::returnResponseError( "اسم الفندق باللغه العربيه يجب ان يتضمن احرف بالعربي", 422,false, 500);

            } elseif (!preg_match('^(?=.*[A-Za-z0-9].*[A-Za-z0-9])[$!@{}[\]A-Za-z0-9]*$^', $request->name_en)) {
                return self::returnResponseError("اسم الفندق باللغه الانجليزيه يجب ان يتضمن احرف بالانجليزي", 422,false, 500);
            }
            $data = [];
            if ($request->hasfile('hotel_photos')) {

                foreach ($request->file('hotel_photos') as $image) {
                    $name = time() . '.' . $image->getClientOriginalName();
                    $image->move('hotels/', $name);
                    $data[] = $name;
                }
            }

            $storeNewHotel = Hotel::create([

                'manger'        => $request->manger,
                'name_ar'       => $request->name_ar,
                'name_en'       => $request->name_en,
                'email'         => $request->email,
                'password'      => Hash::make($request->password),
                'location_ar'   => $request->location_ar,
                'location_en'   => $request->location_en,
                'currency_ar'   => $request->currency_ar,
                'currency_en'   => $request->currency_en,
                'description'   => $request->description,
                'hotel_photos'  => json_encode($data),
                'phone_hotel'   => $request->phone_hotel,
            ]);

            if (isset($storeNewHotel)) {
                $data = [
                    "name_ar" => lang() == 'ar' ? __("hotels.message_register") . $request->name_ar : __("hotels.message_register") . $request->name_en,
                    'email' => $request->email,
                ];

                $storeNewHotel['token'] = Auth::guard('hotel-api')->attempt($request->only(['email', 'password']));
                event(new NewHotelNotification($data));
                return self::returnResponseDataApi(new HotelResource($storeNewHotel), trans('hotels.hotel'), 201,true, 201);

            }
        } catch (\Exception $exception) {

            return self::returnResponseError($exception->getMessage(),500,false,500);
        }
    }

    public function getProfile(Request $request)
    {
        try {

            $getHotelAuth = Auth::guard('hotel-api')->user();
            $getHotelAuth->token = $request->bearerToken();
            if (isset($getHotelAuth)) {
                return self::returnResponseDataApi(new HotelResource($getHotelAuth), 'تم الحصول علي بيانات بروفايل الفندق بنجاح', 200,true,200);
            }

        } catch (\Exception $exception) {

            return self::returnResponseError($exception->getMessage(),500,false,500);
        }
    }


    public function updateProfile(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $rules = [
                'manger'        => 'required|string|min:5|max:50',
                'name_ar'       => 'required|string|min:5|max:50',
                'name_en'       => 'required|string|min:10|max:50',
                'email'         => 'required|email|unique:hotels,email,' . Auth::guard('hotel-api')->id(),
                'password'      => 'required|min:8|confirmed',
                'location_ar'   => 'required',
                'location_en'   => 'required',
                'currency_ar'   => 'required',
                'currency_en'   => 'required',
                'description'   => 'nullable',
                'hotel_photos'  => 'nullable|array|min:1|mimes:jpg,png,jpeg',
                'phone_hotel'   => 'required|numeric',
            ];
            $validator = Validator::make($request->all(), $rules, [
                'email.unique'       => 406,
                'phone.numeric'      => 407,
                'password.confirmed' => 408,
            ]);

            if($validator->fails()){
                $errors = collect($validator->errors())->flatten(1)[0];
                if (is_numeric($errors)) {
                    $errors_arr = [
                        406    => 'هذا البريد الالكتروني موجود من قبل',
                        407    => 'الهاتف يجب ان يكون رقم',
                        408    => 'كلمه المرور يجب ان تكون مؤكده',
                    ];
                    $code = collect($validator->errors())->flatten(1)[0];
                    return self::returnResponseError( $errors_arr[$errors] ?? 500, $code,false,200);
                }
                return self::returnResponseError($validator->errors()->first(),422,false,422);
            }

            if(!preg_match("/\p{Arabic}/u", $request->name_ar)) {
                return self::returnResponseError( "اسم الفندق باللغه العربيه يجب ان يتضمن احرف بالعربي", 422,false, 500);

            } elseif (!preg_match('^(?=.*[A-Za-z0-9].*[A-Za-z0-9])[$!@{}[\]A-Za-z0-9]*$^', $request->name_en)) {
                return self::returnResponseError("اسم الفندق باللغه الانجليزيه يجب ان يتضمن احرف بالانجليزي", 422,false, 500);
            }

            $hotelId = Auth::guard('hotel-api')->id();
            $checkHotel = Hotel::where('id', $hotelId)->first();

            if (!$checkHotel) {
                return self::returnResponseError("الفندق غير موجود!", 404, false,404);
            }

            $data = [];
            if ($request->hasfile('hotel_photos')) {

                foreach ($request->file('hotel_photos') as $image) {
                    $name = time() . '.' . $image->getClientOriginalName();
                    $image->move( 'hotels/', $name);
                    $data[] = $name;
                }
                $images = json_decode($checkHotel->hotel_photos, true);
                foreach ($images as $image) {
                    if(file_exists('hotels/' . $image)){
                        unlink('hotels/' . $image);
                    }else{

                        return self::returnResponseError("يوجد خطاء ما الصور القديمه للفندق غير محذوفه!", 417,false, 200);
                    }
                }
            }

            $checkHotel->update([
                'manger'         => $request->manger,
                'name_ar'        => $request->name_ar,
                'name_en'        => $request->name_en,
                'email'          => $request->email,
                'password'       => Hash::make($request->password),
                'location_ar'    => $request->location_ar,
                'location_en'    => $request->location_en,
                'currency_ar'    => $request->currency_ar,
                'currency_en'    => $request->currency_en,
                'description'    => $request->description,
                'hotel_photos'   => $request->hotel_photos != null ? json_encode($data) : $checkHotel->hotel_photos,
                'phone_hotel'    => $request->phone_hotel,
            ]);

            if (isset($checkHotel)) {
                $checkHotel['token'] = Auth::guard('hotel-api')->attempt($request->only(['email', 'password']));
                return self::returnResponseDataApi(new HotelResource($checkHotel), "تم تحديث بيانات الفندق بنجاح", 200, true,200);
            }else{
                return self::returnResponseError("يوجد خطاء اثناء تعديل بيانات الفندق",500,false,500);
            }
        } catch (\Exception $exception) {
            return self::returnResponseError($exception->getMessage(),500,false,500);
        }
    }

    public function reservations(): \Illuminate\Http\JsonResponse
    {

        $hotelId = Auth::guard('hotel-api')->id();
        try {

            $reservations = Reservation::with(['user','hotel','room'])->where('hotel_id', $hotelId)->orderByDesc('id')->get();
            if ($reservations->count() > 0) {
                return self::returnResponseDataApi(ReservationResource::collection($reservations), "تم الحصول علي بيانات حجوزات الفندق بنجاح", 200,true,200);

            } else {
                return self::returnResponseError( "لا يوجد حجوزات الي الان يرجي الانتظار حين وجود حجوزات جديده", 200,false,404);
            }
        } catch (\Exception $exception) {

            return self::returnResponseError($exception->getMessage(),500,false,500);
        }
    }

    public function hotelLogout(): \Illuminate\Http\JsonResponse
    {

        try {
            Auth::guard('hotel-api')->logout();
           return self::returnResponseSuccess(trans('hotels.logout'),200,true,200);

        } catch (\Exception $exception) {

            return self::returnResponseError($exception->getMessage(),500,false,500);
        }
    }
}
