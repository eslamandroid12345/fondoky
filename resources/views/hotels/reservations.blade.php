@extends('layouts.master')
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

    {{--start model body--}}
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">

                                <a href="{{route('hotels.arrivals')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{__('hotel_sidebar.booking_day')}}</a>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>{{__('book_hotel.id')}}</th>
                                            <th>{{__('book_hotel.user')}}</th>
                                            <th>{{__('book_hotel.room_type')}}</th>
                                            <th>{{__('book_hotel.date_arrive')}}</th>
                                            <th>{{__('book_hotel.date_leave')}}</th>
                                            <th>{{__('book_hotel.total')}}</th>
                                            <th>{{__('book_hotel.vat_tax')}}</th>
                                            <th>{{__('book_hotel.municipal_tax')}}</th>
                                            <th>{{__('book_hotel.tourism_tax')}}</th>
                                            <th>{{__('book_hotel.total_all')}}</th>
                                            <th>{{__('book_hotel.commission')}} + 5%</th>
                                            <th>{{__('book_hotel.phone')}}</th>
                                            <th>{{__('book_hotel.children')}}</th>
                                            <th>{{__('book_hotel.adults')}}</th>
                                            <th>{{__('book_hotel.room_number')}}</th>
                                            <th>{{__('book_hotel.num_of_nights')}}</th>
                                            <th>{{__('book_hotel.blocked')}}</th>
                                            <th>{{__('book_hotel.stayed')}}</th>
                                            <th>{{__('book_hotel.control')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($invoices as $invoice)
                                            <tr>
                                                <td>{{$invoice->id}}</td>
                                                <td>{{$invoice->user->name}}</td>
                                                <td>{{$invoice->room->room_type}}</td>
                                                <td>{{$invoice->check_in}}</td>
                                                <td>{{$invoice->check_out}}</td>
                                                <td>{{ $invoice->total}}</td>
                                                <td>{{  $invoice->vat_tax}}</td>
                                                <td>{{  $invoice->municipal_tax }}</td>
                                                <td>{{   $invoice->tourism_tax }}</td>
                                                <td>{{ $invoice->total_all}}</td>
                                                <td>{{$invoice->commission}}</td>
                                                <td>{{$invoice->user->phone}}</td>
                                                <td>{{$invoice->children}}</td>
                                                <td>{{$invoice->adults}}</td>
                                                <td>{{$invoice->room_number}}</td>
                                                <td>{{$invoice->num_of_nights}}</td>
                                                <td>{{$invoice->cancel()}}</td>
                                                <td>{{$invoice->stay()}}</td>
                                                <td>


                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('content.operations')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            @if($invoice->status == 1)


                                                                <a class="dropdown-item" href="{{route('hotels.block',$invoice->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('book_hotel.block')}}</a>
                                                            @else
                                                                <a class="dropdown-item" href="#"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('book_hotel.block_now')}}</a>

                                                            @endif

                                                            @if($invoice->stayed == 1)
                                                                <a class="dropdown-item" href="{{route('hotels.stay',$invoice->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('book_hotel.not_stayed')}}</a>


                                                            @else
                                                                <a class="dropdown-item" href="#"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('book_hotel.leave')}}</a>

                                                            @endif
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
