@if($message = Session::get('login'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif

@if($message = Session::get('welcome'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif


@if($message = Session::get('role_update'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif


@if($message = Session::get('admin'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif

@if($message = Session::get('role'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif