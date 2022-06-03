<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">



    <style>

        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;500&display=swap');

        body{

            font-family: 'Cairo', sans-serif;

        }

        .form-group{

            text-align: right;
        }

        .fall{

            background: #f2f2f2;
            border-radius: 7px;
        }

        label{

            font-size: 14px;
        }
        table{

            direction: rtl;
        }


        .fall-4{


            text-align: right;
        }

        .fall-4 ul li{

            list-style-type: none;
            line-height: 33px;
        }

        img{

            height: 430px;
        }

        table thead tr th{

            background: #17a2b8;
            color: #fff;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
            font-size: 14px;


        }
        table tbody tr td:nth-child(2n){
            background: #f2f2f2;
        }
        table tbody tr td{
            border-bottom: 1px solid #ccc;
            padding: 10px;
            text-align: center;
            font-size: 14px;

        }

        input{

            text-align: right;

        }

        .tap{

            text-align: right;
        }


    </style>
</head>
<body>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-12 mt-3">
            <div class="py-5 fall">

                <div class="container">

                    <form action="{{route('bookers.store',$room->id)}}" method="POST" autocomplete="off">

                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">الوجهه</label>
                            <input type="text" name="city_to" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$room->hotel->country}}">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">نوع الغرفه</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="room_type" value="{{$room->room_type->room_type}}" readonly>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">تاريخ الوصول</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" onfocus="(this.type='date')" id="date" name="date_arrive" value="{{ request()->query('date_start')}}" readonly>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">تاريخ المغادره</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" onfocus="(this.type='date')" id="date" name="date_leave" value="{{ request()->query('date_expire')}}" readonly>
                        </div>

                        <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="adults_max" value="{{$room->adults_max}}" readonly>

                        <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="child_max" value="{{$room->child_max}}" readonly>
                        <input type="hidden" name="hotel_id" value="{{$room->hotel->id}}">


                        {{-- start calculate num of nigts --}}
                        @php
                            $to =     \Carbon\Carbon::createFromFormat('Y-m-d', request()->query('date_start'));
                            $from =   \Carbon\Carbon::createFromFormat('Y-m-d', request()->query('date_expire'));

                            $diff_in_days = $to->diffInDays($from);

                        @endphp

                        {{-- end calculate num of nigts --}}

                        <input type="hidden" name="num_of_nights" id="nights" onkeyup="sum()" value="{{$diff_in_days}}" readonly>
                        <input type="hidden" name="room_price" value="{{decrypt(request()->query('key'))}}" id="price" onkeyup="sum()" readonly>


                        <div class="form-group">
                            <label for="exampleInputEmail1">عدد الغرف</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp" name="room_number" id="room" onkeyup="sum()">

                            @error('room_number')
                            <small id="emailHelp" class="form-text text-muted text-danger">{{$message}}</small>

                            @enderror
                            <input type="hidden" name="total" id="result" value="0.00">
                            <input type="hidden" name="tourism_tax" id="tourism_tax" value="0.00">
                            <input type="hidden" name="municipal_tax" id="municipal_tax" value="0.00">
                            <input type="hidden" name="vat_tax" id="vat_tax" value="0.00">
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1"> الاجمالي + القيمه المضافه ب {{$room->hotel->pound}}</label>
                            <input type="number" class="form-control" aria-describedby="emailHelp" name="total_all" id="total_all" value="0" readonly>
                            <input type="hidden" name="commission" id="commission" value="0.00">

                        </div>



                        <button type="submit" class="col-12 btn btn-info">استكمال عمليه الحجز</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-12">


            <div class="py-5">

                <a href="{{url('/')}}"><button type="button" class="btn btn-info">عوده</button></a>

                {{--start table--}}
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">عدد الغرف</th>
                        <th scope="col">سعر الغرفه</th>
                        <th scope="col">تاريخ البدايه</th>
                        <th scope="col">تاريخ النهايه</th>
                    </tr>
                    </thead>

                    @foreach($calendars as $calendar)
                    <tbody>
                    <tr>
                        <td>{{$calendar->room_number > 0 ? $calendar->room_number : 'Sold'}}</td>
                        <td>{{$calendar->room_price}}</td>
                        <td>{{$calendar->check_in}}</td>
                        <td>{{$calendar->check_out}}</td>
                    </tr>



                    </tbody>
                    @endforeach


                </table>



                <div class="tap">

                    <h5 class="card-title">{{$room->room_type->room_type}}</h5>
                    <p class="card-text">
                       {{$room->room_description}}
                    </p>
                </div>


                {{--end table--}}




            </div>

        </div>


    </div>
</div>



<div class="container-fluid">
    <div class="row">

         @if(count(json_decode($room->images)) == 1)
        @foreach(json_decode($room->images) as $image)
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-1">

            <img src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
            </div>
        @endforeach

      @elseif(count(json_decode($room->images)) == 2)

            @foreach(json_decode($room->images) as $image)
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-1">

                    <img src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                </div>
            @endforeach


        @elseif(count(json_decode($room->images)) == 3)

            @foreach(json_decode($room->images) as $image)
                <div class="col-lg-4 col-md-4 col-sm-12 col-12 my-1">

                    <img src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                </div>
            @endforeach


        @else

            @foreach(json_decode($room->images) as $image)
                <div class="col-lg-3 col-md-3 col-sm-12 col-12 my-1">

                    <img src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                </div>
            @endforeach

        @endif



    </div>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-3">
            <div class="fall-4 py-5">


                <ul>
                    @if($room->hotel->service()->exists())

                        @foreach(json_decode($room->hotel->service->services) as $service)
                            <li>{{$service}}</li><hr>
                        @endforeach


                    @endif
                </ul>

            </div>
        </div>


    </div>
</div>




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
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

</body>
</html>