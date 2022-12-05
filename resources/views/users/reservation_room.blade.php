@extends('client_app.layout')

@section('style')
    <style>
        *{

            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }

        a{

            text-decoration: none;
        }

        body{

            font-family: 'Tajawal', sans-serif;
            direction: rtl;

        }


        .navbar-light .navbar-toggler{

            border: none;
            outline: none;
        }

        .navbar-toggler{

            font-size: 1.3rem;
            display: none;

        }

        .navbar-toggler i{

            color: #fff;
        }

        .navbar-toggler:focus{
            text-decoration: none;
            outline: 0;
            box-shadow: 0 0 0 0rem;
        }

        .navbar .navbar-brand{

            font-size: 23px;
            color: #282828bd;
        }

        .navbar{

            direction: rtl;
            padding-top: 0.4rem;
            padding-bottom: 0.2rem;
        }


        .navbar .data{

            margin: 0px;
        }

        .navbar .data li{

            list-style-type: none;
            float: left;
            padding: 15px 10px;
            margin: 0px;

        }

        .navbar .data li a i{

            padding-left: 8px;
            font-size: 14px;
            color: #ddd;
        }

        .navbar .data li a{

            text-decoration: none;
            color: #fff;
            font-size: 14.5px;
        }

        .navbar img{

            width: 70px;
        }

        .bg-light {
            --bs-bg-opacity: 1;
            background-color: #1a789b!important;
        }

        .navbar-nav a i{

            padding-left: 8px;
            font-size: 14px;
            color: #999;

        }

        .navbar-nav .nav-item{

            padding: 6px 0px;
        }







        @media(max-width:768px){




            .navbar-toggler{

                font-size: 1rem;
                display: block;

            }


            .navbar .data{

                list-style-type: none;
                float: left;
                padding: 15px 10px;
                margin: 0px;
                display: none;

            }

            .navbar{

                direction: rtl;
                padding-top: 0.3rem;
                padding-bottom: 0.3rem;
            }

        }




        /**Start Reservation**/

        .reservation{

            margin-top: 74px;
            padding: 20px 0px;
            margin-bottom: 10px;


        }

        .reservation .Reservation1{

            padding: 10px 0px;

        }

        .reservation .Reservation1 img{

            width: 80%;
            margin-bottom: 7px;
            height: 45px;

        }

        .reservation .Reservation2{

            padding: 10px 0px;

        }

        .reservation .Reservation2 img{

            width: 23%;
            height: 150px;
            margin-bottom: 10px;
            margin-left: 2.5px;
            margin-right: 2.5px;

        }

        .reservation .Reservation3{

            padding: 15px 20px;
            border-radius: 3px;

        }

        .reservation .Reservation3 form input[type="submit"]{

            background-color: #48667c;
            color: #fff;
            border: none;

        }

        .reservation .Reservation3 label{

            font-size: 14px;
        }

        .reservation .Reservation3 input{

            display: block;
            margin-bottom: 10px;
            width: 100%;
            outline: none;
            padding: 4px 3px;
            border-radius: 3px;
            border: 1px solid #666;
        }

        .reservation .Reservation4 label{

            font-size: 14px;
        }

        .reservation .Reservation5 table{

            width: 100%;
            margin-top: 10px;
        }

        .reservation .Reservation5 table tr th{

            border: 1px solid #555;
            padding: 12px 20px;
            font-size: 12px;
            background-color: #19637e;
            color: #fff;
        }

        .reservation .Reservation5 table tr td{

            border: 1px solid #555;
            padding: 12px 20px;
            font-size: 12px;

        }

        .reservation .Reservation5 input{

            margin-bottom: 10px;
            width: 17%;
            border: none;
            outline: none;
            padding: 4px 3px;
            border-radius: 3px;
            border: 1px solid #666;
            margin-left: 10px;
        }

        .reservation .Reservation5 input[type="submit"]{

            background-color: #19637e;
            color: #fff;
            font-weight: bold;
        }



        .reservation .Reservation4 p{

            font-size: 14px;
            text-align: justify;
            line-height: 1.8em;

        }

        .reservation .Reservation1 img{

            cursor: pointer;

        }

        .reservation .Reservation4{

            padding: 30px 0px;
            width: 90%;

        }

        .reservation .Reservation4 ul li{

            padding: 5px;
            font-size: 14px;
        }

        @media(max-width:768px){

            .reservation .Reservation1 img{

                width: 10%;
                margin-bottom: 7px;
                height: 45px;

            }

            .reservation .Reservation5 table tr th{

                border: 1px solid #555;
                padding: 12px 20px;
                font-size: 11px;
                background-color: #19637e;
                color: #fff;
            }

            .reservation .Reservation5 table tr td{

                border: 1px solid #555;
                padding: 12px 20px;
                font-size: 11px;

            }

            .reservation .Reservation5 input{

                margin-bottom: 10px;
                width: 100%;
                border: none;
                outline: none;
                padding: 4px 3px;
                border-radius: 3px;
                border: 1px solid #666;
                margin-left: 10px;
                display: block;
            }

            .reservation .Reservation2 img{

                width: 100%;
                height: 200px;
                margin-left: 2.5px;
                margin-right: 2.5px

            }

        }

        /**End Reservation**/

        /**Start Footer**/

        .foot1{

            display: flex;
            align-items: flex-end;
        }
        .footer{

            background-color: #196581!important;
            direction: ltr;
        }

        .footer p{

            padding: 0px;
            margin: 0px;
            color: #bbb;
            font-size: 14px;
        }

        .footer p a i{

            padding: 25px 10px;
            color: #bbb;
            font-size: 14px;
        }

        .footer .para2{

            padding: 20px 0px;
        }


        .footer .para22{

            text-align: right;

        }

        @media(max-width:768px)
        {


            .footer .para2{

                padding: 10px 0px;
            }

            .footer p a i {
                padding: 15px 10px;
                color: #bbb;
                font-size: 14px;
            }

        }

        /**End Footer**/
        *::before, *::after {
            box-sizing: border-box;
        }
        *::-webkit-scrollbar {
            width: 4px;
            height: 4px;
            transition: .3s;
        }
        ::-webkit-scrollbar-thumb {
            background: #e1e6f1;
        }

        .container {
            width: 98%;
        }


        /**Start download**/

        .down{

            padding: 20px 0px;

        }

        .down img{

            padding: 3px 0px;
            width: 100px;
            height: 50px;

        }

        .down p{


            font-size: 13px;
            padding: 10px 0px;
            color: #777;

        }

        .down h3{

            font-size: 16px;
            color: #666;

        }

        /**End download**/


        /**Start head-location**/
        .head-location{

            padding: 40px 0px;
            background-color: #1a789b;

        }

        .head-location .head-location1{

            color: #fff;
            width: 30%;
            margin-left: 3%;

        }

        .head-location .head-location1 p,.head-location .head-location2 p,.head-location .head-location2 p a{

            font-size: 13.5px;
            text-align: justify;
            color: #eee;

        }

        .head-location .head-location2 p a i{

            font-size: 11px;
            padding-left: 4px;

        }

        .head-location .head-location1 h3{

            font-size: 16px;
            padding-bottom: 15px;

        }

        .head-location .head-location2 h3{

            color: #fff;
            font-size: 16px;
            padding-bottom: 15px;

        }

        @media(max-width:768px){

            .head-location .head-location1{

                width: 100%;

            }

            .head-location .head-location2{

                padding-top: 10px;

            }

            .footer .para22{

                text-align: left;

            }

        }

        input{

            height: 40px;
            border: 1px solid #ccc;
            outline: none;
            padding: 7px;
        }

        /**End head-location**/
    </style>

    @if(LaravelLocalization::setLocale() == 'en')
        <style>
            table{

                direction: ltr;
            }
            .Reservation5,.Reservation2,.Reservation3,.row{

                direction: ltr;
            }
        </style>
    @endif
