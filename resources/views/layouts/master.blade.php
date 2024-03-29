<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    {{--start toastr--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />



    @yield('main')
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
{{--            <img src="{{ URL::asset('img/load.gif') }}" alt="">--}}
            <img src="{{ URL::asset('assets_2/images/pre-loader/loader-01.svg') }}" alt="">
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

    <script>

        function playAudio() {
            var x = new Audio('https://myhotel-eg.com/sound/eventually-590.ogg');
            var playPromise = x.play();

            if (playPromise !== undefined) {
                playPromise.then(_ => {
                    x.play();
                })
                    .catch(error => {
                    });

            }
        }
        window.App = {!! json_encode([

                 'user' => auth()->check() ? hotel()->id : null,

                 ]) !!};

        var channel = Echo.private(`new-reservations.` + window.App.user);
        channel.listen('.new-reservations-event', function(data) {

            playAudio();
            toastr.success('حجز جديد لديك', 'تم حجز غرفه جديده بفندقك', { timeOut: 20500 });

        });


    </script>
      @yield('script')

    @toastr_js
    @toastr_render
    {{--satrt toastr--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

    {{--

    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">


<script>


  @if(Session::has('success'))
  		toastr.success("{{ Session::get('success') }}");
  @endif


  @if(Session::has('info'))
  		toastr.info("{{ Session::get('info') }}");
  @endif


  @if(Session::has('warning'))
  		toastr.warning("{{ Session::get('warning') }}");
  @endif


  @if(Session::has('error'))
  		toastr.error("{{ Session::get('error') }}");
  @endif


</script>

    --}}
</body>

</html>
