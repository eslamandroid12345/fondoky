<?php

namespace App\Repositories\Web;
use App\Events\NewHotelNotification;
use App\Http\Requests\HotelLoginRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Interfaces\Web\HotelRepositoryInterface;
use App\Models\Comment;
use App\Models\Hotel;
use App\Models\Invoice;
use App\Models\Rate;
use App\Models\Reservation;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use PDF;
use Yajra\DataTables\Facades\DataTables;

class HotelRepository implements HotelRepositoryInterface{

    public function index(){

        $hotel = auth()->guard('hotel')->user();
        return view('hotels.index',compact('hotel'));

    }

    public function reservations(Request $request){

        $reservations = Reservation::query()->with(['hotel:id','room:id,room_type','user:id,name,phone'])->where('hotel_id','=',auth('hotel')->id());

        if($request->has('check_in') && $request->get('check_in') != '')
           $reservations->whereDate('check_in', '=',$request->check_in);

        if($request->has('check_out') && $request->get('check_out') != '')
            $reservations->whereDate('check_out', '=',$request->check_out);

        if($request->has('name') && $request->get('name') != '')
            $reservations->whereHas('user', function ($user) use($request){
                $user->where('name','LIKE','%'. $request->name .'%');});

        if($request->has('phone') && $request->get('phone') != '')
            $reservations->whereHas('user', function ($user) use($request){
                $user->where('phone','LIKE','%'. $request->phone .'%');});

        $invoices = $reservations->orderBy('id','DESC')->simplePaginate(2);

        return view('hotels.reservations',compact('invoices'));
    }

    public function block($id){

    try {

        $reservation = Reservation::findOrFail($id);
        $reservation->update([

            'status' => $reservation->status = $reservation->status == 1 ? 0 : 1,
            'vat_tax' => 0,
            'municipal_tax' => 0,
            'tourism_tax' => 0,
            'total_all' => 0,
            'total' => 0,
            'commission' => 0,
            'stayed' => 0,

        ]);

        }catch (\Exception $exception){

        return helperJson(null,$exception->getMessage(),500,500);
    }

    toastr()->error(__('hotels.block'));
    return redirect()->back();

    }


    public function stay($id){

        $invoice = Reservation::findOrFail($id);
        $invoice->update([

            'stayed' => $invoice->stayed == 1 ? 0 : 1

        ]);

        toastr()->success(__('hotels.stay'));
        return redirect()->back();

    }

    public function show(){

        return view('hotels.login');
    }


    public function login(HotelLoginRequest $request){

        if(auth()->guard('hotel')->attempt(['email' => trim($request->email," "), 'password' => trim($request->password," "),'blocked' => 1])){

            toastr()->success(__('hotels.hello'));
            return redirect()->to(RouteServiceProvider::HOTEL);

        }else{

            toastr()->error(__('admin.error'));
            return redirect()->back()->withInput($request->only('email'));
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

            $hotel = Hotel::create([
            'manger' => $request->manger,
            'name_ar' =>  $request->name_ar,
            'name_en' =>  $request->name_en,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'location_ar' => $request->location_ar,
            'location_en' => $request->location_en,
            'currency_ar' => $request->currency_ar,
            'currency_en' => $request->currency_en,
            'description' => $request->description,
            'hotel_photos' => json_encode($data),
            'phone_hotel' => $request->phone_hotel,
            'slug' => Str::slug($request->description,"-","ar"),
            ]);

            $data = [

                "name_ar" =>   lang() == 'ar' ? __("hotels.message_register") . $request->name_ar : __("hotels.message_register") .  $request->name_en,
                'email' => $request->email,

            ];

            event(new NewHotelNotification($data));

            toastr()->success(__('hotels.hotel'));
            return redirect()->route('hotels.show');

        }catch (\Exception $exception){

            return helperJson(null,$exception->getMessage(),500,500);

        }

    }

    public function edit(){

        $hotel = auth()->guard('hotel')->user();

        return view('hotels.edit',compact('hotel'));
    }

