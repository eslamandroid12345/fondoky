<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Hotel</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/v4-shims.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=Mulish:wght@200;300;400;500;600;700;800;900&family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('web/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('web/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">

    <style>
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }
    </style>
    @if(LaravelLocalization::setLocale() == 'en')

    <style>
        body{

            direction: ltr;

        }

    </style>
    @endif

    @yield('style')
    @toastr_css

</head>

<body>


@include('client_app.header')

   @yield('content')

@include('client_app.footer')

@yield('scripts')
<script src="{{asset('js/jquery2.js')}}"></script>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/show.js')}}"></script>
<script src="{{asset('js/table.js')}}"></script>


{{--start script of date--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{asset('js/app.js')}}" type="text/javascript"></script>


<script type="text/javascript">

   $(function () {
       $("#start").datepicker({

           dateFormat: 'yy-mm-dd'
       });

       $("#end").datepicker({


           dateFormat: 'yy-mm-dd'
       });
   });
</script>
<script>

    function toggleMute() {

        var video=document.getElementById("videoId");

        if(video.muted){
            video.muted = false;
        } else {
            debugger;
            video.muted = true;
            video.play()
        }

    }

    $(document).ready(function(){
        setTimeout(toggleMute,1000);
    })
</script>


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
<script>
    $( document ).ready(function() {

        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 1400);

    });


</script>
@yield('scripts')
@toastr_js
@toastr_render
</body>
</html>
