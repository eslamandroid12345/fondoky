<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Hotel</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=Mulish:wght@200;300;400;500;600;700;800;900&family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('web/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/room.css')}}">

</head>




<body>
@include('web.header')
<!--Start description hotel-->



<div class="container">
    <div class="section2222">

        <h3>أنواع الغرف المختلفة في الفندق</h3>


        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($hotels->room as $rooms)
            <div class="col">
                <div class="card h-100">

                    @foreach(json_decode($rooms->images) as $image)
                        <img src="{{URL::to('/rooms/'.$image)}}" class="card-img-top" alt="...">
                    @endforeach
                    <div class="card-body">
                        <h5 class="card-title">{{$rooms->room_type->room_type}}</h5>


                        <p class="serv"> الحد الأقصى للإشغال : <span>{{$rooms->adults_max}} بالغ</span> <span> -{{$rooms->child_max}} طفل</span> </p>
                        <p class="serv">{{$rooms->room_description}}  </p>

                    </div>
                    <div class="card-footer">
                        <small class="text-muted"><button onclick="Room();">حجز الغرفه</button></small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


    </div>
</div>




<script src="{{asset('js/jquery2.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/show.js')}}"></script>



</body>
</html>

