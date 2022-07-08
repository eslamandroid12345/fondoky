@extends('layout_h.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')

    اضافه خدمات الغرف
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{__('hotels.hotel_room_service_insert')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                   {{__('hotels.hotel_room_service_department')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('create'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('create') }}</strong>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('hotel-room-services.store')}}" method="post" autocomplete="off">

                        @csrf

                        <div class="row">



                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{__('hotels.hotel_room_service_room')}}</label>
                                <select name="room_id" class="form-control SlectBox" onclick="console.log($(this).val())"
                                        onchange="console.log('change is firing')">

                                    <option selected disabled>الغرف</option>
                                    @foreach($rooms as $room)
                                        <option value="{{$room->id}}">{{$room->room_type->room_type}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger"> @error('room_id') {{$message}} @enderror</span>

                            </div>




                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">

                                @foreach($room_services as $room_service)
                                    <div class="form-group">

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="room_service_id[]" value="{{$room_service->id}}" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">{{$room_service->name}}</label>
                                        </div>

                                    </div>
                                @endforeach

                                <span class="text-danger"> @error('room_service_id') {{$message}} @enderror</span>

                            </div>


                            <div class="d-flex justify-content-center mt-3">
                                <button type="submit" class="btn btn-primary">{{__('admin_create.save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>



@endsection
