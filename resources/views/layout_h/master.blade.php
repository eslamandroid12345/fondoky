<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords"
        content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4" />

    @include('layout_h.head')
</head>
<style>
    /*table.dataTable thead .sorting_asc, table.dataTable thead .sorting_desc {*/

    /*     background: none;*/

    /*}*/

    /*table.dataTable tbody td.sorting_1 {*/
    /*     background: none;*/
    /*}*/

    .form-check-input {

        position: relative;
         margin-top: 0;
        margin-left: 0;
    }

    .top{

        display: none;
    }

    .top:first-child{

        display: block;
    }


</style>
<body class="main-body app sidebar-mini">
    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ URL::asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->
    @include('layout_h.main-sidebar')
    <!-- main-content -->
    <div class="main-content app-content">
        @include('layout_h.main-header')
        <!-- container -->
        <div class="container-fluid">
            @yield('page-header')
            @yield('content')
            @include('layout_h.sidebar')
            @include('layout_h.models')
            @include('layout_h.footer')
            @include('layout_h.footer-scripts')


        </div>
    </div>

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


    {{--start date--}}
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();

        //start delete message
        $( document ).ready(function() {
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 1400);

        });

    </script>

</body>

</html>

