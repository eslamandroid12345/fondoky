<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    @if (App::getLocale() == 'ar')
        <link href="{{ URL::asset('assets_2/css/rtl.css') }}" rel="stylesheet">

    @else
        <link href="{{ URL::asset('assets_2/css/ltr.css') }}" rel="stylesheet">
    @endif


    <style type="text/css">


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
    @toastr_css

</head>

<body>
<div class="wrapper">


<div id="pre-loader">
{{--    <img src="{{ URL::asset('img/load.gif') }}" alt="">--}}

        <img src="{{URL::asset('assets_2/images/pre-loader/loader-01.svg')}}" alt="">
</div>
</div>
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

<!-- plugins-jquery -->
<script src="{{ URL::asset('assets_2/js/plugins-jquery.js') }}"></script>
<script src="{{ URL::asset('assets_2/js/custom.js') }}"></script>

@yield('scripts')
@toastr_js
@toastr_render
</body>
</html>