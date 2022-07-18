@extends('layout_h.master')
@section('title')

    قائمه الحجوزات
@stop
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.js.dataTables.min.css') }}" rel="stylesheet">
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
                <h4 class="content-title mb-0 my-auto">{{__('hotels.booking_department')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                    {{__('hotels.arrivals')}}
                    </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if (session()->has('welcome'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('welcome') }}</strong>

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
                                <th>{{__('book_hotel.id')}}</th>
                                <th>{{__('book_hotel.rate')}}</th>
                                <th>{{__('book_hotel.commission')}}</th>
                                <th>{{__('book_hotel.user')}}</th>
                                <th>{{__('book_hotel.city_to')}}</th>
                                <th>{{__('book_hotel.children')}}</th>
                                <th>{{__('book_hotel.adults')}}</th>
                                <th>{{__('book_hotel.room_type')}}</th>
                                <th>{{__('book_hotel.room_number')}}</th>
                                <th>{{__('book_hotel.num_of_nights')}}</th>
                                <th>{{__('book_hotel.date_arrive')}}</th>
                                <th>{{__('book_hotel.date_leave')}}</th>
                                <th>{{__('book_hotel.hotel')}}</th>
                                <th>{{__('book_hotel.total_all')}}</th>
                                <th>{{__('book_hotel.vat_tax')}}</th>
                                <th>{{__('book_hotel.municipal_tax')}}</th>
                                <th>{{__('book_hotel.tourism_tax')}}</th>
                                <th>{{__('book_hotel.total')}}</th>
                                <th>{{__('book_hotel.blocked')}}</th>
                                <th>{{__('book_hotel.stayed')}}</th>
                                <th>{{__('book_hotel.control')}}</th>
                            </tr>
                            </thead>

                            @foreach($invoices as $invoice)
                                <tbody>
                                <tr>
                                    <td>{{$invoice->reservation->id}}</td>
                                    <td>{{$invoice->rate}}</td>
                                    <td>{{$invoice->commission}}</td>
                                    <td>{{$invoice->user->name}}</td>
                                    <td>{{$invoice->reservation->destination}}</td>
                                    <td>{{$invoice->reservation->children}}</td>
                                    <td>{{$invoice->reservation->adults}}</td>
                                    <td>{{$invoice->reserved_room->room->room_type->room_type}}</td>
                                    <td>{{$invoice->reserved_room->room_number}}</td>
                                    <td>{{$invoice->reservation->num_of_nights}}</td>
                                    <td>{{$invoice->reservation->check_in}}</td>
                                    <td>{{$invoice->reservation->check_out}}</td>
                                    <td>{{ lang() == 'ar' ? $invoice->hotel->name_ar : $invoice->hotel->name_en}}</td>
                                    <td>{{ lang() == 'ar' ? $invoice->total_all  . hotel()->currency_ar : $invoice->total_all . hotel()->currency_en}}</td>
                                    <td>{{ lang() == 'ar' ? $invoice->vat_tax . hotel()->currency_ar : $invoice->vat_tax . hotel()->currency_en}}</td>
                                    <td>{{ lang() == 'ar' ? $invoice->municipal_tax . hotel()->currency_ar : $invoice->municipal_tax . hotel()->currency_en }}</td>
                                    <td>{{  lang() == 'ar' ? $invoice->tourism_tax . hotel()->currency_ar : $invoice->tourism_tax . hotel()->currency_en }}</td>
                                    <td>{{ lang() == 'ar' ? $invoice->total . hotel()->currency_ar : $invoice->total . hotel()->currency_en}}</td>
                                    <td>{{$invoice->block()}}</td>
                                    <td>{{$invoice->stay()}}</td>
                                    <td>

                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                    type="button">{{__('content.operations')}}<i class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">

                                                @if($invoice->blocked == 1)
                                                    <a class="dropdown-item" href="{{route('hotels.block',$invoice->id)}}">{{__('book_hotel.block')}}</a>

                                                @else
                                                    <a class="dropdown-item" href="">{{__('book_hotel.block_now')}}</a>


                                                @endif


                                                @if($invoice->stayed == 1)
                                                    <a class="dropdown-item" href="{{route('hotels.stay',$invoice->id)}}">{{__('book_hotel.not_stayed')}}</a>

                                                @else
                                                    <a class="dropdown-item" href="">{{__('book_hotel.leave')}}</a>


                                                @endif
                                            </div>
                                        </div>


                                    </td>

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



    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->

    <script src="{{asset('js/jquery-3.6.0.min.js')}}" ></script>
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





@endsection