@endsection


@section('content')

    <div class="reservation">
        <div class="container">
            <div class="row">

                <div class="col-lg-9 col-12 Reservation2">
                    <div class="row">

                        @if(count(json_decode($room->images)) == 1)
                            @foreach(json_decode($room->images) as $image)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-1">

                                    <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach

                        @elseif(count(json_decode($room->images)) == 2)

                            @foreach(json_decode($room->images) as $image)
                                <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-1">

                                    <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach


                        @elseif(count(json_decode($room->images)) == 3)

                            @foreach(json_decode($room->images) as $image)
                                <div class="col-lg-4 col-md-4 col-sm-12 col-12 my-1">

                                    <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach


                        @else

                            @foreach(json_decode($room->images) as $image)
                                <div class="col-lg-3 col-md-3 col-sm-12 col-12 my-1">

                                    <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach

                        @endif

                    </div>
                    <div class="col-lg-12 col-12 Reservation4">

                        <h5>{{$room->room_type}}</h5>
                        <p>{{$room->room_description}}</p>


                    </div>

                    <div class="col-lg-12 col-12 Reservation4">

                        <h5>{{__('welcome.services')}}</h5>
                        <ul type="none" class="row">

                            @if($room->roomService()->exists())

                                @foreach($room->roomService as $service)
                                    <li class="col-lg-3">{{$service->name}}</li>
                                @endforeach


                            @endif

                        </ul>

                    </div>

                </div>



                <div class="col-lg-3 col-12 Reservation3">


                    <form action="{{route('reservations.store',$room->id)}}" method="POST" autocomplete="off">

                        @csrf
                        <label for="">{{__('users.city')}}</label>
                        <input type="text" name="destination" value="{{request()->query('country')}}" readonly>
                        @error('destination')  <span class="text-danger">{{$message}} </span> @enderror

                        <label for="">{{__('users.date_arrive')}}</label>
                        <input type="date"  name="check_in" value="{{ request()->query('date_start')}}" readonly>
                        @error('date_start')  <span class="text-danger">{{$message}} </span> @enderror


                        <label for="">{{__('users.date_leave')}}</label>
                        <input type="date" name="check_out" value="{{ request()->query('date_expire')}}" readonly>
                        @error('date_expire')  <span class="text-danger">{{$message}} </span> @enderror

                        <label for="">{{__('users.adults')}}</label>
                        <input type="number" name="adults" value="{{$room->adults_max}}" readonly>
                        @error('adults')  <span class="text-danger">{{$message}} </span> @enderror

                        <label for="">{{__('users.children')}}</label>
                        <input type="number" name="children" value="{{$room->child_max}}" readonly>
                        @error('children')  <span class="text-danger">{{$message}} </span> @enderror


                        <input type="hidden" name="room_id" value="{{$room->id}}">
                        <input type="hidden" name="hotel_id" value="{{$room->hotel->id}}">

                        {{-- start calculate num of nigts --}}


                        @php
                            $begin = new DateTime(request()->query('date_start'));
                            $end   = new DateTime(request()->query('date_expire'));


                            $different = $begin->diff($end);
                            $days = $different->format('%a');//now do whatever you like with $days

                        @endphp
                        <input type="hidden" name="num_of_nights"  value="{{$days}}" readonly>


                            <?php


                            $price = 0;
                            foreach($room_price as $total){

                                $price += $total->room_price;
                            }

                            ?>


                        <input type="hidden" value="{{$price}}" id="price" onkeyup="sum()" readonly>

                        {{-- end calculate num of nigts --}}


                        <label for="">{{__('users.room_number')}}</label>
                        <input type="number" name="room_number" id="room" onkeyup="sum()">
                        @error('room_number')  <span class="text-danger">{{$message}} </span> @enderror


                        {{--start money--}}
                        <input type="hidden" name="total" id="result" readonly>
                        <input type="hidden" name="tourism_tax" id="tourism_tax" readonly>
                        <input type="hidden" name="municipal_tax" id="municipal_tax" readonly>
                        <input type="hidden" name="vat_tax" id="vat_tax" readonly>
                        <input type="hidden" name="commission" id="commission" readonly>
                        {{--end money--}}


                        <label for="">{{__('users.total')}} {{lang() == 'ar' ? $room->hotel->currency_ar : $room->hotel->currency_en}}</label>
                        <input type="number" name="total_all" id="total_all" value="0" readonly>
                        <input type="submit" value="{{__('welcome.booking')}}">


                    </form>

                </div>



                <div class="col-lg-12 col-12 Reservation5">

                    <table>

                        <tr>
                            <th>{{__('users.room_number')}}</th>
                            <th>{{__('users.room_price')}}</th>
                            <th>{{__('users.start')}}</th>
                            <th>{{__('users.end')}}</th>
                        </tr>
                        @foreach($calendars as $calendar)

                            <tbody>
                            <tr>
                                <td>{{$calendar->room_number > 0 ? $calendar->room_number : 'Sold'}}</td>
                                <td>{{ lang() == 'ar' ? number_format($calendar->room_price,2) . $calendar->room->hotel->currency_ar : number_format($calendar->room_price,2) . $calendar->room->hotel->currency_en}}</td>
                                <td>{{$calendar->check_in}}</td>
                                <td>{{$calendar->check_out}}</td>
                            </tr>

                            </tbody>

                        @endforeach
                    </table>



                </div>




            </div>
        </div>
    </div>


