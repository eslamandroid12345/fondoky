@extends('user_dashboard.master')
@section('css')
    @section('title')
        حجوزاتي
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

                                @if(session()->has('canceled'))
                                    <div class="alert alert-danger">{{session()->get('canceled')}}</div>
                                @endif

                                @if(session()->has('success'))
                                    <div class="alert alert-danger">{{session()->get('success')}}</div>
                                @endif
                                <a href="{{url('/')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{__('hotel_sidebar.home')}}</a>

{{--                        <div class="table-responsive">--}}
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                   data-page-length="50"
                                   style="text-align: center">
                                <thead>
                                <tr>
                                    <th>{{__('site.id')}}</th>
                                    <th>{{__('site.rate')}}</th>
                                    <th>{{__('site.city')}}</th>
                                    <th>{{__('site.child')}}</th>
                                    <th>{{__('site.adults')}}</th>
                                    <th>{{__('site.room_type')}}</th>
                                    <th>{{__('site.room_number')}}</th>
                                    <th>{{__('site.num_of_nights')}}</th>
                                    <th>{{__('site.date_arrive')}}</th>
                                    <th>{{__('site.date_leave')}}</th>
                                    <th>{{__('site.hotel')}}</th>
                                    <th>{{__('site.total')}}</th>
                                    <th>{{__('site.reserve')}}</th>
                                    <th>{{__('site.control')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($reservations as $reservation)

                                    <tr>
                                        <td>{{$reservation->id}}</td>
                                        @if(\Carbon\Carbon::now()->format('Y-m-d') == $reservation->check_out)
                                            <td><a style="color: #2aa198" href="{{route('users.rates.create',$reservation->hotel->id)}}">تقيم الفندق</a> </td>

                                        @else
                                            <td>{{__('site.text')}}</td>
                                        @endif
                                        <td>{{$reservation->destination}}</td>
                                        <td>{{$reservation->children}}</td>
                                        <td>{{$reservation->adults}}</td>
                                        <td>{{$reservation->room->room_type}}</td>
                                        <td>{{$reservation->room_number}}</td>
                                        <td>{{$reservation->num_of_nights}}</td>
                                        <td>{{$reservation->check_in}}</td>
                                        <td>{{$reservation->check_out}}</td>
                                        <td>{{ lang() == 'ar' ? $reservation->hotel->name_ar : $reservation->hotel->name_en}}</td>
                                        <td>{{ lang() == 'ar' ? number_format($reservation->total_all,2) . $reservation->hotel->currency_ar : number_format($reservation->total_all,2) . $reservation->hotel->currency_en}}</td>
                                        <td>{{$reservation->cancel()}}</td>
                                        <td>


                                            <div class="dropdown show">
                                                <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{__('content.operations')}}
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                                                    @if($reservation->status == 1)


                                                        <a class="dropdown-item" href="{{route('reservations.cancel',$reservation->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('site.cancel')}}</a>
                                                    @else
                                                        <a class="dropdown-item" href="#"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('site.canceled')}}</a>


                                                    @endif

                                                </div>
                                            </div>

                                        </td>

                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                        </div>
{{--                            </div>--}}
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
