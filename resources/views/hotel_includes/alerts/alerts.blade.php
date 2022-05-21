@if($message = Session::get('update'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif


@if($message = Session::get('create'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif

@if($message = Session::get('update_service'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif

@if($message = Session::get('hotel'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif


@if($message = Session::get('welcome'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif

{{-- start room --}}
@if($message = Session::get('room'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif


@if($message = Session::get('delete'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif

@if($message = Session::get('room_update'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif

@if($message = Session::get('success'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif

@if($message = Session::get('block'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif

@if($message = Session::get('block_stay'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif

@if($message = Session::get('current_password'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif

@if($message = Session::get('success_add'))
    <div id="alert" class="alert alert-secondary text-center py-2" role="alert">
        {{$message}}
    </div>
@endif
{{-- end room --}}
