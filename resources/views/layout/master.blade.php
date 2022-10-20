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
    @include('layout.head')
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
</style>
<body class="main-body app sidebar-mini">
    <!-- Loader -->
    <div id="global-loader">
        <img src="{{ URL::asset('assets/img/loader.svg') }}" class="loader-img" alt="Loader">
    </div>

    <!-- /Loader -->
    @include('layout.main-sidebar')
    <!-- main-content -->
    <div class="main-content app-content">
        @include('layout.main-header')
        <!-- container -->
        <div class="container-fluid">
            @yield('page-header')
            @yield('content')
            @include('layout.sidebar')
            @include('layout.models')
            @include('layout.footer')
            @include('layout.footer-scripts')
         </body>

</html>

<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('c015c0d70ff48c211999', {
        cluster: 'mt1'
    });


</script>
<script src="{{asset('js/pusherNotifications.js')}}"></script>
<script>
    $( document ).ready(function() {

        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 1400);

    });


</script>

