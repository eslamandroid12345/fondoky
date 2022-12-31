<?php
namespace App\Repositories\Api;
use App\Events\NewHotelNotification;
use App\Http\Requests\HotelLoginRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Resources\HotelResource;
use App\Interfaces\Api\HotelRepositoryInterface;
use App\Models\Hotel;
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
                'email'        => 'required|email|exists:hotels,email',
                'password'     => 'required',
            ];
            $validator = Validator::make($request->all(), $rules, [
                'email.email'  => 403,
                'email.exists'  => 404,
            ]);

            if ($validator->fails()) {

                $errors = collect($validator->errors())->flatten(1)[0];
                if (is_numeric($errors)) {

                    $errors_arr = [
                        403 => 'Failed,Email must be an email',
                        404 => 'Failed,Email not found',
                    ];

                    $code = collect($validator->errors())->flatten(1)[0];
                    return helperJson("hotel",null, isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
                }
                return response()->json(['data' => null, 'message' => $validator->errors()->first(), 'code' => 422], 200);
            }

            $token = auth()->guard('hotel-api')->attempt($request->only(['email','password']));

            if(!$token){

                return helperJson(null,trans("admin.error"),500,500);
            }
            $hotel = auth()->guard('hotel-api')->user();
            $hotel['token'] = $token;
            return helperJson(new HotelResource($hotel), trans("hotels.message"));

        }catch (\Exception $exception){

            return helperJson(null,$exception->getMessage(),500,500);
        }
    }


    public function hotelRegister(Request $request){

        try {
            $rules = [

                'manger'       => 'required',
                'name_ar'      => 'required',
                'name_en'      => 'required',
                'email'        => 'required|email|unique:hotels',
                'password'     => 'required|min:8',
                'location_ar'  => 'required',
                'location_en'  => 'required',
                'currency_ar'  => 'required',
                'currency_en'  => 'required',
                'description'  => 'required',
                'hotel_photos.*' => 'required|file|mimes:jpg,png,jpeg|max:2048',
                'phone_hotel'  => 'required|numeric',
            ];
            $validator = Validator::make($request->all(), $rules, [
                'email.unique'  => 406,
                'phone.numeric' => 407,
            ]);

            if ($validator->fails()) {

                $errors = collect($validator->errors())->flatten(1)[0];

                if (is_numeric($errors)) {
                    $errors_arr = [
                        406 => 'Failed,Email already exists',
                        407 => 'Failed,Phone number must be an number',
                    ];

                    $code = collect($validator->errors())->flatten(1)[0];
                    return helperJson(null,isset($errors_arr[$errors]) ? $errors_arr[$errors] : 500, $code);
                }
                return response()->json(['data' => null, 'message' => $validator->errors()->first(), 'code' => 422], 200);
            }

            if(!preg_match("/\p{Arabic}/u",$request->name_ar)){

                return helperJson(null,"The name ar must be an Arabic Characters",422,500);

            } elseif (!preg_match('^(?=.*[A-Za-z0-9].*[A-Za-z0-9])[$!@{}[\]A-Za-z0-9]*$^',$request->name_en)){

                return helperJson(null,"The name en must be an English Characters",422,500);

            }

            $data = [];
            if($request->hasfile('hotel_photos'))
            {
                foreach($request->file('hotel_photos') as $image)
                {
                    $name= time() . '.' . $image->getClientOriginalName();
                    $image->move(public_path().'/hotels/', $name);
                    $data[] = $name;
                }
            }

            $hotel = new Hotel();
            $hotel->manger = $request->manger;
            $hotel->name_ar = $request->name_ar;
            $hotel->name_en = $request->name_en;
            $hotel->email = $request->email;
            $hotel->password = Hash::make($request->password);
            $hotel->location_ar = $request->location_ar;
            $hotel->location_en = $request->location_en;
            $hotel->currency_ar = $request->currency_ar;
            $hotel->currency_en = $request->currency_en;
            $hotel->description = $request->description;
            $hotel->hotel_photos = json_encode($data);
            $hotel->phone_hotel = $request->phone_hotel;
            $hotel->slug = Str::slug($request->description,"-","ar");
            $hotel->save();

            $data = [
                "name_ar" =>   lang() == 'ar' ? __("hotels.message_register") . $request->name_ar : __("hotels.message_register") .  $request->name_en,
                'email' => $request->email,
            ];

           $hotel['token'] = auth()->guard('hotel-api')->attempt($request->only(['email','password']));

            event(new NewHotelNotification($data));
            return helperJson(new HotelResource($hotel),trans('hotels.hotel'),201,201);

        }catch (\Exception $exception){

            return helperJson(null,$exception->getMessage(),500,500);

        }

    }

    public function hotelLogout()
    {

        try {
             auth()->guard('hotel-api')->logout();

               return helperJson(null,trans('hotels.logout'),200,200);

            }catch (\Exception $exception){

            return helperJson(null,$exception->getMessage(),500,500);

        }

    }

}
