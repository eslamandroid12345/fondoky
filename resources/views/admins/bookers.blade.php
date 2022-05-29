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
                <h4 class="content-title mb-0 my-auto">اقسام الحجوزات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة
                    حجوزات الفنادق</span>
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
                                <th>رقم الحجز</th>
                            <th>اسم العميل</th>
                            <th>الوجهه</th>
                            <th>الاطفال</th>
                            <th>البالغين</th>
                            <th>نوع الغرفه</th>
                            <th>عدد الغرف</th>
                            <th>عدد الليالي</th>
                            <th>تاريخ الوصول</th>
                            <th>تاريخ المغادره</th>
                            <th>الفندق</th>
                            <th>سعر الحجز </th>
                            <th>نسبه الموقع</th>
                            <th>حاله الحجز</th>
                            </tr>
                            </thead>

                            @forelse($bookers as $booker)
                                <tbody>

                                <tr>

                                    <td>{{$booker->id}}</td>
                                    <td>{{$booker->user->name}}</td>
                                    <td>{{$booker->city_to}}</td>
                                    <td>{{$booker->children}}</td>
                                    <td>{{$booker->adults}}</td>
                                    <td>{{$booker->room_type}}</td>
                                    <td>{{$booker->room_number}}</td>
                                    <td>{{$booker->num_of_nights}}</td>
                                    <td>{{$booker->date_arrive}}</td>
                                    <td>{{$booker->date_leave}}</td>
                                    <td>{{lang() == 'ar' ? $booker->hotel->name_ar : $booker->hotel->name_en}}</td>
                                    <td>{{number_format($booker->total,2)}} - {{$booker->hotel->pound}}</td>

                                    <td>{{$booker->blocked == true ? number_format($booker->commission,2) . $booker->hotel->pound : '0'}}</td>
                                    <td>{{$booker->block()}}</td>


                                </tr>


                                </tbody>
                            @empty
                                <h6>No booking</h6>
                            @endforelse

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

    <script>
        $('#delete_invoice').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })

    </script>

    <script>
        $('#Transfer_invoice').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })

    </script>

    <script src="{{asset('js/NewNotificationHotel.js')}}"></script>
    <script>

        $( document ).ready(function() {

            setTimeout(function() {
                $('#alert').fadeOut('slow');
            }, 1000);

        });

    </script>


@endsection
