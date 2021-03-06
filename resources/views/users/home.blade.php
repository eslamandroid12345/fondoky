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
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{__('site.book')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /
                   {{__('site.my_booking')}}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if (session()->has('canceled'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('canceled') }}</strong>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('success') }}</strong>

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
                                <th>{{__('site.total')}}</th>

                                <th>{{__('site.name')}}</th>
                                <th>{{__('site.reserve')}}</th>
                                <th>{{__('site.control')}}</th>

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
                                    <td>{{ lang() == 'ar' ? number_format($invoice->total_all,2) . $invoice->hotel->currency_ar : number_format($invoice->total_all,2) . $invoice->hotel->currency_en}}</td>
                                    <td>{{$invoice->user->name}}</td>
                                    <td>{{$invoice->cancel()}}</td>



                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                    type="button">{{__('content.operations')}}<i class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">

                                                @if($invoice->canceled == 1)
                                                    <a class="dropdown-item" href="{{route('reservations.cancel',$invoice->id)}}">{{__('site.cancel')}}</a>

                                                @else
                                                    <a class="dropdown-item" href="">{{__('site.canceled')}}</a>

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
