@extends('layouts_admin.master')
@section('css')
    @section('title')
        حجوزات العملاء
    @stop
@endsection

@section('PageText')
    {{__('admin.hotel_reservations_list')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{__('hotels.booking_department')}}

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
                                <a href="{{route('admins.hotel.all')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{__('hotel_sidebar.all_hotels')}}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
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
                                                <td>{{ lang() == 'ar' ? $invoice->hotel->name_ar : $invoice->hotel->name_en}}</td>
                                                <td>{{ lang() == 'ar' ? number_format($invoice->total,2) . $invoice->hotel->currency_ar : number_format($invoice->total,2) . $invoice->hotel->currency_en}}</td>
                                                <td>{{$invoice->user->name}}</td>
                                                <td>{{$invoice->cancel()}}</td>

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
