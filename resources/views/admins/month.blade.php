



@extends('layout.master')
@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }

    </style>
@endsection
@section('title')
    معاينه طباعة الفاتورة
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">


                <h4 class="content-title mb-0 my-auto">{{__('admin.invoices')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                   {{__('admin.invoices_month')}}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">




                            <h1 class="invoice-title">{{__('admin.invoices_pay')}}</h1>
                            <div class="billed-from">
                                <h6>{{__('admin.hotel_welcome')}}</h6>
                                <p>{{__('admin.invoices_details')}}<br>
                                    {{__('admin.phone_admin')}}    {{admin()->phone}}<br>
                                    {{__('admin.admin_name')}} {{admin()->name}}</p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">{{__('admin.hotel_detail')}}</label>

                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">{{__('admin.invoices_information')}}</label>
                                <p class="invoice-info-row"><span>{{__('admin.invoices_number')}}</span>
                                    <span>{{rand(1,20000000)}}</span></p>

                                <p class="invoice-info-row"><span> {{__('admin.invoices_year')}} </span>
                                    <span>{{\Carbon\Carbon::now()->format('Y')}}</span></p>
                            </div>
                        </div>

                        <div class="table-responsive mg-t-40">



                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th>{{__('book_hotel.id')}}</th>
                                    <th>{{__('book_hotel.room_price')}}</th>
                                    <th>{{__('book_hotel.rate')}}</th>
                                    <th>{{__('book_hotel.commission')}}</th>
                                    <th>{{__('book_hotel.room_type')}}</th>
                                    <th>{{__('book_hotel.room_number')}}</th>
                                    <th>{{__('book_hotel.num_of_nights')}}</th>
                                    <th>{{__('book_hotel.date_arrive')}}</th>
                                    <th>{{__('book_hotel.date_leave')}}</th>
                                    <th>{{__('book_hotel.total')}}</th>
                                    <th>{{__('book_hotel.blocked')}}</th>
                                </tr>
                                </thead>

                                @foreach($bookers as $booker)
                                    <tbody>
                                    <tr>
                                        <td>{{$booker->id}}</td>
                                        <td>{{$booker->room_price}}</td>
                                        <td>{{$booker->rate}}</td>
                                        <td>{{number_format($booker->commission,2)}} {{lang() == 'ar' ? $hotel->pound : $hotel->currency_en}}</td>
                                        <td>{{$booker->room_type}}</td>
                                        <td>{{$booker->room_number}}</td>
                                        <td>{{$booker->num_of_nights}}</td>
                                        <td>{{$booker->date_arrive}}</td>
                                        <td>{{$booker->date_leave}}</td>
                                        <td>{{number_format($booker->total,2)}} {{lang() == 'ar' ? $hotel->pound : $hotel->currency_en}}</td>
                                        <td>{{$booker->block()}}</td>

                                    </tr>


                                    </tbody>

                                @endforeach


                                <tr>

                                    <td>{{__('hotels.commission')}}</td>
                                    <td class="tx-left" colspan="11">@foreach($commissions as $commission) {{number_format($commission->commission,2)}} {{ lang() == 'ar' ? $hotel->pound : $hotel->currency_en }}@endforeach</td>
                                </tr>
                                <tr>

                                    <td>{{__('hotels.total')}}</td>
                                    <td class="tx-left" colspan="11"> @foreach($totals as $total) {{number_format($total->total,2)}} {{lang() == 'ar' ? $hotel->pound : $hotel->currency_en}}@endforeach</td>
                                </tr>

                            </table>



                        </div>
                        <hr class="mg-b-40">



                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                    class="mdi mdi-printer ml-1"></i>{{__('admin.print_invoice')}}</button>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>


    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }

    </script>

@endsection
