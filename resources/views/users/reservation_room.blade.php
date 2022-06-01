<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Hotel</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=Mulish:wght@200;300;400;500;600;700;800;900&family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{asset('web/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/Reservation.css')}}">
    <link rel="stylesheet" href="{{asset('web/style.css')}}">



</head>


@include('web.header')

<!--Start Reservation-->

<div class="reservation">
    <div class="container">
        <div class="row">



            <div class="col-lg-8 col-12 Reservation2">


                    @if($message = Session::get('errors'))
                        <div id="alert" class="row mr-2 ml-2">
                            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                                    id="type-error">{{$message}}
                            </button>
                        </div>
                    @endif

                   @foreach(json_decode($room->images) as $image)
                    <img src="{{URL::to('/rooms/'.$image)}}" class="card-img-top" alt="...">
                    @endforeach


                     <h3>{{ $room->hotel->name_ar}} - {{$room->hotel->country}}</h3>
                    <p>{{$room->room_description}}</p>



                    <div class="services">
                    <ol class="row">
                        {{--check of services --}}
                        <h4>خدمات الفندق</h4>

                      @if($room->hotel->service()->exists())

                            @foreach(json_decode($room->hotel->service->services) as $service)
                                <li class="col-lg-4 col-12">{{$service}}</li>
                            @endforeach

                        @else
                            <h3>لا يوجد خدمات بهذا الفندق متاحه الان</h3>

                        @endif
                    </ol>
                    </div>
                </div>


            <div class="col-lg-4 col-12 Reservation3">

                <form action="{{route('bookers.store',$room->id)}}" method="POST">

                    @csrf
                    <label for="">الوجهة </label>
                    <input type="text" name="city_to" value="{{$room->hotel->country}}" readonly>

                    <label for="">نوع الغرفه </label>
                    <input type="text" name="room_type" value="{{$room->room_type->room_type}}" readonly>

                    <label for="">تاريخ الوصول</label>
                    <input placeholder="تاريخ الوصول" class="textbox-n" type="text" onfocus="(this.type='date')" id="date" name="date_arrive" value="{{ request()->query('date_start')}}" readonly>
                    <label for="">تاريخ المغادرة</label>
                    <input placeholder="تاريخ المغادره" class="textbox-n" type="text" onfocus="(this.type='date')" id="date" name="date_leave" value="{{ request()->query('date_expire')}}" readonly>
                    <label for="">الاشخاص البالغين</label>
                    <input type="number" name="adults_max" value="{{$room->adults_max}}" readonly>
                    <label for="">عدد الاطفال</label>
                    <input type="number" name="child_max" value="{{$room->child_max}}" readonly>


                    <input type="hidden" name="hotel_id" value="{{$room->hotel->id}}">




                       {{-- start calculate num of nigts --}}
                       @php
                        $to =     \Carbon\Carbon::createFromFormat('Y-m-d', request()->query('date_start'));
                        $from =   \Carbon\Carbon::createFromFormat('Y-m-d', request()->query('date_expire'));

                        $diff_in_days = $to->diffInDays($from);

                       @endphp

                    {{-- end calculate num of nigts --}}


{{--                    <label for="">عدد الليالي</label>--}}

                    <input type="hidden" name="num_of_nights" id="nights" onkeyup="sum()" value="{{$diff_in_days}}" readonly>



                        <label for="">سعر الغرفه</label>
                        <input type="text" name="room_price" value="{{decrypt(request()->query('key'))}}" id="price" onkeyup="sum()" readonly>







                        <label for="">عدد الغرف</label>
                      <input type="number" name="room_number" id="room" onkeyup="sum()">
                      <input type="hidden" name="total" id="result" value="0.00">
                      <input type="hidden" name="tourism_tax" id="tourism_tax" value="0.00">
                      <input type="hidden" name="municipal_tax" id="municipal_tax" value="0.00">
                      <input type="hidden" name="vat_tax" id="vat_tax" value="0.00">
                      <label for="">االمجموع شاملاً ضريبة القيمة المضافة</label>
                      <input type="text" name="total_all" id="total_all" value="0">
                    <input type="hidden" name="commission" id="commission" value="0.00">
                     <br><input type="submit" value="احجز الان">

                </form>
            </div>
        </div>
    </div>
</div>




@include('web.footer')

<script src="{{asset('js/jquery2.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/show.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


<script>
    $( function() {
        $( ".datepicker" ).datepicker({ minDate: -20, maxDate: "+1M +10D" });
    } );
</script>


<script>
   function sum() {

       var nights = document.getElementById('nights').value;
       var room = document.getElementById('room').value;
       var price = document.getElementById('price').value;


       var result = parseFloat(nights) * parseFloat(room) * parseFloat(price);

       if (!isNaN(result)) {

           document.getElementById('result').value = result;
       }


       var tourism_tax = ((parseFloat(nights) * parseFloat(room) * parseFloat(price) * 4) / 100);


       if (!isNaN(tourism_tax)) {

           document.getElementById('tourism_tax').value = tourism_tax;
       }


       var municipal_tax = ((parseFloat(nights) * parseFloat(room) * parseFloat(price) * 5) / 100);


       if (!isNaN(municipal_tax)) {

           document.getElementById('municipal_tax').value = municipal_tax;
       }



       var vat_tax = ((parseFloat(nights) * parseFloat(room) * parseFloat(price) * 5) / 100);


       if (!isNaN(vat_tax)) {

           document.getElementById('vat_tax').value = vat_tax;
       }



       var total_all = (parseFloat(nights) * parseFloat(room) * parseFloat(price) + vat_tax + municipal_tax + tourism_tax);


       if (!isNaN(total_all)) {

           document.getElementById('total_all').value = total_all;

       }else{

           document.getElementById('total_all').value = 0;

       }



       var commission = ((parseFloat(nights) * parseFloat(room) * parseFloat(price) * 5) / 100);


       if (!isNaN(commission)) {

           document.getElementById('commission').value = commission;
       }

   }

</script>

<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
</body>
</html>
