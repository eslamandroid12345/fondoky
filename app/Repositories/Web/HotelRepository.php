<?php


namespace App\Repositories\Web;


use App\Events\NewHotelNotification;
use App\Http\Requests\HotelLoginRequest;
use App\Http\Requests\RoomTypeRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Interfaces\Web\HotelRepositoryInterface;
use App\Models\Booker;
use App\Models\Hotel;
use App\Models\Rate;
use App\Models\Report;
use App\Models\RoomType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HotelRepository implements HotelRepositoryInterface
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



    public function room_type_index(){


        $room_types = RoomType::with('hotel')->where('hotel_id','=',hotel()->id)->orderBy('id','DESC')->simplePaginate(Max);

        return view('rooms.room_type_index',compact('room_types'));
    }


    public function room_type_create(){


        return view('rooms.room_type');
    }


    public function room_type(RoomTypeRequest $request){


        try {

            $room_type = new RoomType();
            $room_type->room_type = $request->room_type;
            $room_type->hotel_id = hotel()->id;
            $room_type->save();

            return redirect()->back()->with('success',__('hotels.room_add'));


        }catch (\Exception $exception){

            return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);
        }



    }


    public function block($id){



        DB::beginTransaction();


        try {


            $booker = Booker::findOrFail($id);
            $report = Report::where('booker_id',$id)->first();

            $booker->blocked = $booker->blocked == 1 ? 0 : 1;
            $booker->vat_tax = 0;
            $booker->municipal_tax = 0;
            $booker->tourism_tax = 0;
            $booker->total_all = 0;
            $booker->total = 0;
            $booker->commission = 0;
            $booker->canceled = 0;
            $booker->save();


            $report->total = 0;
            $report->commission = 0;
            $report->blocked = 0;
            $report->canceled = 0;
            $report->save();


            DB::commit();


            }catch (\Exception $exception){

                 DB::rollBack();
                 return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);

            }


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


    public function login(HotelLoginRequest $request){


        if(auth()->guard('hotel')->attempt(['email' => $request->email, 'password' => $request->password,'blocked' => 1])){


            return redirect()->to('hotels/home');

        }else{

            return redirect()->back()->withInput($request->only('email'))->with('error',__('admin.error'));
        }

    }

    public function showRegister(){


        return view('hotels.register');
    }


    public function register(StoreHotelRequest $request){


        try {


            $data = [];

            if($request->hasfile('hotel_photos')) {

                foreach($request->file('hotel_photos') as $image) {

                    $name= time() . rand(1,2000) . uniqid() . '.' . $image->getClientOriginalName();
                    $image->move(public_path().'/hotels/', $name);
                    $data[] = $name;
                }
            }

            $hotel = new Hotel();
            $hotel->country = $request->country;
            $hotel->country_en = $request->country_en;
            $hotel->manger = $request->manger;
            $hotel->name_ar =  $request->name_ar;
            $hotel->name_en =  $request->name_en;
            $hotel->email = $request->email;
            $hotel->password = Hash::make($request->password);
            $hotel->location_ar = $request->location_ar;
            $hotel->location_en = $request->location_en;
            $hotel->pound = $request->pound;
            $hotel->currency_en = $request->currency_en;
            $hotel->description = $request->description;
            $hotel->hotel_photos = json_encode($data);
            $hotel->phone_hotel = $request->phone_hotel;
            $hotel->save();


            $data = [

                "name_ar" =>  " لقد تم تسجيل فندق جديد " . $request->name_ar,
                'email' => $request->email,

            ];


            event(new NewHotelNotification($data));

            return redirect()->back()->with('hotel',__('hotels.hotel'));


        }catch (\Exception $exception){

            return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);
        }



    }


    public function edit(){

        $hotel = hotel();

        return view('hotels.edit',compact('hotel'));
    }



    public function update(UpdateHotelRequest $request){


        try {

            $hotel = auth()->guard('hotel')->user();


            if (Hash::check($request->current_password, $hotel->password)) {


                $data = [];
                if ($request->hasfile('hotel_photos')) {

                    foreach ($request->file('hotel_photos') as $image) {
                        $name = time() . rand(1, 5000) . uniqid() . '.' . $image->getClientOriginalName();
                        $image->move(public_path() . '/hotels/', $name);
                        $data[] = $name;

                    }

                }


                //to remove all old images of hotels from public folder
                $images = json_decode($hotel->hotel_photos, true);
                foreach ($images as $image) {

                    unlink(public_path('hotels/') . $image);

                }

                $hotel->country = $request->country;
                $hotel->country_en = $request->country_en;
                $hotel->manger = $request->manger;
                $hotel->name_ar = $request->name_ar;
                $hotel->name_en = $request->name_en;
                $hotel->email = $request->email;
                $hotel->password = Hash::make($request->password);
                $hotel->location_ar = $request->location_ar;
                $hotel->location_en = $request->location_en;
                $hotel->pound = $request->pound;
                $hotel->currency_en = $request->currency_en;
                $hotel->description = $request->description;
                $hotel->hotel_photos = json_encode($data);
                $hotel->phone_hotel = $request->phone_hotel;
                $hotel->save();

                auth()->guard('hotel')->logout();

                return redirect()->route('hotels.show');


            }else{

                return redirect()->back()->with('current_password', __('hotels.current_password'));

            }

        }catch (\Exception $exception){

            return  redirect()->back()->withErrors(["error" => $exception->getMessage()]);
        }



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


        return view('hotels.month_invoices');


    }



    public function invoices(){



        $bookers = Booker::where('hotel_id', hotel()->id)->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))->get();

        $commissions = Booker::where('hotel_id', hotel()->id)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))
            ->select(DB::raw("(sum(commission)) as commission"))
            ->get();


        $totals = Booker::where('hotel_id', hotel()->id)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))
            ->select(DB::raw("(sum(total)) as total"))
            ->get();


        return view('hotels.invoices',compact('bookers','commissions','totals'));

    }




    public function arrivals(){

        $bookers = Booker::whereDay('date_arrive',Carbon::now()->format('d'))->with(['hotel:id,name_ar,name_en,pound,currency_en','user:id,name'])->where('hotel_id','=',hotel()->id)
            ->orderBy('id','DESC')->simplePaginate(Max);

        return view('hotels.arrivals',compact('bookers'));

    }


    public function home()
    {

        $rates_count = Rate::with(['hotel'])->where('hotel_id','=',hotel()->id)->sum('rates_number');

        return view('hotels.home',compact('rates_count'));
    }



}