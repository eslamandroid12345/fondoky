<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=Mulish:wght@200;300;400;500;600;700;800;900&family=Roboto:wght@300;400;500;700&family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">


    <style type="text/css">
        /* hot_1.jpg */
        .img{

            background: url({{asset('img/as_3.webp')}}) no-repeat top center / cover;

        }

        .alert{

            text-align: right;
        }

    </style>

      @if(LaravelLocalization::setLocale() == 'en')
        <style type="text/css">

            body{

                direction: ltr;
            }

            label{

                display: block;
                text-align: left;
            }
            h3{

                text-align: left;
            }
            .alert{

                text-align: left;
            }
        </style>
          @endif
          @yield('styles')

</head>

<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">

        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="wrap d-md-flex">
                    <div class="img"></div>


                    {{-- start body of login --}}

                    @yield('content')

                    {{-- end body of login --}}



                </div>
            </div>
        </div>
    </div>
</section>
<script src="{{asset('js/jquery2.js')}}"></script>
<script src="{{asset('js/map.js')}}"></script>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBXqUfFOvH5LUsb1OIdFNVew_zad8ugoqg&libraries=places&callback=initAutocomplete&language=ar&region=EGasync defer"></script>

@yield('scripts')

</body>
</html>