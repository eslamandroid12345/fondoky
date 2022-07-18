@extends('client.master')
@section('title')

    اداره الحجوزات
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

    <style>

        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">


        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{__('users.booking_department')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                  {{__('users.booking_all')}}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">

                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                            <thead>

                            <tr>
                                <th>{{__('users.room_number')}}</th>
                                <th>{{__('users.room_price')}}</th>
                                <th>{{__('users.start')}}</th>
                                <th>{{__('users.end')}}</th>
                            </tr>

                            </thead>

                            @foreach($calendars as $calendar)

                                    <tbody>
                                    <tr>
                                        <td>{{$calendar->room_number > 0 ? $calendar->room_number : 'Sold'}}</td>
                                        <td>{{ lang() == 'ar' ? number_format($calendar->room_price,2) . $calendar->room->hotel->pound : number_format($calendar->room_price,2) . $calendar->room->hotel->currency_en}}</td>
                                        <td>{{$calendar->check_in}}</td>
                                        <td>{{$calendar->check_out}}</td>
                                    </tr>

                                    </tbody>

                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>


    {{--start create booking for user--}}



    <!-- row -->
    <div class="row">
        @php
            $to =     \Carbon\Carbon::createFromFormat('Y-m-d', request()->query('date_start'));
            $from =   \Carbon\Carbon::createFromFormat('Y-m-d', request()->query('date_expire'));

            $diff_in_days = $to->diffInDays($from);

        @endphp


        <div class="col-lg-12 col-md-12">

                    <div class="card">

                        <div class="card-body">

                            <form action="{{route('reservations.store',$room->id)}}" method="POST" autocomplete="off">

                                @csrf

                                <div class="row">


                                    <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                        <label for="inputName" class="control-label">{{__('users.city')}}</label>
                                        <input type="text" class="form-control" name="destination" value="{{lang() == 'ar' ? $room->hotel->country_ar : $room->hotel->country_en}}" readonly>

                                    </div>

                                    {{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
                                    {{--                                <label for="inputName" class="control-label">{{__('users.room_type')}}</label>--}}
                                    {{--                                <input type="text" class="form-control" name="room_type" value="{{$room->room_type->room_type}}" readonly>--}}

                                    {{--                            </div>--}}


                                    <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                        <label for="inputName" class="control-label">{{__('users.date_arrive')}}</label>
                                        <input type="date" class="form-control" name="check_in" value="{{ request()->query('date_start')}}" readonly>

                                    </div>


                                    <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                        <label for="inputName" class="control-label">{{__('users.date_leave')}}</label>
                                        <input type="date" class="form-control" name="check_out" value="{{ request()->query('date_expire')}}" readonly>

                                    </div>



                                    <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                        <label for="inputName" class="control-label">{{__('users.adults')}}</label>
                                        <input type="number" class="form-control" name="adults" value="{{$room->adults_max}}" readonly>

                                    </div>



                                    <div class="col-lg-4 col-md-4 col-sm-12 mt-3">
                                        <label for="inputName" class="control-label">{{__('users.children')}}</label>
                                        <input type="number" class="form-control" name="children" value="{{$room->child_max}}" readonly>

                                    </div>



                                    <input type="hidden" name="hotel_id" value="{{$room->hotel->id}}">
                                    <input type="hidden" name="room_id" value="{{$room->id}}">




                                    {{-- start calculate num of nigts --}}

                                    <input type="hidden" name="num_of_nights" id="nights" onkeyup="sum()" value="{{$diff_in_days}}" readonly>



                                    <input type="hidden" value="{{decrypt(request()->query('key'))}}" id="price" onkeyup="sum()" readonly>

                                    {{-- end calculate num of nigts --}}


                                    <div class="col-lg-4 col-md-4 col-sm-12 mt-3">


                                        <label for="inputName" class="control-label">{{__('users.room_number')}}</label>
                                        <input type="number" class="form-control" name="room_number" id="room" onkeyup="sum()">


                                        <span class="text-danger"> @error('room_number') {{$message}} @enderror</span>


                                        {{--start money--}}
                                        <input type="hidden" name="total" id="result">
                                        <input type="hidden" name="tourism_tax" id="tourism_tax">
                                        <input type="hidden" name="municipal_tax" id="municipal_tax">
                                        <input type="hidden" name="vat_tax" id="vat_tax">
                                        <input type="hidden" name="commission" id="commission">
                                        {{--end money--}}

                                    </div>




                                    <div class="col-lg-8 col-md-8 col-sm-12 mt-3 mb-2">
                                        <label for="inputName" class="control-label"> {{__('users.total')}} {{lang() == 'ar' ? $room->hotel->currency_ar : $room->hotel->currency_en}}</label>
                                        <input type="text" class="form-control" name="total_all" id="total_all" value="0" readonly>
                                    </div>


                                    <div class="col-lg-12 col-md-12 col-sm-12 mt-3 mb-2">
                                        <button type="submit" class="btn btn-primary">{{__('admin_create.save')}}</button>
                                    </div>



                                    <br>

                                    @if(count(json_decode($room->images)) == 1)
                                        @foreach(json_decode($room->images) as $image)
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-1">

                                                <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach

                                    @elseif(count(json_decode($room->images)) == 2)

                                        @foreach(json_decode($room->images) as $image)
                                            <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-1">

                                                <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach


                                    @elseif(count(json_decode($room->images)) == 3)

                                        @foreach(json_decode($room->images) as $image)
                                            <div class="col-lg-4 col-md-4 col-sm-12 col-12 my-1">

                                                <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach


                                    @else

                                        @foreach(json_decode($room->images) as $image)
                                            <div class="col-lg-3 col-md-3 col-sm-12 col-12 my-1">

                                                <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach

                                    @endif


                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                                        <ul>
                                            @if($room->hotel->service()->exists())

                                                @foreach(json_decode($room->hotel->service->services) as $service)
                                                    <li>{{$service}}</li><hr>
                                                @endforeach


                                            @endif
                                        </ul>
                                    </div>

                                </div>


                            </form>
                        </div>

                    </div>


        </div>
    </div>

    <!-- row closed -->
    <!-- Container closed -->

    <!-- main-content closed -->
    {{--end create booking for user--}}






    <!-- row closed -->

    <!-- Container closed -->
    
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->

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



    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>

    <script>
        function sum() {

            var nights = document.getElementById('nights').value;
            var room = document.getElementById('room').value;
            var price = document.getElementById('price').value;


            var result = parseFloat(nights) * parseFloat(room) * parseFloat(price);

            if (!isNaN(result)) {

                document.getElementById('result').value = result;
            }


            var tourism_tax = ((parseFloat(nights) * parseFloat(room) * parseFloat(price) * 4) / 100);


            if (!isNaN(tourism_tax)) {

                document.getElementById('tourism_tax').value = tourism_tax;
            }


            var municipal_tax = ((parseFloat(nights) * parseFloat(room) * parseFloat(price) * 5) / 100);


            if (!isNaN(municipal_tax)) {

                document.getElementById('municipal_tax').value = municipal_tax;
            }



            var vat_tax = ((parseFloat(nights) * parseFloat(room) * parseFloat(price) * 5) / 100);


            if (!isNaN(vat_tax)) {

                document.getElementById('vat_tax').value = vat_tax;
            }



            var total_all = (parseFloat(nights) * parseFloat(room) * parseFloat(price) + vat_tax + municipal_tax + tourism_tax);


            if (!isNaN(total_all)) {

                document.getElementById('total_all').value = total_all;

            }else{

                document.getElementById('total_all').value = 0;

            }



            var commission = ((parseFloat(nights) * parseFloat(room) * parseFloat(price) * 5) / 100);


            if (!isNaN(commission)) {

                document.getElementById('commission').value = commission;
            }

        }

    </script>


@endsection
