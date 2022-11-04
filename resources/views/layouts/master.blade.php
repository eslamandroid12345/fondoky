<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }

    </style>
    @include('layouts.head')
    @toastr_css
</head>

<body>

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{ URL::asset('img/load.gif') }}" alt="">
{{--            <img src="{{ URL::asset('assets_2/images/pre-loader/loader-01.svg') }}" alt="">--}}
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')
        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">

          @yield('page-header')
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">@yield('PageTitle')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@yield('PageText')</a></li>
                <li class="breadcrumb-item active">@yield('PageTitle')</li>
            </ol>
        </div>
    </div>

            @yield('content')

            <!--=================================
 wrapper -->

            <!--=================================
 footer -->

            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>

    <script >

        window.App = {!! json_encode([

                 'user' => auth()->check() ? hotel()->id : null,

                 ]) !!};

        var channel = Echo.private(`new-reservations.` + window.App.user);
        channel.listen('.new-reservations-event', function(data) {
            alert('  تم حجز غرفه جديده بفندقك  ');

        });


    </script>
      @yield('script')

    @toastr_js
    @toastr_render
</body>

</html>
