
@extends('layouts.master')
@section('css')
    @section('title')

        معاينه طباعه الفاتوره
    @stop
@endsection

@section('PageText')
    {{__('admin.invoices_month')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{__('admin.invoices')}}
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
                                    {{__('admin.phone_admin')}}    {{hotel()->phone_hotel}}<br>
                                    {{__('admin.admin_name')}} {{lang() == 'ar' ? hotel()->name_ar : hotel()->name_en}}</p>
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

                                    <th>{{__('site.id')}}</th>
                                    <th>{{__('site.city')}}</th>
                                    <th>{{__('site.child')}}</th>
                                    <th>{{__('site.adults')}}</th>
                                    <th>{{__('site.room_type')}}</th>
                                    <th>{{__('site.room_number')}}</th>
                                    <th>{{__('site.num_of_nights')}}</th>
                                    <th>{{__('site.date_arrive')}}</th>
                                    <th>{{__('site.date_leave')}}</th>
                                    <th>{{__('site.total_money')}}</th>
                                    <th>{{__('site.name')}}</th>
                                    <th>{{__('site.reserve')}}</th>


                                </tr>
                                </thead>

                                @foreach($invoices as $invoice)
                                    <tbody>

                                    <tr>

                                        <td>{{$invoice->id}}</td>
                                        <td>{{$invoice->destination}}</td>
                                        <td>{{$invoice->children}}</td>
                                        <td>{{$invoice->adults}}</td>
                                        <td>{{$invoice->room->room_type}}</td>
                                        <td>{{$invoice->room_number}}</td>
                                        <td>{{$invoice->num_of_nights}}</td>
                                        <td>{{$invoice->check_in}}</td>
                                        <td>{{$invoice->check_out}}</td>
                                        <td>{{ lang() == 'ar' ? number_format($invoice->total,2) . $invoice->hotel->currency_ar : number_format($invoice->total,2) . $invoice->hotel->currency_en}}</td>
                                        <td>{{$invoice->user->name}}</td>
                                        <td>{{$invoice->cancel()}}</td>


                                    </tr>

                                    </tbody>
                                @endforeach


                                <tr>


                                    <td>{{__('hotels.commission')}}</td>
                                    <td class="tx-left" colspan="13">@foreach($commissions as $commission) {{ lang() == 'ar' ? number_format($commission->commission,2)  . hotel()->currency_ar : number_format($commission->commission,2)  . hotel()->currency_en}}   @endforeach</td>
                                </tr>
                                <tr>

                                    <td>{{__('hotels.total')}}</td>
                                    <td class="tx-left" colspan="13"> @foreach($commissions as $commission)  {{ lang() == 'ar' ? number_format($commission->total,2) . hotel()->currency_ar : number_format($commission->total,2) . hotel()->currency_en}}   @endforeach</td>
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


























