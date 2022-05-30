@extends('layout_h.master')
@section('title')
   عرض تقويمات الغرفه
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
                <h4 class="content-title mb-0 my-auto">{{__('rooms_calendars.calendars')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                   عرض وتعديل تقويم الغرفه</span>
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


                    <a class="modal-effect btn btn-sm btn-primary" href="#"
                       style="color:white"><i class="fas fa-file-download"></i>&nbsp;تصدير اكسيل</a>


                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">
                            <thead>
                            <tr>
                                <th>{{__('rooms_calendars.room_type')}}</th>
                                <th>{{__('rooms_calendars.room_number')}}</th>
                                <th>{{__('rooms_calendars.room_price')}}</th>
                                <th>{{__('rooms_calendars.check_in')}}</th>
                                <th>{{__('rooms_calendars.check_out')}}</th>
                                <th>{{__('rooms_calendars.control')}}</th>

                            </tr>
                            </thead>


                            @foreach($calendars as $calendar)

                                <tbody>
                                <tr>


                                    <td>{{$calendar->room->room_type->room_type}}</td>
                                    <td>{{$calendar->room_number}}</td>
                                    <td>{{number_format($calendar->room_price,2) . '-'. $calendar->room->hotel->pound}}</td>
                                    <td>{{$calendar->check_in}}</td>
                                    <td>{{$calendar->check_out}}</td>

                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
                                                    type="button">{{__('content.operations')}}<i class="fas fa-caret-down ml-1"></i></button>
                                            <div class="dropdown-menu tx-13">

                                                <a class="dropdown-item"
                                                   href="{{route('calendars.edit',$calendar->id)}}">{{__('room_add.update')}}</a>

                                                <a class="dropdown-item"
                                                   href="{{route('calendars.delete',$calendar->id)}}">{{__('room_add.delete')}}</a>




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
