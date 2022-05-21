<?php

namespace App\Http\Controllers;

use App\Events\NewHotelNotification;
use App\Models\Booker;
use App\Models\Hotel;
use App\Models\Report;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class HotelController extends Controller
{


    public function index(){

        $hotel = Auth::guard('hotel')->user();
        return view('hotels.index',compact('hotel'));

    }



    public function reservations(){


        $bookers = Booker::with(['hotel:id,name_ar,name_en,pound','user:id,name'])->where('hotel_id','=',hotel()->id)
            ->orderBy('id','DESC')->simplePaginate(Max);

        return view('hotels.reservations',compact('bookers'));

    }


    //start create room type

    public function room_type_index(){


        $room_types = RoomType::with('hotel')->where('hotel_id','=',hotel()->id)
            ->orderBy('id','DESC')->simplePaginate(Max);

        return view('rooms.room_type_index',compact('room_types'));
    }


    public function room_type_create(){


        return view('rooms.room_type');
    }


    public function room_type(Request $request){



        $rules =
            [
                'room_type' => 'required',

            ];


        $messages = [

            'room_type.required' => __('hotels.room_type_create'),

        ];



        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput($request->all());

        }

        $room_type = RoomType::create([


            'room_type' => $request['room_type'],
            'hotel_id' => hotel()->id


        ]);


        return redirect()->back()->with('success',__('hotels.room_add'));


    }

    //end create room type

    public function block($id){


        $booker = Booker::findOrFail($id);
        $report = Report::where('booker_id',$id)->get();

        DB::transaction(function () use ($booker,$report){

            try {

                $booker->update([

                    'blocked' => $booker->blocked == 1 ? 0 : 1,
                    'vat_tax' => 0,
                    'municipal_tax' => 0,
                    'tourism_tax'  => 0,
                    'total_all'  => 0,
                    'total'  => 0,
                    'commission'  => 0,
                    'canceled' => 0,

                ]);

                $report->update([

                    'blocked' => 0,
                    'commission'  => 0,
                    'canceled' => 0,

                ]);

                DB::commit();

            }catch (\Exception $exception){

                DB::rollBack();

                return $exception->getMessage();
            }

        });



        return redirect()->back()->with('block',__('hotels.block'));

    }


    public function stay($id){


        $booker = Booker::findOrFail($id);
        $booker->update(['stayed' => $booker->stayed == 0 ? 1 : 0]);

        return redirect()->back()->with('block_stay',__('hotels.stay'));

    }


  public function show(){

      return view('hotels.login');
  }


    public function login(Request $request){

        $rules = [

            'email' => 'required|email',
            'password' => 'required',
        ];

        $message = [

            'email.required' => __('hotels.hotel_email'),
            'email.email' => __('hotels.hotel_email_ok'),
            'password.required' => __('hotels.hotel_password')
        ];


        $validator = Validator::make($request->all(),$rules,$message);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }


        if(auth()->guard('hotel')->attempt(['email' => $request['email'], 'password' => $request['password'],'blocked' => 1])){


            return redirect()->to('hotels/reservations')->with('welcome', __('hotels.message'));

        }
        else{

            return redirect()->back()->withInput($request->only('email'))->with('error',__('admin.error'));
        }

    }

    public function showRegister(){


        return view('hotels.register');
    }


    public function register(Request $request){


        $rules =
            [
            'country' => 'required',
            'manger' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'required|email|unique:hotels',
            'password' => 'required|min:8',
            'location_ar' => 'required',
            'location_en' => 'required',
            'pound' => 'required',
            'description' => 'required',
            'hotel_photos' => 'required|max:2048',
            'phone_hotel' => 'required|numeric',
            ];


            $messages = [

                'country.required'  => __('hotels.country'),
                'manger.required'  => __('hotels.manger'),
                'name_ar.required' => __('hotels.name_ar'),
                'name_en.required' => __('hotels.name_en'),
                'email.required' => __('hotels.email'),
                'email.email' => __('hotels.email_ok'),
                'email.unique' => __('hotels.unique'),
                'password.required' => __('hotels.password'),
                'password.min' => __('hotels.password_min'),
                'location_ar.required' => __('hotels.location_ar'),
                'location_en.required' => __('hotels.location_en'),
                'pound.required' => __('hotels.pound'),
                'description.required' => __('hotels.description'),
                'hotel_photos.required' => __('hotels.photo'),
                'phone_hotel.required' => __('hotels.phone_hotel'),
                'phone_hotel.numeric' => __('hotels.numeric'),


            ];



        $validator = Validator::make($request->all(),$rules,$messages);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput($request->all());

        }


        $data = [];

        if($request->hasfile('hotel_photos'))
        {

            foreach($request->file('hotel_photos') as $image)
            {
                $name= time() . rand(1,2000) . uniqid() . '.' . $image->getClientOriginalName();
                $image->move(public_path().'/hotels/', $name);
                $data[] = $name;
            }
        }



        $hotel = Hotel::create([


            'country' => $request['country'],
            'manger' => $request['manger'],
            'name_ar' => $request['name_ar'],
            'name_en' => $request['name_en'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'location_ar' => $request['location_ar'],
            'location_en' => $request['location_en'],
            'pound' => $request['pound'],
            'description' => $request['description'],
            'hotel_photos' => json_encode($data),
            'phone_hotel' => $request['phone_hotel'],

        ]);


        $data = [

            "name_ar" =>  " لقد تم تسجيل فندق جديد " . $request['name_ar'],
            'email' => $request['email'],

        ];


        event(new NewHotelNotification($data));

        return redirect()->back()->with('hotel',__('hotels.hotel'));


    }


    public function edit(){

        $hotel = Auth::guard('hotel')->user();

        return view('hotels.edit',compact('hotel'));
    }



    public function update(Request $request){




        $hotel = Auth::guard('hotel')->user();


        $rules = [

            'country' => 'required',
            'manger' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'email' => 'required|email|unique:hotels',
            'current_password' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required',
            'location_ar' => 'required',
            'location_en' => 'required',
            'pound' => 'required',
            'description' => 'required',
            'hotel_photos' => 'required|max:2048',
            'phone_hotel' => 'required|numeric',
        ];



        $messages = [

            'country.required'  => __('hotels.country'),
            'manger.required'  => __('hotels.manger'),
            'name_ar.required' => __('hotels.name_ar'),
            'name_en.required' => __('hotels.name_en'),
            'email.required' => __('hotels.email'),
            'email.email' => __('hotels.email_ok'),
            'email.unique' => __('hotels.unique'),
            'current_password.required' => __('hotels.current'),
            'confirm_password.required' => __('hotels.confirm_password'),
            'password.required' => __('hotels.password'),
            'password.min' => __('hotels.password_min'),
            'password.same' => __('hotels.same'),
            'location_ar.required' => __('hotels.location_ar'),
            'location_en.required' => __('hotels.location_en'),
            'pound.required' => __('hotels.pound'),
            'description.required' => __('hotels.description'),
            'hotel_photos.required' => __('hotels.photo'),
            'phone_hotel.required' => __('hotels.phone_hotel'),
            'phone_hotel.numeric' => __('hotels.numeric'),


        ];


        $validator = Validator::make($request->all(),$rules,$messages);

         if($validator->fails()){

             return redirect()->back()->withErrors($validator)->withInput($request->all());

         }

         //check current password with hotel of old password
        $password = $hotel->password;

        if (!Hash::check($request->current_password, $password)) {

            return redirect()->back()->with('current_password', __('hotels.current_password'));
        }



        //multiple images for hotels
        $data = [];
        if($request->hasfile('hotel_photos'))
        {

            foreach($request->file('hotel_photos') as $image)
            {
                $name= time() . rand(1,2000) . uniqid() . '.' . $image->getClientOriginalName();
                $image->move(public_path().'/hotels/', $name);
                $data[] = $name;

            }

        }

           //to remove all old images of hotels from public folder
           $images = json_decode($hotel->hotel_photos);
           foreach ($images as $image){

               unlink(public_path('hotels/') . $image);

           }



           //update hotel from dashboard hotel
            $hotel->update([

            'country' => $request['country'],
            'manger' => $request['manger'],
            'name_ar' => $request['name_ar'],
            'name_en' => $request['name_en'],
            'email' => $request['email'],//
            'password' => Hash::make($request['password']),//
            'location_ar' => $request['location_ar'],
            'location_en' => $request['location_en'],
            'pound' => $request['pound'],
            'description' => $request['description'],
            'phone_hotel' => $request['phone_hotel'],
            'hotel_photos' => json_encode($data),


        ]);


        return redirect()->route('hotels.all')->with('update',__('hotels.update'));



    }

    public function delete($id){

        $hotel = Hotel::findOrFail($id);

        //to remove all old images of hotels from public folder
        $images = json_decode($hotel->hotel_photos);
        foreach ($images as $image){

            unlink(public_path('hotels/') . $image);

        }

        $hotel->delete();
        return redirect()->route('hotels.all')->with('delete',__('hotels.delete'));

    }


    public function monthOfInvoices(){

        $first_day_of_month = Carbon::now()->firstOfMonth()->translatedFormat('l j F Y');//first of month
        $last_day_of_month = Carbon::now()->lastOfMonth()->translatedFormat('l j F Y');//last of month

        return view('hotels.month_invoices',compact('first_day_of_month','last_day_of_month'));


    }

    //invoices for hotel in every month and sum commissions and sum total to hotel
    public function invoices(){


        $hotel = Auth::guard('hotel')->user();

        $bookers = Booker::query()->where('hotel_id', $hotel->id)->whereMonth('created_at', date('m'))
       ->whereYear('created_at', date('Y'))->get();

        $commissions = Booker::query()
            ->where('hotel_id', $hotel->id)
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->select(DB::raw("(sum(commission)) as commission"))
            ->get();


        $totals = Booker::query()
            ->where('hotel_id', $hotel->id)
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->select(DB::raw("(sum(total)) as total"))
            ->get();


        return view('hotels.invoices',compact('bookers','commissions','totals','hotel'));

    }


    //start year of invoices


    public function yearOfInvoices(){


        $hotel = Auth::guard('hotel')->user();

        $commissions =  Report::query()->where('hotel_id', $hotel->id)
            ->where('blocked','=',true)
            ->select(DB::raw("(sum(commission)) as commission"),DB::raw("(sum(total)) as total"), DB::raw("(DATE_FORMAT(created_at, '%m-%Y')) as month_year"))
            ->orderBy('created_at')
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m-%Y')"))
            ->get();

        return view('hotels.year_invoices',compact('commissions','hotel'));


    }



}
