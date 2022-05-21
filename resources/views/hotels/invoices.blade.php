@extends('layout_h.master')
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
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    معاينة طباعة الفاتورة</span>
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
                            <h1 class="invoice-title">فاتورة تحصيل</h1>
                            <div class="billed-from">
                                <h6>موقع فندقي يرحب بكم</h6>
                                <p>فاتوره تحصيل مبلغ العموله الشهريه من موقع فندقي<br>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">معلومات الفندق</label>
                                <div class="billed-to">
                                    <h6>رقم هاتف الفندق {{$hotel->phone_hotel}}</h6>
                                    <p>{{lang() == 'ar' ? $hotel->location_ar : $hotel->location_en}}<br>
                                        اسم مدير الفندق  {{$hotel->manger}}  <br>
                                        {{$hotel->email}}</p>
                                </div>
                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">معلومات الفاتورة</label>
                                <p class="invoice-info-row"><span>رقم الفاتورة</span>
                                    <span>{{rand(1,20000000)}}</span></p>

                                <p class="invoice-info-row"><span>فاتوره شهر </span>
                                    <span>{{date('Y-m')}}</span></p>
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
                                    <th>الاجمالي</th>
                                    <th>{{__('book_hotel.blocked')}}</th>

                                </tr>
                                </thead>

                                @foreach($bookers as $booker)
                                    <tbody>


                                    <tr>

                                        <td>{{$booker->id}}</td>
                                        <td>{{$booker->room_price}}</td>
                                        <td>{{$booker->rate}}</td>
                                        <td>{{$booker->commission}} {{$booker->hotel->pound}}</td>
                                        <td>{{$booker->room_type}}</td>
                                        <td>{{$booker->room_number}}</td>
                                        <td>{{$booker->num_of_nights}}</td>
                                        <td>{{$booker->date_arrive}}</td>
                                        <td>{{$booker->date_leave}}</td>
                                        <td>{{$booker->total}} {{$booker->hotel->pound}}</td>
                                        <td>{{$booker->block()}}</td>


                                    </tr>


                                    </tbody>

                                @endforeach


                                <tr>

                                    <td>اجمالي نسبه العموله</td>
                                    <td class="tx-left" colspan="11">@foreach($commissions as $commission) {{$commission->commission ?? 0}} {{$hotel->pound}}@endforeach</td>
                                </tr>
                                <tr>

                                    <td>اجمالي الربح</td>
                                    <td class="tx-left" colspan="11"> @foreach($totals as $total) {{$total->total ?? 0}} {{$hotel->pound}}@endforeach</td>
                                </tr>


                            </table>
                        </div>
                        <hr class="mg-b-40">



                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                    class="mdi mdi-printer ml-1"></i>طباعة</button>
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
