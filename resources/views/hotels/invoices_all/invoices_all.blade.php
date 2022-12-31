@extends('layouts.master')
@section('css')
    @section('title')
        جميع الفواتير
@endsection

@section('PageText')
    {{__('hotels.invoices_department')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{__('hotels.report_all')}}

    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <select class="form-select">
                                   <option disabled>Select Year</option>
                                    @for($year = 2021 ; $year <= 2030; $year++)
                                        <option value="{{$year}}">{{$year}}</option>
                                    @endfor
                                </select>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">

                                        <thead>
                                        <tr>
                                            <th>{{__('hotels.start')}} </th>
                                            <th>{{__('hotels.end')}}</th>
                                            <th>{{__('hotels.bank')}}</th>
                                            <th>{{__('hotels.commission')}}</th>
                                            <th>{{__('hotels.total')}}</th>
                                            <th>{{__('hotels.status')}}</th>
                                            <th>{{__('hotels.currency')}}</th>
                                            <th>{{__('hotels.invoice')}}</th>


                                        </tr>
                                        </thead>

                                     @foreach($invoices as $invoice)

                                            <tbody>
                                            <tr>
                                                <td>{{$invoice->from}}</td>
                                                <td>{{ $invoice->to}}</td>
                                                <td>{{ $invoice->bank_account}}</td>
                                                <td>{{ $invoice->amount}}</td>
                                                <td>{{ $invoice->total}}</td>
                                                <td>{{ $invoice->invoicesStatus()}}</td>
                                                <td>{{ lang() == 'ar' ? auth('hotel')->user()->currency_ar : auth('hotel')->user()->currency_en}}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('hotels.invoice_monthly')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                            <a class="dropdown-item" href="{{route('hotels.invoices',[$invoice->created_at->format('m'),$invoice->created_at->format('Y')])}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('hotels.invoice_monthly')}}</a>


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
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

@endsection

