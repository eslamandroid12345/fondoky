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
        padding-top: 0.6rem;
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

            font-size: 1.6rem;
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
            padding-top: 0.8rem;
            padding-bottom: 0.4rem;
        }

    }



    .offcanvas-end {
        top: 0;
        right: 0;
        width: 100%;
        border-left: 1px solid rgba(0,0,0,.2);
        transform: translateX(100%);
    }

    .Photo-head2{

        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        height: 100vh;

    }



    .offcanvas-body {
        flex-grow: 1;
        padding: 1rem 1rem;
        overflow-y: hidden;
    }

    .offcanvas-backdrop.show {


        opacity: 0;
        display: none;
    }

    .offcanvas .show {

        opacity: 0;
        display: none;
    }


    .mt-new-seaction{

        padding: 20px 0px;
    }

    .element-list {
        flex-wrap: nowrap;
        flex-direction: column;
    }
    .element-list {
        flex-wrap: wrap;
    }
    .d-flex {
        display: -ms-flexbox!important;
        display: flex!important;
    }
    *, :after, :before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    *, ::after, ::before {
        box-sizing: border-box;
    }

    div {
        display: block;
    }
    body, html {
        direction: rtl;
    }
    body {
        color: #555;
        text-align: initial;
    }
    body {
        font-size: 14px;
        line-height: 1.42857143;
        background-color: #fff;
    }
    body {
        font-weight: 400;
    }
    html {
        font-size: 10px;
        -webkit-tap-highlight-color: transparent;
    }

    html {
        line-height: 1.15;
    }
    *, :after, :before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    *, ::after, ::before {
        box-sizing: border-box;
    }
    *, :after, :before {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }
    *, ::after, ::before {
        box-sizing: border-box;
    }


    .container{

        width: 93%;
    }


    /**Start description**/

    .description{

        padding: 20px 0px;

    }

    .description h4{

        padding: 10px 0px;
        font-size: 14.5px;
        padding-top: 15px;
    }

    .description p{

        text-align: justify;
        line-height: 1.6em;
        color: #777;
        font-size: 13px;
    }

    .description .description2 img{


        width: 24%;
        height: 150px;
        margin-bottom: 1%;
        margin-left: 2.5px;
        margin-right: 2.5px;

    }



    .description .description1 .reservation1{

        padding: 10px 25px;
        border-radius: 3px;
        background-color: #1a789b;
        color: #fff;

    }



    .description .services{


        padding-top: 10px;
        padding-bottom: 10px;

    }

    .description .services li{

        padding-top: 5px;
        padding-bottom: 5px;
        color: #1a789b;
        font-size: 13.5px;
        list-style-type: none;


    }

    .description .carousel-item img{

        width: 100%;
        height: 350px;

    }

    .description .all{

        padding: 11px 20px;
        background-color: #1a789b;
        color: #fff;
        border-radius: 3px;

    }

    .add form input{

        width: 20%;
        padding: 8px 15px;
        border: 1px solid #ccc;
    }

    .description .all i{

        padding-left: 10px;
        font-size: 12px;
        padding-top: 10px;
        animation-name: desc;
        animation-duration: 1s;
    }


    @keyframes desc{

        25%{

            padding-left: 1px;

        }


        75%{

            padding-left: 2px;

        }


        75%{

            padding-left: 3px;

        }

        100%{

            padding-left: 4px;

        }

    }


    @media(max-width:768px)
    {

        .description .description2{

            margin: 15px 0px;
        }

        .add form input{

            width: 49%;
            padding: 8px 15px;
            border: 1px solid #ccc;
        }

        .description .description2 img{


            width: 98%;
            height: 150px;
            margin-bottom: 1%;
            margin-left: 2.5px;
            margin-right: 2.5px;

        }

    }

    /**end description**/


    /**Start Footer**/
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

    .fa-star{

        color: rgb(254, 134, 86);
    }

    .icon{

        color: #343a40
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

    /**Start section222**/



    .section222 .card-footer{

        padding: 20px 10px;
    }

    .section222{

        font-size: 14px;
    }



    .section222 h5{

        padding-bottom: 10px;
        font-size: 14px;
        color: #f90;
        font-weight: 600;
    }


    .section222 form ul li{

        list-style-type: none;

    }

    .section222 form ul li input,.section222 form ul li select{

        width: 100%;
        padding: 9px 5px;
        border-radius: 3px;
        outline: none;
        border: 1px solid #aaa;

    }

    .section222 form ul li input::placeholder{

        font-size: 14px;

    }

    .section222 form ul li input[type="submit"]{


        background-color: #1a789b!important;
        color: #fff;
        font-size: 16px;
        border: 0px;
    }


    .section222 .card-footer a{

        padding: 9px 25px;
        color: #48667c;
        border-radius: 3px;
        font-size: 14px;
        background-color: #fff;
        text-decoration: none;
        border: 1.5px solid #7497b1;

    }

    .section222 .card-body{

        padding: 15px 10px;
    }

    .section222 h3{

        padding: 10px 0px;
        font-size: 15px;
        font-weight: 600;
    }

    .section222 .card img{

        height: 210px;
        width: 100%;
    }

    .section222 .serv{


        color: #5e5e5e;
        font-weight: 500;
        font-size: 13px;
    }

    .section222 .serv span{

        font-weight: 400;
        color: #444;

    }

    .card-footer {
        padding: 0.5rem 1rem;
        background-color: #fff;
        border-top: 1px solid rgba(0,0,0,.125);
    }

    @media(max-width:768px)
    {

        .section222 form ul li input,.section222 form ul li select{

            margin-top: 10px;
        }

    }

    @media(min-width:768px)
    {

        .row-cols-md-3>* {
            flex: 0 0 auto;
            width: 25%;
        }



    }

    /**End section222**/

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

    .rate {
        float: right;
        height: 46px;
    }
    .rate:not(:checked) > input {
        position:absolute;
        top:-9999px;
    }
    .rate:not(:checked) > label {
        float:right;
        width:1em;
        overflow:hidden;
        white-space:nowrap;
        cursor:pointer;
        font-size:30px;
        color:#ccc;
    }
    .rate:not(:checked) > label:before {
        content: '★ ';
    }
    .rate > input:checked ~ label {
        color: #ffc700;
    }
    .rate:not(:checked) > label:hover,
    .rate:not(:checked) > label:hover ~ label {
        color: #deb217;
    }
    .rate > input:checked + label:hover,
    .rate > input:checked + label:hover ~ label,
    .rate > input:checked ~ label:hover,
    .rate > input:checked ~ label:hover ~ label,
    .rate > label:hover ~ input:checked ~ label {
        color: #c59b08;
    }


    /**End head-location**/
</style>

@if(LaravelLocalization::setLocale() == 'en')

    <style>
        .row,.description1,.add,.comments,.comments-show,.link{

            direction: ltr;
        }
    </style>

@endif
@endsection
@section('content')
    <div class="description">
        <div class="container">
            <div class="row">


{{--                @if (session()->has('success'))--}}
{{--                    <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--                        <strong>{{ session()->get('success') }}</strong>--}}

{{--                    </div>--}}
{{--                @endif--}}


                    @if(count(json_decode($hotel->hotel_photos)) == 1)
                        @foreach(json_decode($hotel->hotel_photos) as $image)
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-1">

                                <img style="height: 280px" src="{{URL::to('/hotels/'.$image)}}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach

                    @elseif(count(json_decode($hotel->hotel_photos)) == 2)

                        @foreach(json_decode($hotel->hotel_photos) as $image)
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-1">

                                <img style="height: 280px" src="{{URL::to('/hotels/'.$image)}}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach


                    @elseif(count(json_decode($hotel->hotel_photos)) == 3)

                        @foreach(json_decode($hotel->hotel_photos) as $image)
                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 my-1">

                                <img style="height: 280px" src="{{URL::to('/hotels/'.$image)}}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach


                    @else

                        @foreach(json_decode($hotel->hotel_photos) as $image)
                            <div class="col-lg-3 col-md-3 col-sm-12 col-12 my-1">

                                <img style="height: 280px" src="{{URL::to('/hotels/'.$image)}}" class="d-block w-100" alt="...">
                            </div>
                        @endforeach

                    @endif


                <div class="description1 col-lg-12 col-12">

                    <h4>{{lang() == 'ar' ? $hotel->location_ar : $hotel->location_en}}</h4>
                    <h5 style="color: #1a789b	;padding-bottom: 10px;font-size: 13px">{{lang() == 'ar' ? $hotel->name_ar : $hotel->name_en}}</h5>
                   <p>{{$hotel->description}}</p>
                    <div class="services">

                        <h4>{{__('welcome.services')}}</h4>

                        <ul class="row">
                            @if($hotel->service()->exists())

                                @foreach(json_decode($hotel->service->services) as $service)
                                    <li class="col-lg-3 col-md-3 col-3">{{$service}}</li>
                                @endforeach


                            @endif

                        </ul>

                    </div>


                </div>



                        <div class="col-lg-12 col-12" style="margin-bottom: 30px;">

                            <h4>{{__('welcome.rates')}}</h4>

                            @for($s = 1; $s <= 5 ; $s++)

                                <i class="fa fa-star"></i>

                            @endfor
                            {{number_format($rates_count,2)}}
                        </div>
                @if($rates > 0)


                <div class="col-lg-12 col-12" style="margin-bottom: 30px;">

                    <h4>{{__('welcome.user_rate')}}</h4>
                    @for($i = 1 ; $i <= $rates ; $i++)
                        <i class="fa fa-star"></i>
                    @endfor

                    @for($j = $rates + 1; $j <= 5 ; $j++)

                        <i class="fa fa-star icon"></i>

                    @endfor
                </div>

                        @else
                <div class="col-lg-12 col-12" style="margin-bottom: 30px;">


                    <form class="form" action="{{route('users.rates')}}" method="POST" autocomplete="off">

                        @csrf

                        <input type="hidden" value="{{$hotel->id}}" name="hotel_id">

                        <div class="rate">
                            <input type="radio" id="star5" name="rates_number" value="5" />
                            <label for="star5" title="5">5 stars</label>
                            <input type="radio" id="star4" name="rates_number" value="4" />
                            <label for="star4" title="4">4 stars</label>
                            <input type="radio" id="star3" name="rates_number" value="3" />
                            <label for="star3" title="3">3 stars</label>
                            <input type="radio" id="star2" name="rates_number" value="2" />
                            <label for="star2" title="2">2 stars</label>
                            <input type="radio" id="star1" name="rates_number" checked value="1" />
                            <label for="star1" title="1">1 star</label>
                        </div>
                        <button type="submit" style="border: none;padding: 7px 25px;background-color: #1a789b!important;color: #fff;margin-right: 10px;border-radius: 10px">{{__('welcome.rate')}}</button>

                    </form>


                </div>

                        @endif


                </div>




                <div class="col-lg-12 col-12 add">

                    <form action="{{route('hotels.comments.create')}}" method="post">
                        @csrf
                        <input type="text" name="comment" placeholder="{{__('welcome.comments')}}">
                        <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
                        <input type="submit" value="{{__('welcome.add')}}">
                    </form>

                </div>

                <div>

                    <h4 class="comments" style="margin-top: 20px;">{{__('welcome.show_comments')}}</h4>
                    @foreach($comments as $comment)
                        <div class="comments-show" style="margin-top: 15px;margin-bottom: 15px"><h5>{{$comment->user->name}}</h5> <p>{{$comment->comment}}</p></div>

                    @endforeach

                    <div class="link">

                        {{$comments->links()}}
                    </div>

                </div>



            </div>



        </div>
    </div>


@endsection