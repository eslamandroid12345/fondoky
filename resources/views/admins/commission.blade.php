@extends('layouts_admin.master')
@section('css')
    @section('title')
        معاينه طباعة الفاتورة
    @stop
@endsection

@section('PageText')
    {{__('admin.invoices')}}

@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{__('admin.invoices_month')}}
    @stop
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
                                    <th>{{__('admin.hotel_number')}}</th>
                                    <th>{{__('admin.commission')}}</th>
                                    <th>{{__('admin.rate')}}</th>
                                    <th>{{__('admin.month_pay')}}</th>
                                </tr>
                                </thead>


                                @foreach($commissions as $commission)
                                    <tbody>
                                    <tr>
                                        <td>{{$hotel->id}}</td>
                                        <td>{{ number_format($commission->commission,2)  }} : {{ lang() == 'ar' ? $hotel->currency_ar : $hotel->currency_en}}</td>
                                        <td>{{ number_format($commission->total,2) }} : {{lang() == 'ar' ? $hotel->currency_ar : $hotel->currency_en}}</td>
                                        <td>{{$commission->month_year}}</td>

                                    </tr>

                                    </tbody>
                                @endforeach

                            </table>
                        </div>

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
