<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- start datepicker--}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    {{-- end datepicker--}}

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">



<!-- start link of icon -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css">
    <!-- end link of icon -->

    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/authentication.css')}}">



@if(LaravelLocalization::setLocale() == 'ar')
        <style type="text/css">
            @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;600;700&family=Mulish:wght@200;300;400;500;600;700;800;900&family=Roboto:wght@300;400;500;700&family=Tajawal:wght@300;400;500&display=swap');

            body{

                direction: rtl;
                font-family: 'Cairo', sans-serif;

            }
        </style>

    @endif


        <style type="text/css">
            @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@600&display=swap');
            body{
                font-family: 'Cairo', sans-serif;
            }


            .app-one {
                height: 60vh;
                width: 100%;
                background: linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),
                url({{asset('img/pahat.jpg')}}) no-repeat top center / cover;
                overflow: hidden;
                display: flex;
                align-items: flex-end;
                justify-content: center;
            }

            .app-one  .add-1{

                width: 100%;
                border-radius: 4px;
                padding: 40px 0px;
                padding-bottom: 0px;

            }

            .app-one  .add-1 .container-fluid .call{

                 display: flex;
                 align-items: center;
                padding: 40px 0px;
                text-align: right;
                direction: rtl;
                background: rgba(0, 0, 0, 0.5);


            }

            .lab{
                text-align: right;
                display: inline-block;
                width: 100%;
                color: #f2f2f2;
                padding-bottom: 4px;
            }

            .input{

                width: 100%;
                height: 50px;
                border-radius: 3px;
                border: none;
                outline: none;
                box-sizing: border-box;
                padding-right: 40px;
                cursor: pointer;
                font-size: 15px;


            }

            .bt{

                border: none;
                outline: none;
                background: rgb(35, 165, 185);
                width: 70%;
                height: 50px;
                color: #fff;
                border-radius: 3px;
                cursor: pointer;
                box-sizing: border-box;
                padding-right: 20px;
                font-size: 15px;
                font-weight: bold;


            }

            .fa-search{
                color: #fff;
            }

            .app-one  .add-1 .p{

                text-align: right;
                padding-right: 10px;
            }

            .app-one  .add-1 .p h3{

             color: #f2f2f2;
                padding: 20px;
            }

           i{
               position: absolute;
               padding: 15px;
               color: rgb(35, 165, 185);

           }
           .law{

               margin-top: 60px;

           }

           .search{

               height: auto;
               border-radius: 5px;
               margin-top: 20px;

           }


           .text{

               text-align: right;
           }

           .all{

               display: none;
           }
           .all:nth-of-type(1){

               display: block;
               border-radius: 4px;
           }

            @media(min-width: 992px) {
                .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
                    position: relative;
                    width: 100%;
                    padding-right: 15px;
                    padding-left: 0px;
                }
            }



            .search{

                padding-right: 0px;
                padding-left: 0px;
                box-shadow: 0px 0px 10px #b2bec3,0px 0px 10px #b2bec3;

            }

            .tell{

                padding: 15px;
                background: rgba(137,200,232,0.5);
                width: 100%;
                text-align: center;
                font-size: 15px;
            }

            h6{

                border-bottom: 1px solid #ccc;
                padding: 17px;
            }

            h5{
                margin-top: 20px;
                font-size: 15px;
            }

            p{

                line-height: 25px;
                border-radius: 3px;
                padding: 17px;
                margin-top: 20px;
            }

            .role{

                height: auto;
            }

            .role_2{

                height: auto;
            }



            .role_2 .form input{

                width: 100%;
                outline: none;
                height: 50px;
                border: 1px solid #ccc;
                text-align: right;
                margin-bottom: 20px;
                box-sizing: border-box;
                padding-right: 40px;
                font-size: 14px;
                border-radius: 5px;
                cursor: pointer;

            }

           .lab_2{

               width: 100%;
               text-align: right;
               font-size: 14px;
           }

           .book{

               padding: 15px;
               color: #17a2b8;
           }

           .dall{

               width: 100%;
           }

           .increment{

               width: 100%;
               text-align: right;
               margin-bottom: 10px;
           }

            .boot{

               width: 100%;
                font-size: 14px;
                margin-bottom: 15px;
            }

           .create{

               border-radius: 4px;
               display: none;
               box-shadow: 0px 0px 10px #b2bec3,0px 0px 10px #b2bec3;
               margin-bottom: 20px;
           }

           .create .form input{

               border: none;
               outline: none;
               background: none;
               border-bottom: 1px solid #ccc;
               border-radius: 0px;
           }

            .create .form .lab_2{

                padding-right: 20px;
            }


            input[type=number]::-webkit-inner-spin-button {
                -webkit-appearance: none;
            }

            .law{
                box-shadow: 0px 0px 10px #b2bec3,0px 0px 10px #b2bec3;
                border-radius: 5px;
            }

            .hot{

                box-shadow: 0px 0px 10px #b2bec3,0px 0px 10px #b2bec3;
                border-radius: 5px;
            }
            .hot-1{

                width: 100%;
                padding: 15px;
                text-align: center;
            }

            .links{

                box-shadow: 0px 0px 10px #b2bec3,0px 0px 10px #b2bec3;
                width: 100%;
                border-radius: 4px;

            }


        </style>


    {{--start div of booking--}}
    @if(Config::get('app.locale') == 'en')

        <style>
            .role_2 .form input{

                text-align: left;
                padding-left: 40px;

            }
            .lab_2{

                text-align: left;
            }

            .increment{

                text-align: left;
            }




        </style>



    @endif


</head>
<body>
    <div id="app">
        <nav  class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('navbar.home') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li class="nav-item">
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach

                               {{-- navbar data --}}

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('navbar.login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('navbar.register') }}</a>
                                </li>
                            @endif
                        @else


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('navbar.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    <script src="{{asset('js/jquery2.js')}}"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{asset('js/inputs.js')}}"></script>
    <script src="{{asset('js/date.js')}}"></script>
    <script>



        {{--start data of children--}}
        var x = 0;

        document.getElementById('output-area').value = x;

        function button1() {

            document.getElementById('output-area').value = ++x;

        }

        function button2() {

            if(x <= 0 ){

                console.log('القيمه صغيره جدا');
                return false;
            }

            document.getElementById('output-area').value = --x;

        }


        var y = 1;

        document.getElementById('room').value = y;

        function button3() {

            document.getElementById('room').value = ++y;

        }

        function button4() {

            if(y <= 1 ){

                console.log('القيمه صغيره جدا');
                return false;
            }

            document.getElementById('room').value = --y;

        }


        {{--end data of children--}}



        {{--start data of calculate--}}
        function sum() {

            var room_number = document.getElementById('room_number').value;
            var room = document.getElementById('room').value;
            var residual = parseInt(room_number) - parseInt(room);


            if (!isNaN(residual)) {
                document.getElementById('residual').value = residual;
            }



            var price_room = document.getElementById('price_room').value;
            var price_all = parseInt(room) * parseInt(price_room);

            if (!isNaN(price_all)) {
                document.getElementById('price_all').value = price_all;
            }
        }
        {{--end data of calculate--}}


    </script>

    <script>

        $(document).ready(function () {

            $(".boot").click(function () {

                $(".create").slideToggle({ "opacity" : "show", bottom: "100" }, 500);


            });

        });

   </script>


</body>
</html>
