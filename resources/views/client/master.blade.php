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
    @include('client.head')
</head>
<style>
    table.dataTable thead .sorting_asc, table.dataTable thead .sorting_desc {

         background: none;

    }

    table.dataTable tbody td.sorting_1 {
         background: none;
    }
    .form-check-input {

        position: relative;
         margin-top: 0;
        margin-left: 0;
    }
</style>
<body class="main-body app sidebar-mini" oncontextmenu="return false">
    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ URL::asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /Loader -->
    @include('client.main-sidebar')
    <!-- main-content -->
    <div class="main-content app-content">
        @include('client.main-header')
        <!-- container -->
        <div class="container-fluid">
            @yield('page-header')
            @yield('content')
            @include('client.sidebar')
            @include('client.models')
            @include('client.footer')
            @include('client.footer-scripts')

            <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
            <script>


                window.App = {!! json_encode([
               'user' => auth()->check() ? auth()->user()->id : null,
                 ]) !!};


                var channel = Echo.private(`new-reservations.` + window.App.user);
                channel.listen('.new-reservations-event', function(data) {
                    alert(JSON.stringify(data));
                });


                document.onkeydown = function(e) {
                    if(event.keyCode == 123) {
                        return false;
                    }
                    if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
                        return false;
                    }
                    if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
                        return false;
                    }
                    if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
                        return false;
                    }
                    if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
                        return false;
                    }
                }
            </script>
         </body>

</html>