@endsection

@section('scripts')

    <script>
        function sum() {

            var room = document.getElementById('room').value;
            var price = document.getElementById('price').value;


            var result =  parseFloat(room) * parseFloat(price);

            if (!isNaN(result)) {

                document.getElementById('result').value = result;
            }


            var tourism_tax = (( parseFloat(room) * parseFloat(price) * 4) / 100);


            if (!isNaN(tourism_tax)) {

                document.getElementById('tourism_tax').value = tourism_tax;
            }


            var municipal_tax = (( parseFloat(room) * parseFloat(price) * 5) / 100);


            if (!isNaN(municipal_tax)) {

                document.getElementById('municipal_tax').value = municipal_tax;
            }



            var vat_tax = ((parseFloat(room) * parseFloat(price) * 5) / 100);


            if (!isNaN(vat_tax)) {

                document.getElementById('vat_tax').value = vat_tax;
            }



            var total_all = (parseFloat(room) * parseFloat(price) + vat_tax + municipal_tax + tourism_tax);


            if (!isNaN(total_all)) {

                document.getElementById('total_all').value = total_all;

            }else{


                document.getElementById('total_all').value = 0;
                document.getElementById('result').value = 0;
                document.getElementById('vat_tax').value = 0;
                document.getElementById('tourism_tax').value = 0;
                document.getElementById('municipal_tax').value = 0;
                document.getElementById('commission').value = 0;

            }

            var commission = (( parseFloat(room) * parseFloat(price) * 5) / 100);


            if (!isNaN(commission)) {

                document.getElementById('commission').value = commission;
            }

        }


    </script>

@endsection