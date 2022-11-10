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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('admin.hotel_reservations_list')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--start div form of search--}}
                    <div>
                        <div>
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                        {{__('hotels.booking_department')}}
                                    </h5>

                                </div>
                                <div class="modal-body">
                                    <form  action="{{route('hotels.reservations')}}" method="GET" autocomplete="off">

                                        <div class="row">
                                            <div class="col-12">
                                                <label for="Name" class="mr-sm-2">{{__('book_hotel.date_arrive')}}
                                                    :</label>
                                                <input  type="text" class="form-control"  id="datepicker-action" name="check_in" data-date-format="yyyy-mm-dd" value="{{request('check_in')}}">
                                            </div>
                                            <div class="col-12">
                                                <label for="Name_en" class="mr-sm-2">{{__('book_hotel.date_leave')}}
                                                    :</label>
                                                <input type="text" class="form-control"  id="datepicker-action-2" name="check_out" data-date-format="yyyy-mm-dd" value="{{request('check_out')}}">
                                            </div>

                                            <div class="col-12">
                                                <label for="Name_en" class="mr-sm-2">{{__('book_hotel.user')}}
                                                    :</label>
                                                <input type="text" class="form-control" name="name" value="{{request('name')}}">
                                            </div>

                                            <div class="col-12">
                                                <label for="Name_en" class="mr-sm-2">{{__('book_hotel.phone')}}
                                                    :</label>
                                                <input type="text" class="form-control" name="phone" value="{{request('phone')}}">
                                            </div>



                                            <div class="col mt-3">
                                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{__('book.search')}}</button>

                                            </div>
                                        </div>

                                        <br><br>
                                    </form>
                                </div>

                                </form>

                            </div>
                        </div>
                    </div>

                    {{--end div form of search--}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{--end model body--}}


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
                                <button class="sear btn btn-info btn-sm" role="button"
                                        aria-pressed="true" data-toggle="modal" data-target="#exampleModal">{{__('book.search')}}</button><br><br>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>{{__('book_hotel.id')}}</th>
                                            <th>{{__('book_hotel.rate')}}</th>
                                            <th>{{__('book_hotel.commission')}}</th>
                                            <th>{{__('book_hotel.user')}}</th>
                                            <th>{{__('book_hotel.phone')}}</th>
                                            <th>{{__('book_hotel.city_to')}}</th>
                                            <th>{{__('book_hotel.children')}}</th>
                                            <th>{{__('book_hotel.adults')}}</th>
                                            <th>{{__('book_hotel.room_type')}}</th>
                                            <th>{{__('book_hotel.room_number')}}</th>
                                            <th>{{__('book_hotel.num_of_nights')}}</th>
                                            <th>{{__('book_hotel.date_arrive')}}</th>
                                            <th>{{__('book_hotel.date_leave')}}</th>
                                            <th>{{__('book_hotel.total_all')}}</th>
                                            <th>{{__('book_hotel.vat_tax')}}</th>
                                            <th>{{__('book_hotel.municipal_tax')}}</th>
                                            <th>{{__('book_hotel.tourism_tax')}}</th>
                                            <th>{{__('book_hotel.total')}}</th>
                                            <th>{{__('book_hotel.blocked')}}</th>
                                            <th>{{__('book_hotel.stayed')}}</th>
                                            <th>{{__('book_hotel.control')}}</th>
                                        </tr>
                                        </thead>

                                        @foreach($invoices as $invoice)
                                            <tbody>
                                            <tr>
                                                <td>{{$invoice->id}}</td>
                                                <td>{{$invoice->rate}}</td>
                                                <td>{{$invoice->commission}}</td>
                                                <td>{{$invoice->user->name}}</td>
                                                <td>{{$invoice->user->phone}}</td>
                                                <td>{{$invoice->destination}}</td>
                                                <td>{{$invoice->children}}</td>
                                                <td>{{$invoice->adults}}</td>
                                                <td>{{$invoice->room->room_type}}</td>
                                                <td>{{$invoice->room_number}}</td>
                                                <td>{{$invoice->num_of_nights}}</td>
                                                <td>{{$invoice->check_in}}</td>
                                                <td>{{$invoice->check_out}}</td>
                                                <td>{{ lang() == 'ar' ? $invoice->total_all  . hotel()->currency_ar : $invoice->total_all . hotel()->currency_en}}</td>
                                                <td>{{ lang() == 'ar' ? $invoice->vat_tax . hotel()->currency_ar : $invoice->vat_tax . hotel()->currency_en}}</td>
                                                <td>{{ lang() == 'ar' ? $invoice->municipal_tax . hotel()->currency_ar : $invoice->municipal_tax . hotel()->currency_en }}</td>
                                                <td>{{  lang() == 'ar' ? $invoice->tourism_tax . hotel()->currency_ar : $invoice->tourism_tax . hotel()->currency_en }}</td>
                                                <td>{{ lang() == 'ar' ? $invoice->total . hotel()->currency_ar : $invoice->total . hotel()->currency_en}}</td>
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
