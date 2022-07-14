@extends('layout.master')
@section('title')
   حجوزات الفنادق
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
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">




                <h4 class="content-title mb-0 my-auto">{{__('admin.hotel_reservations_list')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                   {{__('admin.reservations_departments')}}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if (session()->has('login'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('login') }}</strong>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

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
                                <th>{{__('site.id')}}</th>
                                <th>{{__('site.city')}}</th>
                                <th>{{__('site.child')}}</th>
                                <th>{{__('site.adults')}}</th>
                                <th>{{__('site.room_type')}}</th>
                                <th>{{__('site.room_number')}}</th>
                                <th>{{__('site.num_of_nights')}}</th>
                                <th>{{__('site.date_arrive')}}</th>
                                <th>{{__('site.date_leave')}}</th>
                                <th>{{__('site.hotel')}}</th>
                                <th>{{__('site.total_money')}}</th>
                                <th>{{__('site.name')}}</th>
                                <th>{{__('site.reserve')}}</th>


                            </tr>
                            </thead>


                            @foreach($invoices as $invoice)
                                <tbody>

                                <tr>

                                    <td>{{$invoice->reservation->id}}</td>
                                    <td>{{$invoice->reservation->destination}}</td>
                                    <td>{{$invoice->reservation->children}}</td>
                                    <td>{{$invoice->reservation->adults}}</td>
                                    <td>{{$invoice->reserved_room->room->room_type->room_type}}</td>
                                    <td>{{$invoice->reserved_room->room_number}}</td>
                                    <td>{{$invoice->reservation->num_of_nights}}</td>
                                    <td>{{$invoice->reservation->check_in}}</td>
                                    <td>{{$invoice->reservation->check_out}}</td>
                                    <td>{{ lang() == 'ar' ? $invoice->hotel->name_ar : $invoice->hotel->name_en}}</td>
                                    <td>{{ lang() == 'ar' ? number_format($invoice->total,2) . $invoice->hotel->currency_ar : number_format($invoice->total,2) . $invoice->hotel->currency_en}}</td>
                                    <td>{{$invoice->user->name}}</td>
                                    <td>{{$invoice->cancel()}}</td>


                                </tr>


                                </tbody>
                            @endforeach
                        </table>
{{--                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}


{{--                                <th>{{__('book_hotel.id')}}</th>--}}
{{--                                <th>{{__('book_hotel.user')}}</th>--}}
{{--                                <th>{{__('book_hotel.city_to')}}</th>--}}
{{--                                <th>{{__('book_hotel.children')}}</th>--}}
{{--                                <th>{{__('book_hotel.adults')}}</th>--}}
{{--                                <th>{{__('book_hotel.room_type')}}</th>--}}
{{--                                <th>{{__('book_hotel.room_number')}}</th>--}}
{{--                                <th>{{__('book_hotel.num_of_nights')}}</th>--}}
{{--                                <th>{{__('book_hotel.date_arrive')}}</th>--}}
{{--                                <th>{{__('book_hotel.date_leave')}}</th>--}}
{{--                                <th>{{__('book_hotel.hotel')}}</th>--}}
{{--                                <th>{{__('book_hotel.total')}}</th>--}}
{{--                                <th>{{__('book_hotel.commission')}}</th>--}}
{{--                                <th>{{__('book_hotel.blocked')}}</th>--}}



{{--                            </tr>--}}
{{--                            </thead>--}}

{{--                            @foreach($bookers as $booker)--}}
{{--                                <tbody>--}}

{{--                                <tr>--}}
{{--                                    <td>{{$booker->id}}</td>--}}
{{--                                    <td>{{$booker->user->name}}</td>--}}
{{--                                    <td>{{$booker->city_to}}</td>--}}
{{--                                    <td>{{$booker->children}}</td>--}}
{{--                                    <td>{{$booker->adults}}</td>--}}
{{--                                    <td>{{$booker->room_type}}</td>--}}
{{--                                    <td>{{$booker->room_number}}</td>--}}
{{--                                    <td>{{$booker->num_of_nights}}</td>--}}
{{--                                    <td>{{$booker->date_arrive}}</td>--}}
{{--                                    <td>{{$booker->date_leave}}</td>--}}
{{--                                    <td>{{lang() == 'ar' ? $booker->hotel->name_ar : $booker->hotel->name_en}}</td>--}}
{{--                                    <td>{{number_format($booker->total,2)}} - {{ lang() == 'ar' ? $booker->hotel->pound : $booker->hotel->currency_en}}</td>--}}

{{--                                    <td>{{  lang() == 'ar' ? number_format($booker->commission,2) . '-' . $booker->hotel->pound : number_format($booker->commission,2) . '-' . $booker->hotel->currency_en}}</td>--}}
{{--                                    <td>{{$booker->block()}}</td>--}}


{{--                                </tr>--}}


{{--                                </tbody>--}}

{{--                                @endforeach--}}
{{--                        </table>--}}
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>



    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->

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



    <script src="{{asset('js/NewNotificationHotel.js')}}"></script>



@endsection
