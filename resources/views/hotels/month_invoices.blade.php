@extends('layouts.master')
@section('css')
    @section('title')
        الفاتوره الشهريه
    @stop
@endsection

@section('PageText')
    {{__('hotels.invoices_department')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{__('hotels.report')}}

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
                                <a href="{{route('hotels.reservations')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{__('hotel_sidebar.all')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>{{__('hotels.start')}} </th>
                                            <th>{{__('hotels.end')}}</th>
                                            <th>{{__('hotels.invoice')}}</th>

                                        </tr>
                                        </thead>

                                            <tbody>
                                            <tr>
                                                <td>{{ Carbon\Carbon::now()->firstOfMonth()->translatedFormat('l j F Y')}}</td>
                                                <td>{{ Carbon\Carbon::now()->lastOfMonth()->translatedFormat('l j F Y')}}</td>

                                                <td>

                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('content.operations')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                                <a class="dropdown-item" href="{{route('hotels.invoices')}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('hotels.invoice_monthly')}}</a>


                                                        </div>
                                                    </div>

                                                </td>



                                            </tr>
                                            </tbody>

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
