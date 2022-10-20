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

        div.dataTables_wrapper div.dataTables_paginate {
            display: none;

        }

        .pagination .page-item .page-link {

            background: #f2f2f2;
        }

    </style>
    @include('user_dashboard.head')
    @toastr_css

</head>

<body>

    <div class="wrapper" style="font-family: 'Cairo', sans-serif">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="{{ URL::asset('assets_2/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('user_dashboard.main-header')
        @include('user_dashboard.main-sidebar')

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

            @include('user_dashboard.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--=================================
 footer -->

    @include('user_dashboard.footer-scripts')
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>

    <script>


        //start private chanel
        window.App = {!! json_encode([

   'user' => auth()->check() ? auth()->user()->id : null,

     ]) !!};


        var channel = Echo.private(`new-reservations.` + window.App.user);
        channel.listen('.new-reservations-event', function(data) {
            alert(JSON.stringify(data));
        });

    </script>
    @toastr_js
    @toastr_render
</body>

</html>