    public function update(UpdateHotelRequest $request){

        try {

            $hotel = auth()->guard('hotel')->user();
            if (!Hash::check($request->current_password, $hotel->password)) {

                return redirect()->back()->with('current_password', __('hotels.current_password'));

             }

            $data = [];
            if ($request->hasfile('hotel_photos')) {

                 foreach ($request->file('hotel_photos') as $image) {

                    $name = time() . rand(1, 5000) . uniqid() . '.' . $image->getClientOriginalName();
                    $image->move(public_path() . '/hotels/', $name);
                    $data[] = $name;

                     $images = json_decode($hotel->hotel_photos, true);

                     foreach ($images as $image) {

                         if(file_exists(public_path('hotels/' . $image) )){

                             unlink(public_path('hotels/') . $image);

                         }else{

                             return helperJson(null,"Error to delete old images",500,500);
                         }
                     }
                }
           }//end if

            $hotel->update([
                'manger' => $request->manger,
                'name_ar' =>  $request->name_ar,
                'name_en' =>  $request->name_en,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'currency_ar' => $request->currency_ar,
                'currency_en' => $request->currency_en,
                'description' => $request->description,
                'hotel_photos' => ($request->hasfile('hotel_photos')) ? json_encode($data): $hotel->hotel_photos,
                'phone_hotel' => $request->phone_hotel,
            ]);

            auth()->guard('hotel')->logout();
            toastr()->error(__('hotels.logout_message'));

                return redirect()->route('hotels.show');


        }catch (\Exception $exception){

            return helperJson(null,$exception->getMessage(),500,500);
        }
    }

    public function delete($id){

        try {

            $hotel = Hotel::findOrFail($id);

            $images = json_decode($hotel->hotel_photos);
             foreach ($images as $image){

                if(file_exists(public_path('hotels/' . $image) ) && $hotel->hotel_photos != NULL){

                    unlink(public_path('hotels/') . $image);

                }else{

                    return returnMessageError("Error to remove rooms images",500);

                }
            }

             $hotel->delete();
             toastr()->error(__('hotels.delete'));
             return redirect()->route('hotels.all');

        }catch (\Exception $exception){

            return helperJson(null,$exception->getMessage(),500,500);
        }
    }


    //depart of invoices
    public function monthOfInvoices(){

        $invoice = Invoice::with('hotel')->where('hotel_id','=',auth('hotel')->id())->whereMonth('date_of_start','=',date('m'))->first();

        return view('hotels.month_invoices',compact('invoice'));

    }

    public function invoices($month,$year){

        $invoices = Reservation::invoicesReservation($month,$year)->get();

        $commissions = Reservation::SumAmountOfCommissionEveryMonth($month,$year);
        $totals = Reservation::SumAmountOfTotalEveryMonth($month,$year);
        return view('hotels.invoices',compact('invoices','commissions','totals'));

    }


    public function arrivals(){

        $invoices =  Reservation::with(['user:id,name,phone','hotel','room' => function($room){

            $room->select('id','room_type');

        }])->where('hotel_id','=',auth('hotel')->id())->whereDay('check_in',Carbon::now()->format('d'))
            ->whereMonth('check_in', date('m'))
            ->whereYear('check_in', date('Y'))->orderBy('id','DESC')->get();

        return view('hotels.arrivals',compact('invoices'));

    }

    public function comment(StoreCommentRequest $request){

        try {

            Comment::create([
             'comment' => $request->comment,
             'hotel_id' => $request->hotel_id,
             'user_id' => auth()->id(),
            ]);

            toastr()->success(__('welcome.comment'));
            return redirect()->back();

        }catch (\Exception $exception){

            return helperJson(null,$exception->getMessage(),500,500);
        }
    }


    public function rates(){

        $rates = Rate::with(['user:id,name','hotel:id'])
            ->where('hotel_id','=',auth('hotel')->id())->latest()->simplePaginate(6);

        return view('rates-hotel.index',compact('rates'));
    }

    public function comments(){

        $comments = Comment::with(['user:id,name','hotel:id'])
            ->where('hotel_id','=',auth('hotel')->id())->latest()->simplePaginate(6);

        return view('comment-hotel.index',compact('comments'));

    }



    public function arrivalsPdf($id){

        $invoice =  Reservation::with(['user:id,name,phone','hotel','room' => function($room){
            $room->select('id','room_type');

        }])->where('hotel_id','=',auth('hotel')->id())->whereDay('check_in',Carbon::now()->format('d'))
            ->whereMonth('check_in', date('m'))
             ->whereYear('check_in', date('Y'))->orderBy('id','DESC')
              ->where('id','=',$id)->first();


        Gate::authorize('invoice-arrivals',$invoice);

        $pdf = PDF::loadView('hotels.arrivals_pdf', compact('invoice'));
        return $pdf->stream('myHotel.pdf');

    }

    public function invoicesAll(){

        $invoices = Invoice::with('hotel')->where('hotel_id','=',auth('hotel')->id())->get();
        return view('hotels.invoices_all.invoices_all',compact('invoices'));

    }

}
