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
    تعديل تقويم الغرفه
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{__('rooms_calendars.calendars')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
               {{__('hotels.calendars_edit')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @if (session()->has('success_update'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('success_update') }}</strong>

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


                    <form class="form" action="{{route('calendars.update',$calendar->id)}}" method="POST" autocomplete="off">

                        @csrf
                        @method('PUT')

                        <div class="row">



                            <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{__('calendars.room_number_add')}}</label>
                                <input type="number" class="form-control" id="inputName" name="room_number"  value="{{old('room-number',$calendar->room_number)}}">
                                <span class="text-danger"> @error('room_number') {{$message}} @enderror</span>

                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                <label for="inputName" class="control-label">{{__('calendars.room_price_add')}}</label>
                                <input type="number" class="form-control" id="inputName" name="room_price"  value="{{old('room_price',$calendar->room_price)}}">
                                <span class="text-danger"> @error('room_price') {{$message}} @enderror</span>

                            </div>




                            <div  class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                <label>{{__('calendars.check_in_add')}}</label>
                                <input type="text" class="form-control" id="start" name="check_in" value="{{$calendar->check_in}}" readonly="readonly" />

                                <span class="text-danger"> @error('check_in') {{$message}} @enderror</span>

                            </div>


                            <div  class="col-lg-6 col-md-6 col-sm-12 mt-3">
                                <label>{{__('calendars.check_out_add')}}</label>
                                <input type="text" class="form-control" id="end" name="check_out" value="{{$calendar->check_out}}" readonly="readonly" />
                                <span class="text-danger"> @error('check_out') {{$message}} @enderror</span>

                            </div>


                            <br>


                        </div>


                        <div class="d-flex justify-content-center mt-3">
                            <button type="submit" class="btn btn-primary">{{__('calendars.save')}}</button>
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


@endsection
