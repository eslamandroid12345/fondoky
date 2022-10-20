{{--@extends('layout_h.master')--}}
{{--@section('title')--}}

{{--    قائمه الحجوزات--}}
{{--@stop--}}
{{--@section('css')--}}
{{--    <!-- Internal Data table css -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.js.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!--Internal   Notify -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />--}}
{{--@endsection--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}
{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.booking_department')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /--}}

{{--                    </span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}


{{--    @if (session()->has('welcome'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('welcome') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    @if (session()->has('block_stay'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('block_stay') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    @if (session()->has('block'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('block') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    <form action="{{route('hotels.reservations')}}" method="GET" autocomplete="off">--}}

{{--        <!-- row -->--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-4 col-md-4 clo-sm-12 col-12 mb-2">--}}
{{--                <input type="text" name="check_in" value="{{request('check_in')}}" class="form-control fc-datepicker"  placeholder="{{ \Carbon\Carbon::now()->translatedFormat('l j F Y') }}">--}}

{{--            </div>--}}

{{--            <div class="col-lg-4 col-md-4 clo-sm-12 col-12 mb-2" >--}}
{{--                <input type="text" class="form-control fc-datepicker" name="check_out" value="{{request('check_out')}}" placeholder="{{\Carbon\Carbon::now()->addDays(1)->translatedFormat('l j F Y')}}">--}}

{{--            </div>--}}

{{--            <div class="col-lg-4 col-md-4 clo-sm-12 col-12">--}}

{{--                <button type="submit" class="btn btn-info text-white mb-3">{{__('book.search')}}</button>--}}
{{--            </div>--}}

{{--            <!--div-->--}}
{{--            <div class="col-xl-12">--}}
{{--                <div class="card mg-b-20">--}}
{{--                    <div class="card-header pb-0">--}}
{{--                        <a href="{{route('hotels.reservations')}}" class="modal-effect btn btn-sm btn-primary" style="color:white"><i--}}
{{--                                    class="fas fa-plus"></i>&nbsp;{{__('hotels.booking_department')}}</a>--}}


{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>{{__('book_hotel.id')}}</th>--}}
{{--                                    <th>{{__('book_hotel.rate')}}</th>--}}
{{--                                    <th>{{__('book_hotel.commission')}}</th>--}}
{{--                                    <th>{{__('book_hotel.user')}}</th>--}}
{{--                                    <th>{{__('book_hotel.city_to')}}</th>--}}
{{--                                    <th>{{__('book_hotel.children')}}</th>--}}
{{--                                    <th>{{__('book_hotel.adults')}}</th>--}}
{{--                                    <th>{{__('book_hotel.room_type')}}</th>--}}
{{--                                    <th>{{__('book_hotel.room_number')}}</th>--}}
{{--                                    <th>{{__('book_hotel.num_of_nights')}}</th>--}}
{{--                                    <th>{{__('book_hotel.date_arrive')}}</th>--}}
{{--                                    <th>{{__('book_hotel.date_leave')}}</th>--}}
{{--                                    <th>{{__('book_hotel.total_all')}}</th>--}}
{{--                                    <th>{{__('book_hotel.vat_tax')}}</th>--}}
{{--                                    <th>{{__('book_hotel.municipal_tax')}}</th>--}}
{{--                                    <th>{{__('book_hotel.tourism_tax')}}</th>--}}
{{--                                    <th>{{__('book_hotel.total')}}</th>--}}
{{--                                    <th>{{__('book_hotel.blocked')}}</th>--}}
{{--                                    <th>{{__('book_hotel.stayed')}}</th>--}}
{{--                                    <th>{{__('book_hotel.control')}}</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}

{{--                                @foreach($invoices as $invoice)--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$invoice->id}}</td>--}}
{{--                                        <td>{{$invoice->rate}}</td>--}}
{{--                                        <td>{{$invoice->commission}}</td>--}}
{{--                                        <td>{{$invoice->user->name}}</td>--}}
{{--                                        <td>{{$invoice->destination}}</td>--}}
{{--                                        <td>{{$invoice->children}}</td>--}}
{{--                                        <td>{{$invoice->adults}}</td>--}}
{{--                                        <td>{{$invoice->room->room_type->room_type}}</td>--}}
{{--                                        <td>{{$invoice->room_number}}</td>--}}
{{--                                        <td>{{$invoice->num_of_nights}}</td>--}}
{{--                                        <td>{{$invoice->check_in}}</td>--}}
{{--                                        <td>{{$invoice->check_out}}</td>--}}
{{--                                        <td>{{ lang() == 'ar' ? $invoice->total_all  . hotel()->currency_ar : $invoice->total_all . hotel()->currency_en}}</td>--}}
{{--                                        <td>{{ lang() == 'ar' ? $invoice->vat_tax . hotel()->currency_ar : $invoice->vat_tax . hotel()->currency_en}}</td>--}}
{{--                                        <td>{{ lang() == 'ar' ? $invoice->municipal_tax . hotel()->currency_ar : $invoice->municipal_tax . hotel()->currency_en }}</td>--}}
{{--                                        <td>{{  lang() == 'ar' ? $invoice->tourism_tax . hotel()->currency_ar : $invoice->tourism_tax . hotel()->currency_en }}</td>--}}
{{--                                        <td>{{ lang() == 'ar' ? $invoice->total . hotel()->currency_ar : $invoice->total . hotel()->currency_en}}</td>--}}
{{--                                        <td>{{$invoice->cancel()}}</td>--}}
{{--                                        <td>{{$invoice->stay()}}</td>--}}
{{--                                        <td>--}}

{{--                                            <div class="dropdown">--}}
{{--                                                <button aria-expanded="false" aria-haspopup="true"--}}
{{--                                                        class="btn ripple btn-primary btn-sm" data-toggle="dropdown"--}}
{{--                                                        type="button">{{__('content.operations')}}<i class="fas fa-caret-down ml-1"></i></button>--}}
{{--                                                <div class="dropdown-menu tx-13">--}}

{{--                                                    @if($invoice->status == 1)--}}
{{--                                                        <a class="dropdown-item" href="{{route('hotels.block',$invoice->id)}}">{{__('book_hotel.block')}}</a>--}}

{{--                                                    @else--}}
{{--                                                        <a class="dropdown-item" href="">{{__('book_hotel.block_now')}}</a>--}}


{{--                                                    @endif--}}


{{--                                                    @if($invoice->stayed == 1)--}}
{{--                                                        <a class="dropdown-item" href="{{route('hotels.stay',$invoice->id)}}">{{__('book_hotel.not_stayed')}}</a>--}}

{{--                                                    @else--}}
{{--                                                        <a class="dropdown-item" href="">{{__('book_hotel.leave')}}</a>--}}


{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            </div>--}}


{{--                                        </td>--}}

{{--                                    </tr>--}}
{{--                                    </tbody>--}}

{{--                                @endforeach--}}


{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--/div-->--}}
{{--        </div>--}}
{{--    </form>--}}



{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Data tables -->--}}

{{--    <script src="{{asset('js/jquery-3.6.0.min.js')}}" ></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>--}}
{{--    <!--Internal  Datatable js -->--}}
{{--    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>--}}
{{--    <!--Internal  Notify js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>--}}




{{--@endsection--}}
end booking
===============================================================================================================================================

{{--@extends('layout_h.master')--}}
{{--@section('title')--}}
{{--    {{ Carbon\Carbon::now()->firstOfMonth()->translatedFormat('l j F Y')}}--}}
{{--@stop--}}
{{--@section('css')--}}
{{--    <!-- Internal Data table css -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!--Internal   Notify -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />--}}
{{--@endsection--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}


{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.invoices_department')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /--}}
{{--                {{__('hotels.report')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}



{{--    <!-- row -->--}}
{{--    <div class="row">--}}
{{--        <!--div-->--}}
{{--        <div class="col-xl-12">--}}
{{--            <div class="card mg-b-20">--}}
{{--                <div class="card-header pb-0">--}}


{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}


{{--                                <th>{{__('hotels.start')}} </th>--}}
{{--                                <th>{{__('hotels.end')}}</th>--}}
{{--                                <th>{{__('hotels.invoice')}}</th>--}}


{{--                            </tr>--}}
{{--                            </thead>--}}



{{--                            <tbody>--}}
{{--                            <tr>--}}

{{--                                <td>{{ Carbon\Carbon::now()->firstOfMonth()->translatedFormat('l j F Y')}}</td>--}}
{{--                                <td>{{ Carbon\Carbon::now()->lastOfMonth()->translatedFormat('l j F Y')}}</td>--}}



{{--                                <td>--}}
{{--                                    <div class="dropdown">--}}
{{--                                        <button aria-expanded="false" aria-haspopup="true"--}}
{{--                                                class="btn ripple btn-primary btn-sm" data-toggle="dropdown"--}}
{{--                                                type="button">{{__('content.operations')}}<i class="fas fa-caret-down ml-1"></i></button>--}}
{{--                                        <div class="dropdown-menu tx-13">--}}

{{--                                            <a class="dropdown-item"--}}
{{--                                               href="{{route('hotels.invoices')}}">{{__('hotels.invoice_monthly')}}</a>--}}





{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </td>--}}


{{--                            </tr>--}}

{{--                            </tbody>--}}

{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--/div-->--}}
{{--    </div>--}}



{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Data tables -->--}}

{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>--}}
{{--    <!--Internal  Datatable js -->--}}
{{--    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>--}}
{{--    <!--Internal  Notify js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>--}}



{{--@endsection--}}
end month invoices
=================================================================================================================================================
{{--@extends('layout_h.master')--}}
{{--@section('css')--}}
{{--    <!--- Internal Select2 css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!---Internal Fileupload css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />--}}
{{--    <!--Internal Sumoselect css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">--}}
{{--    <!--Internal  TelephoneInput css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">--}}
{{--@endsection--}}
{{--@section('title')--}}
{{--    تعديل بيانات الفندق--}}
{{--@stop--}}

{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}
{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.profile')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/--}}
{{--                   {{__('register.update')}} </span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    @if (session()->has('current_password'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('current_password') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    <!-- row -->--}}
{{--    <div class="row">--}}

{{--        <div class="col-lg-12 col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}

{{--                    <form method="POST" action="{{ route('hotels.update',$hotel->id) }}" enctype="multipart/form-data" autocomplete="off">--}}
{{--                        @csrf--}}
{{--                        @method('PUT')--}}

{{--                        <div class="row">--}}


{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{ __('register.manger') }}</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="manger" value="{{$hotel->manger}}">--}}
{{--                                <span class="text-danger"> @error('manger') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{ __('register.name_ar') }}</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="name_ar" value="{{$hotel->name_ar}}">--}}
{{--                                <span class="text-danger"> @error('name_ar') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{ __('register.name_en') }}</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="name_en" value="{{$hotel->name_en}}">--}}
{{--                                <span class="text-danger"> @error('name_en') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{ __('register.location_ar') }}</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="location_ar" value="{{$hotel->location_ar}}">--}}
{{--                                <span class="text-danger"> @error('location_ar') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{ __('register.location_en') }}</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="location_en" value="{{$hotel->location_en}}">--}}
{{--                                <span class="text-danger"> @error('location_en') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{ __('register.email') }}</label>--}}
{{--                                <input type="email" class="form-control" id="inputName" name="email" value="{{$hotel->email}}">--}}
{{--                                <span class="text-danger"> @error('email') {{$message}} @enderror</span>--}}

{{--                            </div>--}}

{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{ __('register.current_password') }}</label>--}}
{{--                                <input type="password" class="form-control" id="inputName" name="current_password">--}}
{{--                                <span class="text-danger"> @error('current_password') {{$message}} @enderror</span>--}}

{{--                            </div>--}}

{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{ __('register.new_password') }}</label>--}}
{{--                                <input type="password" class="form-control" id="inputName" name="password">--}}
{{--                                <span class="text-danger"> @error('password') {{$message}} @enderror</span>--}}

{{--                            </div>--}}





{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{ __('register.confirm_password') }}</label>--}}
{{--                                <input type="password" class="form-control" id="inputName" name="confirm_password">--}}
{{--                                <span class="text-danger"> @error('confirm_password') {{$message}} @enderror</span>--}}

{{--                            </div>--}}





{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{ __('register.pound') }}</label>--}}
{{--                                @php--}}
{{--                                    $currencies_ar = ["ريال السعودي ","دولار الامريكي","يورو","درهم الاماراتي","دينار البحريني","جنيه المصري","جنيه البريطاني","دينار الكويتي","ريال العماني","ريال القطري"];--}}

{{--                                @endphp--}}
{{--                                <select name="currency_ar" class="form-control SlectBox" onclick="console.log($(this).val())"--}}
{{--                                        onchange="console.log('change is firing')">--}}

{{--                                    @foreach($currencies_ar as $currency)--}}
{{--                                        <option value="{{$currency}}" {{$hotel->currency_ar == $currency ? 'selected' : ''}}>{{$currency}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                <span class="text-danger"> @error('pound') {{$message}} @enderror</span>--}}

{{--                            </div>--}}



{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{ __('register.currency_en') }}</label>--}}
{{--                                @php--}}

{{--                                    $currencies_en = ["SAR","USD","EUR","AED","BHD","EGP","GPP","KWD","OMR","QAR"];--}}

{{--                                @endphp--}}
{{--                                <select name="currency_en" class="form-control SlectBox" onclick="console.log($(this).val())"--}}
{{--                                        onchange="console.log('change is firing')">--}}

{{--                                    @foreach($currencies_en as $currency_en)--}}
{{--                                        <option value="{{$currency_en}}" {{$hotel->currency_en == $currency_en ? 'selected' : ''}}>{{$currency_en}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                <span class="text-danger"> @error('pound') {{$message}} @enderror</span>--}}

{{--                            </div>--}}







{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{ __('register.description') }}</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="description" value="{{$hotel->description}}">--}}
{{--                                <span class="text-danger"> @error('description') {{$message}} @enderror</span>--}}

{{--                            </div>--}}



{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{ __('register.phone_hotel') }}</label>--}}
{{--                                <input type="number" class="form-control" id="inputName" name="phone_hotel" value="{{$hotel->phone_hotel}}">--}}
{{--                                <span class="text-danger"> @error('phone_hotel') {{$message}} @enderror</span>--}}

{{--                            </div>--}}




{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <h5 class="card-title">{{__('hotels.images')}}</h5>--}}

{{--                                <input type="file" name="hotel_photos[]" class="dropify" accept=".jpg, .png, image/jpeg, image/png"--}}
{{--                                       data-height="70" multiple />--}}

{{--                                <span class="text-danger"> @error('hotel_photos') {{$message}} @enderror</span>--}}

{{--                            </div>--}}
{{--                            <br>--}}


{{--                        </div>--}}


{{--                        <div class="d-flex justify-content-center mt-3">--}}
{{--                            <button type="submit" class="btn btn-primary">{{__('register.update_hotel')}}</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Select2 js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>--}}
{{--    <!--Internal Fileuploads js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>--}}
{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>--}}
{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>--}}
{{--    <!--Internal Sumoselect js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>--}}
{{--    <!--Internal  Datepicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}
{{--    <!--Internal  jquery.maskedinput js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>--}}
{{--    <!--Internal  spectrum-colorpicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
{{--    <!-- Internal form-elements js -->--}}
{{--    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>--}}



{{--@endsection--}}
end hotel edit=======================================================================================================================
{{--@extends('layout_h.master')--}}
{{--@section('css')--}}
{{--    <!--- Internal Select2 css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!---Internal Fileupload css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />--}}
{{--    <!--Internal Sumoselect css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">--}}
{{--    <!--Internal  TelephoneInput css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">--}}
{{--@endsection--}}
{{--@section('title')--}}

{{--    اضافه نوع جديد للغرف--}}
{{--@stop--}}

{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}



{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.room_type_add')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/--}}
{{--                   {{__('hotels.rooms_control')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    @if (session()->has('success'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('success') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    <!-- row -->--}}
{{--    <div class="row">--}}

{{--        <div class="col-lg-12 col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}

{{--                    <form class="form" action="{{route('hotels.room.type')}}" method="POST" autocomplete="off">--}}

{{--                        @csrf--}}

{{--                        <div class="row">--}}


{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('room_add.room_type')}}</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="room_type">--}}
{{--                                <span class="text-danger"> @error('room_type') {{$message}} @enderror</span>--}}

{{--                            </div>--}}




{{--                            <div class="d-flex justify-content-center mt-3">--}}
{{--                                <button type="submit" class="btn btn-primary">{{__('admin_create.save')}}</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Select2 js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>--}}
{{--    <!--Internal Fileuploads js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>--}}
{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>--}}
{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>--}}
{{--    <!--Internal Sumoselect js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>--}}
{{--    <!--Internal  Datepicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}
{{--    <!--Internal  jquery.maskedinput js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>--}}
{{--    <!--Internal  spectrum-colorpicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
{{--    <!-- Internal form-elements js -->--}}
{{--    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>--}}



{{--@endsection--}}
end room type add ====================================================================================================================
{{--@extends('layout_h.master')--}}
{{--@section('css')--}}
{{--    <!--- Internal Select2 css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!---Internal Fileupload css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />--}}
{{--    <!--Internal Sumoselect css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">--}}
{{--    <!--Internal  TelephoneInput css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">--}}
{{--@endsection--}}
{{--@section('title')--}}
{{--    اضافه غرفه جديديه--}}
{{--@stop--}}

{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}


{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.rooms_departments')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /--}}
{{--                 {{__('hotels.rooms_control')}}</span>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    @if (session()->has('room'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('room') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    <!-- row -->--}}
{{--    <div class="row">--}}

{{--        <div class="col-lg-12 col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}

{{--                    <form class="form" action="{{route('rooms.store')}}" method="POST" enctype="multipart/form-data">--}}

{{--                        @csrf--}}

{{--                        <div class="row">--}}



{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('room_add.room_type')}}</label>--}}


{{--                                <select name="room_type_id" class="form-control SlectBox" onclick="console.log($(this).val())"--}}
{{--                                        onchange="console.log('change is firing')">--}}

{{--                                    @foreach($room_types as $room_type)--}}

{{--                                        <option value="{{$room_type->id}}">{{$room_type->room_type}}</option>--}}
{{--                                    @endforeach--}}

{{--                                </select>--}}
{{--                                <span class="text-danger"> @error('room_type_id') {{$message}} @enderror</span>--}}

{{--                            </div>--}}





{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('room_add.room_description')}}</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="room_description">--}}
{{--                                <span class="text-danger"> @error('room_description') {{$message}} @enderror</span>--}}

{{--                            </div>--}}



{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('room_add.adults_max')}}</label>--}}
{{--                                <input type="number" class="form-control" id="inputName" name="adults_max">--}}
{{--                                <span class="text-danger"> @error('adults_max') {{$message}} @enderror</span>--}}

{{--                            </div>--}}



{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('room_add.child_max')}}</label>--}}
{{--                                <input type="number" class="form-control" id="inputName" name="child_max">--}}
{{--                                <span class="text-danger"> @error('child_max') {{$message}} @enderror</span>--}}

{{--                            </div>--}}



{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <h5 class="card-title">{{__('room_add.images')}}</h5>--}}

{{--                                <input type="file" name="images[]" class="dropify"--}}
{{--                                       data-height="70" multiple />--}}

{{--                                <span class="text-danger"> @error('images') {{$message}} @enderror</span>--}}

{{--                            </div>--}}
{{--                            <br>--}}


{{--                        </div>--}}


{{--                        <div class="d-flex justify-content-center mt-3">--}}
{{--                            <button type="submit" class="btn btn-primary">{{__('admin_create.save')}}</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Select2 js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>--}}
{{--    <!--Internal Fileuploads js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>--}}
{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>--}}
{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>--}}
{{--    <!--Internal Sumoselect js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>--}}
{{--    <!--Internal  Datepicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}
{{--    <!--Internal  jquery.maskedinput js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>--}}
{{--    <!--Internal  spectrum-colorpicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
{{--    <!-- Internal form-elements js -->--}}
{{--    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>--}}



{{--@endsection--}}
end room create ======================================================================================================================
{{--@extends('layout_h.master')--}}
{{--@section('title')--}}
{{--    انواع الغرف--}}
{{--@stop--}}
{{--@section('css')--}}
{{--    <!-- Internal Data table css -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!--Internal   Notify -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />--}}
{{--@endsection--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}

{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.room_type_show')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /--}}
{{--                   {{__('hotels.rooms_control')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}



{{--    <!-- row -->--}}
{{--    <div class="row">--}}
{{--        <!--div-->--}}
{{--        <div class="col-xl-12">--}}
{{--            <div class="card mg-b-20">--}}
{{--                <div class="card-header pb-0">--}}


{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>{{__('hotels.room_number')}}</th>--}}
{{--                                <th>{{__('room_add.room_type')}}</th>--}}
{{--                                <th>{{__('hotels.date_create')}}</th>--}}
{{--                                <th>{{__('data.action')}}</th>--}}


{{--                            </tr>--}}
{{--                            </thead>--}}


{{--                            @foreach($room_types as $room_type)--}}

{{--                                <tbody>--}}
{{--                                <tr>--}}

{{--                                    <td>{{$room_type->id}}</td>--}}
{{--                                    <td>{{$room_type->room_type}}</td>--}}
{{--                                    <td>{{$room_type->created_at->diffForHumans()}}</td>--}}

{{--                                    <td>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <button aria-expanded="false" aria-haspopup="true"--}}
{{--                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"--}}
{{--                                                    type="button">{{__('content.operations')}}<i class="fas fa-caret-down ml-1"></i></button>--}}
{{--                                            <div class="dropdown-menu tx-13">--}}

{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{route('rooms.index',$room_type->id)}}">{{__('room.rooms')}}</a>--}}



{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </td>--}}


{{--                                </tr>--}}

{{--                                </tbody>--}}
{{--                            @endforeach--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--/div-->--}}
{{--    </div>--}}



{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Data tables -->--}}

{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>--}}
{{--    <!--Internal  Datatable js -->--}}
{{--    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>--}}
{{--    <!--Internal  Notify js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>--}}



{{--@endsection--}}
end room type show===================================================================================================================


{{--@extends('layout_h.master')--}}
{{--@section('title')--}}
{{--    غرف الفندق--}}
{{--@stop--}}
{{--@section('css')--}}
{{--    <!-- Internal Data table css -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!--Internal   Notify -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />--}}
{{--@endsection--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}


{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.rooms_departments')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /--}}
{{--                 {{__('hotels.rooms_control')}}</span>--}}

{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    @if (session()->has('room'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('room') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    @if (session()->has('room_update'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('room_update') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <!-- row -->--}}
{{--    <div class="row">--}}
{{--        <!--div-->--}}
{{--        <div class="col-xl-12">--}}
{{--            <div class="card mg-b-20">--}}
{{--                <div class="card-header pb-0">--}}


{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}

{{--                                <th>{{__('room_add.room_type')}}</th>--}}
{{--                                <th>{{__('room_add.adults_max')}}</th>--}}
{{--                                <th>{{__('room_add.child_max')}}</th>--}}
{{--                                <th>{{__('room_add.room_description')}}</th>--}}
{{--                                <th>{{__('data.action')}}</th>--}}

{{--                            </tr>--}}
{{--                            </thead>--}}


{{--                            @foreach($rooms as $room)--}}

{{--                                <tbody>--}}
{{--                                <tr>--}}

{{--                                    <td>{{$room->room_type->room_type}}</td>--}}
{{--                                    <td>{{$room->adults_max}}</td>--}}
{{--                                    <td>{{$room->child_max}}</td>--}}
{{--                                    <td>{{$room->room_description}}</td>--}}

{{--                                    <td>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <button aria-expanded="false" aria-haspopup="true"--}}
{{--                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"--}}
{{--                                                    type="button">{{__('content.operations')}}<i class="fas fa-caret-down ml-1"></i></button>--}}
{{--                                            <div class="dropdown-menu tx-13">--}}

{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{route('rooms.edit',$room->id)}}">{{__('room_add.update')}}</a>--}}

{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{route('rooms.show',$room->id)}}">{{__('room_add.show')}}</a>--}}


{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{route('calendars.create',$room->id)}}">{{__('hotels.calendar_create')}}</a>--}}


{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{route('rooms.calendars.show',$room->id)}}">{{__('hotels.calendars')}}</a>--}}



{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </td>--}}


{{--                                </tr>--}}

{{--                                </tbody>--}}
{{--                            @endforeach--}}

{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--/div-->--}}
{{--    </div>--}}



{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Data tables -->--}}

{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>--}}
{{--    <!--Internal  Datatable js -->--}}
{{--    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>--}}
{{--    <!--Internal  Notify js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>--}}



{{--@endsection--}}
end rooms show==========================================================================================================================


{{--@extends('layout_h.master')--}}
{{--@section('css')--}}
{{--    <!--- Internal Select2 css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!---Internal Fileupload css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />--}}
{{--    <!--Internal Sumoselect css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">--}}
{{--    <!--Internal  TelephoneInput css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">--}}
{{--@endsection--}}
{{--@section('title')--}}
{{--    تحديث بيانات الغرفه--}}
{{--@stop--}}

{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}
{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.rooms_departments')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /--}}
{{--                 {{__('hotels.rooms_control')}}</span>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    @if (session()->has('current_password'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('current_password') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    <!-- row -->--}}
{{--    <div class="row">--}}

{{--        <div class="col-lg-12 col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}

{{--                    <form action="{{route('rooms.update',$room->id)}}" method="post" enctype="multipart/form-data" autocomplete="off">--}}
{{--                        @csrf--}}
{{--                        @method('PUT')--}}

{{--                        <div class="row">--}}



{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('room_add.room_type')}}</label>--}}


{{--                                <select name="room_type_id" class="form-control SlectBox" onclick="console.log($(this).val())"--}}
{{--                                        onchange="console.log('change is firing')">--}}

{{--                                    @foreach($room_types as $room_type)--}}

{{--                                        <option value="{{$room_type->id}}">{{$room_type->room_type}}</option>--}}
{{--                                    @endforeach--}}

{{--                                </select>--}}
{{--                                <span class="text-danger"> @error('room_type_id') {{$message}} @enderror</span>--}}

{{--                            </div>--}}




{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('room_add.room_description')}}</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="room_description" value="{{$room->room_description}}">--}}
{{--                                <span class="text-danger"> @error('room_description') {{$message}} @enderror</span>--}}

{{--                            </div>--}}



{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('room_add.adults_max')}}</label>--}}
{{--                                <input type="number" class="form-control" id="inputName" name="adults_max" value="{{$room->adults_max}}">--}}
{{--                                <span class="text-danger"> @error('adults_max') {{$message}} @enderror</span>--}}

{{--                            </div>--}}



{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3 mb-4">--}}
{{--                                <label for="inputName" class="control-label">{{__('room_add.child_max')}}</label>--}}
{{--                                <input type="number" class="form-control" id="inputName" name="child_max" value="{{$room->child_max}}">--}}
{{--                                <span class="text-danger"> @error('child_max') {{$message}} @enderror</span>--}}

{{--                            </div>--}}

{{--                            @if(count(json_decode($room->images)) == 1)--}}
{{--                                @foreach(json_decode($room->images) as $image)--}}
{{--                                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 my-1">--}}

{{--                                        <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}

{{--                            @elseif(count(json_decode($room->images)) == 2)--}}

{{--                                @foreach(json_decode($room->images) as $image)--}}
{{--                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-1">--}}

{{--                                        <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}


{{--                            @elseif(count(json_decode($room->images)) == 3)--}}

{{--                                @foreach(json_decode($room->images) as $image)--}}
{{--                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12 my-1">--}}

{{--                                        <img style="height: 280px" src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}


{{--                            @else--}}

{{--                                @foreach(json_decode($room->images) as $image)--}}
{{--                                    <div class="col-lg-3 col-md-3 col-sm-12 col-12 my-1">--}}

{{--                                        <img style="height: 280px"  src="{{URL::to('/rooms/'.$image)}}" class="d-block w-100" alt="...">--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}

{{--                            @endif--}}




{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <h5 class="card-title">{{__('room_add.images')}}</h5>--}}

{{--                                <input type="file" name="images[]" class="dropify" accept=".jpg, .png, image/jpeg, image/png"--}}
{{--                                       data-height="70" multiple />--}}

{{--                                <span class="text-danger"> @error('images') {{$message}} @enderror</span>--}}

{{--                            </div>--}}
{{--                            <br>--}}


{{--                        </div>--}}


{{--                        <div class="d-flex justify-content-center mt-3">--}}
{{--                            <button type="submit" class="btn btn-primary">{{__('admin_create.save')}}</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Select2 js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>--}}
{{--    <!--Internal Fileuploads js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>--}}
{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>--}}
{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>--}}
{{--    <!--Internal Sumoselect js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>--}}
{{--    <!--Internal  Datepicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}
{{--    <!--Internal  jquery.maskedinput js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>--}}
{{--    <!--Internal  spectrum-colorpicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
{{--    <!-- Internal form-elements js -->--}}
{{--    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>--}}



{{--@endsection--}}
room update=============================================================================================================================



{{--@extends('layout_h.master')--}}
{{--@section('css')--}}
{{--    <!--- Internal Select2 css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!---Internal Fileupload css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />--}}
{{--    <!--Internal Sumoselect css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">--}}
{{--    <!--Internal  TelephoneInput css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">--}}

{{--@endsection--}}
{{--@section('title')--}}

{{--    اضافه تواريخ للغرفه--}}
{{--@stop--}}

{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}

{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.calendars_departments')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /--}}
{{--                    {{__('hotels.calendars_new_create')}}--}}
{{--                </span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    @if (session()->has('create'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('create') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <!-- row -->--}}
{{--    <div class="row">--}}

{{--        <div class="col-lg-12 col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}

{{--                    <form class="form" action="{{route('calendars.store')}}" method="POST" autocomplete="off">--}}

{{--                        @csrf--}}

{{--                        <div class="row">--}}


{{--                            <input type="hidden" class="form-control" id="inputName" name="room_id" value="{{$room->id}}">--}}
{{--                            <span class="text-danger"> @error('room_id') {{$message}} @enderror</span>--}}



{{--                            <div class="col-lg-6 col-md-6 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('calendars.room_number_add')}}</label>--}}
{{--                                <input type="number" class="form-control" id="inputName" name="room_number">--}}
{{--                                <span class="text-danger"> @error('room_number') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('calendars.room_price_add')}}</label>--}}
{{--                                <input type="number" class="form-control" id="inputName" name="room_price">--}}
{{--                                <span class="text-danger"> @error('room_price') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="col-lg-2 col-md-2 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('hotels.currency')}}</label>--}}
{{--                                <input type="text" class="form-control" value="{{ lang() == 'ar' ? hotel()->currency_ar : hotel()->currency_en}}" readonly>--}}

{{--                            </div>--}}




{{--                            <div  class="col-lg-6 col-md-6 col-sm-12 mt-3">--}}
{{--                                <label>{{__('calendars.check_in_add')}}</label>--}}
{{--                                <input type="text" class="form-control fc-datepicker" name="check_in" placeholder="{{\Carbon\Carbon::now()->translatedFormat('l j F Y')}}">--}}

{{--                                <span class="text-danger"> @error('check_in') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div  class="col-lg-6 col-md-6 col-sm-12 mt-3">--}}
{{--                                <label>{{__('calendars.check_out_add')}}</label>--}}
{{--                                <input type="text" class="form-control fc-datepicker" name="check_out"  placeholder="{{\Carbon\Carbon::now()->addDays(1)->translatedFormat('l j F Y')}}">--}}

{{--                                <span class="text-danger"> @error('check_out') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <br>--}}


{{--                        </div>--}}


{{--                        <div class="d-flex justify-content-center mt-3">--}}
{{--                            <button type="submit" class="btn btn-primary">{{__('calendars.save')}}</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Select2 js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>--}}
{{--    <!--Internal Fileuploads js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>--}}
{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>--}}
{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>--}}
{{--    <!--Internal Sumoselect js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>--}}
{{--    <!--Internal  Datepicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}
{{--    <!--Internal  jquery.maskedinput js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>--}}
{{--    <!--Internal  spectrum-colorpicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
{{--    <!-- Internal form-elements js -->--}}
{{--    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>--}}




{{--@endsection--}}
end calendar create==================================================================================================================================


{{--@extends('layout_h.master')--}}
{{--@section('title')--}}
{{--    عرض تقويمات الغرفه--}}
{{--@stop--}}
{{--@section('css')--}}
{{--    <!-- Internal Data table css -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!--Internal   Notify -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />--}}

{{--@endsection--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}
{{--                <h4 class="content-title mb-0 my-auto">{{__('rooms_calendars.calendars')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /--}}
{{--               {{__('hotels.calendars_edit')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}


{{--    @if (session()->has('delete'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('delete') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    <!-- row -->--}}
{{--    <form action="{{route('rooms.calendars.show',$id)}}" method="GET" autocomplete="off">--}}

{{--        <div class="row">--}}

{{--            <div class="col-lg-4 col-md-4 clo-sm-12 col-12 mb-2">--}}
{{--                <input type="text" name="check_in" value="{{request('check_in')}}" class="form-control fc-datepicker"  placeholder="{{ \Carbon\Carbon::now()->translatedFormat('l j F Y') }}">--}}

{{--            </div>--}}

{{--            <div class="col-lg-4 col-md-4 clo-sm-12 col-12 mb-2" >--}}
{{--                <input type="text" class="form-control fc-datepicker" name="check_out" value="{{request('check_out')}}" placeholder="{{\Carbon\Carbon::now()->addDays(1)->translatedFormat('l j F Y')}}">--}}

{{--            </div>--}}


{{--            <div class="col-lg-4 col-md-4 clo-sm-12 col-12">--}}

{{--                <button type="submit" class="btn btn-info text-white mb-3">{{__('book.search')}}</button>--}}
{{--            </div>--}}

{{--            <!--div-->--}}
{{--            <div class="col-xl-12">--}}
{{--                <div class="card mg-b-20">--}}
{{--                    <div class="card-header pb-0">--}}

{{--                        <a href="{{route('rooms.calendars.show',$id)}}" class="modal-effect btn btn-sm btn-primary" style="color:white"><i--}}
{{--                                    class="fas fa-plus"></i>&nbsp;{{__('event.refresh')}}</a>--}}

{{--                    </div>--}}

{{--                    <div class="card-body">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>{{__('rooms_calendars.room_type')}}</th>--}}
{{--                                    <th>{{__('rooms_calendars.room_number')}}</th>--}}
{{--                                    <th>{{__('rooms_calendars.room_price')}}</th>--}}
{{--                                    <th>{{__('rooms_calendars.check_in')}}</th>--}}
{{--                                    <th>{{__('rooms_calendars.check_out')}}</th>--}}
{{--                                    <th>{{__('rooms_calendars.control')}}</th>--}}

{{--                                </tr>--}}
{{--                                </thead>--}}


{{--                                @foreach($calendars as $calendar)--}}

{{--                                    <tbody>--}}
{{--                                    <tr>--}}


{{--                                        <td>{{$calendar->room->room_type->room_type}}</td>--}}
{{--                                        <td>{{$calendar->room_number}}</td>--}}
{{--                                        <td>{{ lang() == 'ar' ? number_format($calendar->room_price,2) . '-'. $calendar->room->hotel->currency_ar : number_format($calendar->room_price,2) . '-'. $calendar->room->hotel->currency_en }}</td>--}}
{{--                                        <td>{{$calendar->check_in}}</td>--}}
{{--                                        <td>{{$calendar->check_out}}</td>--}}

{{--                                        <td>--}}
{{--                                            <div class="dropdown">--}}
{{--                                                <button aria-expanded="false" aria-haspopup="true"--}}
{{--                                                        class="btn ripple btn-primary btn-sm" data-toggle="dropdown"--}}
{{--                                                        type="button">{{__('content.operations')}}<i class="fas fa-caret-down ml-1"></i></button>--}}
{{--                                                <div class="dropdown-menu tx-13">--}}

{{--                                                    <a class="dropdown-item"--}}
{{--                                                       href="{{route('calendars.edit',$calendar->id)}}">{{__('room_add.update')}}</a>--}}


{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </td>--}}



{{--                                    </tr>--}}

{{--                                    </tbody>--}}
{{--                                @endforeach--}}



{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--/div-->--}}
{{--        </div>--}}
{{--    </form>--}}


{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Data tables -->--}}

{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>--}}
{{--    <!--Internal  Datatable js -->--}}
{{--    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>--}}
{{--    <!--Internal  Notify js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>--}}

{{--@endsection--}}
end calendars show==========================================================================================================================================


{{--@extends('layout_h.master')--}}
{{--@section('css')--}}
{{--    <!--- Internal Select2 css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!---Internal Fileupload css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />--}}
{{--    <!--Internal Sumoselect css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">--}}
{{--    <!--Internal  TelephoneInput css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">--}}
{{--@endsection--}}
{{--@section('title')--}}

{{--    تعديل تاريخ الغرفه--}}
{{--@stop--}}

{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}

{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.calendars_departments')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /--}}
{{--                    {{__('hotels.calendars_new_create')}}--}}
{{--                </span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    @if (session()->has('update'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('update') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <!-- row -->--}}
{{--    <div class="row">--}}

{{--        <div class="col-lg-12 col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}

{{--                    <form class="form" action="{{route('calendars.update',$event->id)}}" method="POST" autocomplete="off">--}}

{{--                        @csrf--}}
{{--                        @method('PUT')--}}

{{--                        <div class="row">--}}



{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('calendars.room_number_add')}}</label>--}}
{{--                                <input type="number" class="form-control" id="inputName" name="room_number" value="{{$event->room_number}}">--}}
{{--                                <span class="text-danger"> @error('room_number') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('calendars.room_price_add')}}</label>--}}
{{--                                <input type="number" class="form-control" id="inputName" name="room_price" value="{{$event->room_price}}">--}}
{{--                                <span class="text-danger"> @error('room_price') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="col-lg-2 col-md-2 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('hotels.currency')}}</label>--}}
{{--                                <input type="text" class="form-control" value="{{ lang() == 'ar' ? hotel()->currency_ar : hotel()->currency_en}}" readonly>--}}

{{--                            </div>--}}




{{--                            <br>--}}


{{--                        </div>--}}


{{--                        <div class="d-flex justify-content-center mt-3">--}}
{{--                            <button type="submit" class="btn btn-primary">{{__('calendars.save')}}</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Select2 js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>--}}
{{--    <!--Internal Fileuploads js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>--}}
{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>--}}
{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>--}}
{{--    <!--Internal Sumoselect js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>--}}
{{--    <!--Internal  Datepicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}
{{--    <!--Internal  jquery.maskedinput js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>--}}
{{--    <!--Internal  spectrum-colorpicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
{{--    <!-- Internal form-elements js -->--}}
{{--    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>--}}



{{--@endsection--}}
end calendar update =====================================================================================================================================


{{--@extends('layout_h.master')--}}
{{--@section('css')--}}
{{--    <!--- Internal Select2 css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!---Internal Fileupload css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />--}}
{{--    <!--Internal Sumoselect css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">--}}
{{--    <!--Internal  TelephoneInput css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">--}}
{{--@endsection--}}
{{--@section('title')--}}

{{--    اضافه خدمات للفندق--}}
{{--@stop--}}

{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}


{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.services_departments')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/--}}
{{--                  {{__('hotels.service_create')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    @if (session()->has('create'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('create') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    @if (session()->has('update_service'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('update_service') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    @if($service->count() == 0)--}}

{{--        <!-- row -->--}}
{{--        <div class="row">--}}

{{--            <div class="col-lg-12 col-md-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body">--}}
{{--                        <form class="form" action="{{route('services.store')}}" method="POST" autocomplete="off">--}}

{{--                            @csrf--}}

{{--                            <div class="row">--}}



{{--                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                    <label for="inputName" class="control-label">{{__('hotels.service_name')}}</label>--}}
{{--                                    <input type="text" class="form-control" id="inputName" name="name" value="{{old('name')}}">--}}
{{--                                    <span class="text-danger"> @error('name') {{$message}} @enderror</span>--}}

{{--                                </div>--}}




{{--                                <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}

{{--                                    @foreach(config('hotel.services') as $name=>$value)--}}
{{--                                        <div class="form-group">--}}

{{--                                            <div class="form-check">--}}
{{--                                                <input class="form-check-input" type="checkbox" name="services[]" value="{{$name}}" id="defaultCheck1">--}}
{{--                                                <label class="form-check-label" for="defaultCheck1">{{$value}}</label>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    @endforeach--}}

{{--                                    <span class="text-danger"> @error('services') {{$message}} @enderror</span>--}}

{{--                                </div>--}}


{{--                                <div class="d-flex justify-content-center mt-3">--}}
{{--                                    <button type="submit" class="btn btn-primary">{{__('admin_create.save')}}</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--        <!-- row closed -->--}}
{{--        </div>--}}
{{--        <!-- Container closed -->--}}
{{--        </div>--}}
{{--        <!-- main-content closed -->--}}



{{--    @else--}}

{{--        <!-- row -->--}}
{{--        <div class="row">--}}
{{--            <!--div-->--}}
{{--            <div class="col-xl-12">--}}
{{--                <div class="card mg-b-20">--}}
{{--                    <div class="card-header pb-0">--}}

{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="table-responsive">--}}
{{--                            <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>{{__('services.name_ser')}}</th>--}}
{{--                                    <th>{{__('services.services_all')}}</th>--}}
{{--                                    <th>control</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}

{{--                                @foreach($service as $ser)--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}

{{--                                        <td>{{$ser->name}}</td>--}}
{{--                                        <td>--}}

{{--                                            @foreach(json_decode($ser->services) as $serv)--}}
{{--                                                {{$serv}}---}}
{{--                                            @endforeach--}}
{{--                                        </td>--}}


{{--                                        <td>--}}
{{--                                            <div class="dropdown">--}}
{{--                                                <button aria-expanded="false" aria-haspopup="true"--}}
{{--                                                        class="btn ripple btn-primary btn-sm" data-toggle="dropdown"--}}
{{--                                                        type="button">{{__('content.operations')}}<i class="fas fa-caret-down ml-1"></i></button>--}}
{{--                                                <div class="dropdown-menu tx-13">--}}

{{--                                                    <a class="dropdown-item"--}}
{{--                                                       href="{{route('services.edit',$ser->id)}}">{{__('content.update')}}</a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                        </td>--}}

{{--                                    </tr>--}}

{{--                                    </tbody>--}}
{{--                                @endforeach--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--/div-->--}}
{{--        </div>--}}



{{--        <!-- row closed -->--}}
{{--        </div>--}}
{{--        <!-- Container closed -->--}}
{{--        </div>--}}
{{--        <!-- main-content closed -->--}}

{{--    @endif--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Select2 js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>--}}
{{--    <!--Internal Fileuploads js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>--}}
{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>--}}
{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>--}}
{{--    <!--Internal Sumoselect js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>--}}
{{--    <!--Internal  Datepicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}
{{--    <!--Internal  jquery.maskedinput js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>--}}
{{--    <!--Internal  spectrum-colorpicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
{{--    <!-- Internal form-elements js -->--}}
{{--    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>--}}



{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>--}}
{{--    <!--Internal  Datatable js -->--}}
{{--    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>--}}
{{--    <!--Internal  Notify js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>--}}

{{--@endsection--}}
end service hotel ==========================================================================================================================================

{{--@extends('layout_h.master')--}}
{{--@section('css')--}}
{{--    <!--- Internal Select2 css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!---Internal Fileupload css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />--}}
{{--    <!--Internal Sumoselect css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">--}}
{{--    <!--Internal  TelephoneInput css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">--}}
{{--@endsection--}}
{{--@section('title')--}}

{{--    تعديل خدمات الفندق--}}
{{--@stop--}}

{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}
{{--                <h4 class="content-title mb-0 my-auto">{{__('roles_content.new_role')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/--}}
{{--                   {{__('roles_content.role_add')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}




{{--    <!-- row -->--}}
{{--    <div class="row">--}}

{{--        <div class="col-lg-12 col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}

{{--                    <form class="form" action="{{route('services.update',$service->id)}}" method="POST" autocomplete="off">--}}

{{--                        @csrf--}}
{{--                        @method('PUT')--}}

{{--                        <div class="row">--}}


{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">اسم الخدمه</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="name"  value="{{$service->name}}">--}}
{{--                                <span class="text-danger"> @error('name') {{$message}} @enderror</span>--}}

{{--                            </div>--}}




{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}

{{--                                @foreach(config('hotel.services') as $name=>$value)--}}
{{--                                    <div class="form-group">--}}

{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox" name="services[]"  value="{{$name}}" id="defaultCheck1" {{ in_array($name,json_decode($service->services))? 'checked' : ''}}>--}}
{{--                                            <label class="form-check-label" for="defaultCheck1">{{$value}}</label>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                @endforeach--}}

{{--                                <span class="text-danger"> @error('services') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="d-flex justify-content-center mt-3">--}}
{{--                                <button type="submit" class="btn btn-primary">{{__('admin_create.save')}}</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}




{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Select2 js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>--}}
{{--    <!--Internal Fileuploads js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>--}}
{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>--}}
{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>--}}
{{--    <!--Internal Sumoselect js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>--}}
{{--    <!--Internal  Datepicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}
{{--    <!--Internal  jquery.maskedinput js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>--}}
{{--    <!--Internal  spectrum-colorpicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
{{--    <!-- Internal form-elements js -->--}}
{{--    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>--}}

{{--@endsection--}}
end service update ====================================================================================================================================================
{{--@section('content')--}}
{{--    <!-- row -->--}}
{{--    <div class="row row-sm">--}}
{{--        <div class="col-md-12 col-xl-12">--}}
{{--            <div class=" main-content-body-invoice" id="print">--}}
{{--                <div class="card card-invoice">--}}
{{--                    <div class="card-body">--}}

{{--                        <div class="invoice-header">--}}




{{--                            <h1 class="invoice-title">{{__('admin.invoices_pay')}}</h1>--}}
{{--                            <div class="billed-from">--}}
{{--                                <h6>{{__('admin.hotel_welcome')}}</h6>--}}
{{--                                <p>{{__('admin.invoices_details')}}<br>--}}
{{--                                    {{__('admin.phone_admin')}}    {{hotel()->phone_hotel}}<br>--}}
{{--                                    {{__('admin.admin_name')}} {{lang() == 'ar' ? hotel()->name_ar : hotel()->name_en}}</p>--}}
{{--                            </div><!-- billed-from -->--}}
{{--                        </div><!-- invoice-header -->--}}
{{--                        <div class="row mg-t-20">--}}
{{--                            <div class="col-md">--}}
{{--                                <label class="tx-gray-600">{{__('admin.hotel_detail')}}</label>--}}

{{--                            </div>--}}
{{--                            <div class="col-md">--}}
{{--                                <label class="tx-gray-600">{{__('admin.invoices_information')}}</label>--}}
{{--                                <p class="invoice-info-row"><span>{{__('admin.invoices_number')}}</span>--}}
{{--                                    <span>{{rand(1,20000000)}}</span></p>--}}

{{--                                <p class="invoice-info-row"><span> {{__('admin.invoices_year')}} </span>--}}
{{--                                    <span>{{\Carbon\Carbon::now()->format('Y')}}</span></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="table-responsive mg-t-40">--}}
{{--                            <table class="table table-invoice border text-md-nowrap mb-0">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}

{{--                                    <th>{{__('site.id')}}</th>--}}
{{--                                    <th>{{__('site.city')}}</th>--}}
{{--                                    <th>{{__('site.child')}}</th>--}}
{{--                                    <th>{{__('site.adults')}}</th>--}}
{{--                                    <th>{{__('site.room_type')}}</th>--}}
{{--                                    <th>{{__('site.room_number')}}</th>--}}
{{--                                    <th>{{__('site.num_of_nights')}}</th>--}}
{{--                                    <th>{{__('site.date_arrive')}}</th>--}}
{{--                                    <th>{{__('site.date_leave')}}</th>--}}
{{--                                    <th>{{__('site.total_money')}}</th>--}}
{{--                                    <th>{{__('site.name')}}</th>--}}
{{--                                    <th>{{__('site.reserve')}}</th>--}}


{{--                                </tr>--}}
{{--                                </thead>--}}

{{--                                @foreach($invoices as $invoice)--}}
{{--                                    <tbody>--}}

{{--                                    <tr>--}}

{{--                                        <td>{{$invoice->id}}</td>--}}
{{--                                        <td>{{$invoice->destination}}</td>--}}
{{--                                        <td>{{$invoice->children}}</td>--}}
{{--                                        <td>{{$invoice->adults}}</td>--}}
{{--                                        <td>{{$invoice->room->room_type->room_type}}</td>--}}
{{--                                        <td>{{$invoice->room_number}}</td>--}}
{{--                                        <td>{{$invoice->num_of_nights}}</td>--}}
{{--                                        <td>{{$invoice->check_in}}</td>--}}
{{--                                        <td>{{$invoice->check_out}}</td>--}}
{{--                                        <td>{{ lang() == 'ar' ? number_format($invoice->total,2) . $invoice->hotel->currency_ar : number_format($invoice->total,2) . $invoice->hotel->currency_en}}</td>--}}
{{--                                        <td>{{$invoice->user->name}}</td>--}}
{{--                                        <td>{{$invoice->cancel()}}</td>--}}


{{--                                    </tr>--}}

{{--                                    </tbody>--}}
{{--                                @endforeach--}}


{{--                                <tr>--}}


{{--                                    <td>{{__('hotels.commission')}}</td>--}}
{{--                                    <td class="tx-left" colspan="13">@foreach($commissions as $commission) {{ lang() == 'ar' ? number_format($commission->commission,2)  . hotel()->currency_ar : number_format($commission->commission,2)  . hotel()->currency_en}}   @endforeach</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}

{{--                                    <td>{{__('hotels.total')}}</td>--}}
{{--                                    <td class="tx-left" colspan="13"> @foreach($commissions as $commission)  {{ lang() == 'ar' ? number_format($commission->total,2) . hotel()->currency_ar : number_format($commission->total,2) . hotel()->currency_en}}   @endforeach</td>--}}
{{--                                </tr>--}}


{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <hr class="mg-b-40">--}}



{{--                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i--}}
{{--                                    class="mdi mdi-printer ml-1"></i>{{__('admin.print_invoice')}}</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div><!-- COL-END -->--}}
{{--    </div>--}}
{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!--Internal  Chart.bundle js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>--}}


{{--    <script type="text/javascript">--}}
{{--        function printDiv() {--}}
{{--            var printContents = document.getElementById('print').innerHTML;--}}
{{--            var originalContents = document.body.innerHTML;--}}
{{--            document.body.innerHTML = printContents;--}}
{{--            window.print();--}}
{{--            document.body.innerHTML = originalContents;--}}
{{--            location.reload();--}}
{{--        }--}}

{{--    </script>--}}

{{--@endsection--}}
end invoices ==================================================================================================================================================================


{{--@extends('layout_h.master')--}}
{{--@section('css')--}}
{{--    <!--- Internal Select2 css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!---Internal Fileupload css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />--}}
{{--    <!--Internal Sumoselect css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">--}}
{{--    <!--Internal  TelephoneInput css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">--}}
{{--@endsection--}}
{{--@section('title')--}}

{{--    اضافه خدمه للغرفه--}}
{{--@stop--}}

{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}



{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.room_service_add')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/--}}
{{--                   {{__('hotels.room_service_department')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    @if (session()->has('create'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('create') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    <!-- row -->--}}
{{--    <div class="row">--}}

{{--        <div class="col-lg-12 col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}

{{--                    <a href="{{route('room-services.index')}}" class="modal-effect btn btn-sm btn-primary" style="color:white"><i--}}
{{--                                class="fas fa-plus"></i>&nbsp;{{__('hotels.room_service_show')}}</a>--}}


{{--                    <form class="form" action="{{route('room-services.store')}}" method="POST" autocomplete="off">--}}

{{--                        @csrf--}}

{{--                        <div class="row">--}}


{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('hotels.room_service_name_add')}}</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="name">--}}
{{--                                <input type="hidden" name="hotel_id" value="{{hotel()->id}}">--}}
{{--                                <span class="text-danger"> @error('name') {{$message}} @enderror</span>--}}

{{--                            </div>--}}




{{--                            <div class="d-flex justify-content-center mt-3">--}}
{{--                                <button type="submit" class="btn btn-primary">{{__('admin_create.save')}}</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Select2 js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>--}}
{{--    <!--Internal Fileuploads js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>--}}
{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>--}}
{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>--}}
{{--    <!--Internal Sumoselect js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>--}}
{{--    <!--Internal  Datepicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}
{{--    <!--Internal  jquery.maskedinput js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>--}}
{{--    <!--Internal  spectrum-colorpicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
{{--    <!-- Internal form-elements js -->--}}
{{--    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>--}}



{{--@endsection--}}

end room service create=========================================================================================================================================================================

{{--@extends('layout_h.master')--}}
{{--@section('css')--}}
{{--    <!--- Internal Select2 css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!---Internal Fileupload css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />--}}
{{--    <!--Internal Sumoselect css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">--}}
{{--    <!--Internal  TelephoneInput css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">--}}
{{--@endsection--}}
{{--@section('title')--}}

{{--    اضافه خدمه للغرفه--}}
{{--@stop--}}

{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}



{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.room_service_add')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/--}}
{{--                   {{__('hotels.room_service_department')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}




{{--    <!-- row -->--}}
{{--    <div class="row">--}}

{{--        <div class="col-lg-12 col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}

{{--                    <form class="form" action="{{route('room-services.update',$room_service->id)}}" method="POST" autocomplete="off">--}}

{{--                        @csrf--}}
{{--                        @method('PUT')--}}

{{--                        <div class="row">--}}


{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('hotels.room_service_name_add')}}</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="name" value="{{$room_service->name}}">--}}
{{--                                <input type="hidden" name="hotel_id" value="{{hotel()->id}}">--}}
{{--                                <span class="text-danger"> @error('name') {{$message}} @enderror</span>--}}

{{--                            </div>--}}




{{--                            <div class="d-flex justify-content-center mt-3">--}}
{{--                                <button type="submit" class="btn btn-primary">{{__('admin_create.save')}}</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Select2 js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>--}}
{{--    <!--Internal Fileuploads js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>--}}
{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>--}}
{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>--}}
{{--    <!--Internal Sumoselect js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>--}}
{{--    <!--Internal  Datepicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}
{{--    <!--Internal  jquery.maskedinput js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>--}}
{{--    <!--Internal  spectrum-colorpicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
{{--    <!-- Internal form-elements js -->--}}
{{--    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>--}}



{{--@endsection--}}


end room service edit ================================================================================================================================================================================

{{--@extends('layout_h.master')--}}
{{--@section('title')--}}
{{--    انواع الغرف--}}
{{--@stop--}}
{{--@section('css')--}}
{{--    <!-- Internal Data table css -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!--Internal   Notify -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />--}}
{{--@endsection--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}

{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.room_service_show')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /--}}
{{--                   {{__('hotels.room_service_department')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    @if (session()->has('update'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('update') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    @if (session()->has('delete'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('delete') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <!-- row -->--}}
{{--    <div class="row">--}}
{{--        <!--div-->--}}
{{--        <div class="col-xl-12">--}}
{{--            <div class="card mg-b-20">--}}
{{--                <div class="card-header pb-0">--}}

{{--                    <a href="{{route('room-services.create')}}" class="modal-effect btn btn-sm btn-primary" style="color:white"><i--}}
{{--                                class="fas fa-plus"></i>&nbsp;{{__('hotels.room_service_add')}}</a>--}}

{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>{{__('hotels.room_service_id')}}</th>--}}
{{--                                <th>{{__('hotels.room_service_name_show')}}</th>--}}
{{--                                <th>{{__('hotels.room_service_hotel')}}</th>--}}
{{--                                <th>{{__('hotels.room_service_control')}}</th>--}}

{{--                            </tr>--}}
{{--                            </thead>--}}


{{--                            @foreach($Services as $service)--}}

{{--                                <tbody>--}}
{{--                                <tr>--}}

{{--                                    <td>{{$service->id}}</td>--}}
{{--                                    <td>{{$service->name}}</td>--}}
{{--                                    <td>{{ lang() == 'ar' ? $service->hotel->name_ar : $service->hotel->name_en}}</td>--}}

{{--                                    <td>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <button aria-expanded="false" aria-haspopup="true"--}}
{{--                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"--}}
{{--                                                    type="button">{{__('content.operations')}}<i class="fas fa-caret-down ml-1"></i></button>--}}
{{--                                            <div class="dropdown-menu tx-13">--}}

{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{route('room-services.edit',$service->id)}}">{{__('hotels.room_service_update_show')}}</a>--}}

{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{route('room-services.delete',$service->id)}}">{{__('hotels.room_service_delete_show')}}</a>--}}



{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </td>--}}



{{--                                </tr>--}}

{{--                                </tbody>--}}
{{--                            @endforeach--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--/div-->--}}
{{--    </div>--}}



{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Data tables -->--}}

{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>--}}
{{--    <!--Internal  Datatable js -->--}}
{{--    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>--}}
{{--    <!--Internal  Notify js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>--}}



{{--@endsection--}}

end update room service ===============================================================================================================================================================================

{{--@extends('layout_h.master')--}}
{{--@section('css')--}}
{{--    <!--- Internal Select2 css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!---Internal Fileupload css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />--}}
{{--    <!--Internal Sumoselect css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">--}}
{{--    <!--Internal  TelephoneInput css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">--}}
{{--@endsection--}}
{{--@section('title')--}}

{{--    اضافه خدمات الغرف--}}
{{--@stop--}}

{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}
{{--                <h4 class="content-title mb-0 my-auto">{{__('hotels.hotel_room_service_insert')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/--}}
{{--                   {{__('hotels.hotel_room_service_department')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    @if (session()->has('create'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('create') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    <!-- row -->--}}
{{--    <div class="row">--}}

{{--        <div class="col-lg-12 col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <form action="{{route('hotel-room-services.store')}}" method="post" autocomplete="off">--}}

{{--                        @csrf--}}

{{--                        <div class="row">--}}




{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('hotels.hotel_room_service_room')}}</label>--}}
{{--                                <select name="room_id" class="form-control SlectBox" onclick="console.log($(this).val())"--}}
{{--                                        onchange="console.log('change is firing')">--}}

{{--                                    <option selected disabled>الغرف</option>--}}
{{--                                    @foreach($rooms as $room)--}}
{{--                                        <option value="{{$room->id}}">{{$room->room_type->room_type}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                <span class="text-danger"> @error('room_id') {{$message}} @enderror</span>--}}

{{--                            </div>--}}




{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}

{{--                                @foreach($room_services as $room_service)--}}
{{--                                    <div class="form-group">--}}

{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox" name="room_service_id[]" value="{{$room_service->id}}" id="defaultCheck1">--}}
{{--                                            <label class="form-check-label" for="defaultCheck1">{{$room_service->name}}</label>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                @endforeach--}}

{{--                                <span class="text-danger"> @error('room_service_id') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="d-flex justify-content-center mt-3">--}}
{{--                                <button type="submit" class="btn btn-primary">{{__('admin_create.save')}}</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Select2 js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>--}}
{{--    <!--Internal Fileuploads js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>--}}
{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>--}}
{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>--}}
{{--    <!--Internal Sumoselect js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>--}}
{{--    <!--Internal  Datepicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}
{{--    <!--Internal  jquery.maskedinput js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>--}}
{{--    <!--Internal  spectrum-colorpicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
{{--    <!-- Internal form-elements js -->--}}
{{--    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>--}}



{{--@endsection--}}
end hotel-room-service-create =====================================================================================================================================================================


start admin dashboard ==============================================================================================================================================================

start booking
{{--@extends('layout.master')--}}
{{--@section('title')--}}
{{--    حجوزات الفنادق--}}
{{--@stop--}}
{{--@section('css')--}}
{{--    <!-- Internal Data table css -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!--Internal   Notify -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />--}}
{{--@endsection--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}




{{--                <h4 class="content-title mb-0 my-auto">{{__('admin.hotel_reservations_list')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/--}}
{{--                   {{__('admin.reservations_departments')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}


{{--    @if (session()->has('login'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('login') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <!-- row -->--}}
{{--    <div class="row">--}}
{{--        <!--div-->--}}
{{--        <div class="col-xl-12">--}}
{{--            <div class="card mg-b-20">--}}
{{--                <div class="card-header pb-0">--}}

{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>{{__('site.id')}}</th>--}}
{{--                                <th>{{__('site.city')}}</th>--}}
{{--                                <th>{{__('site.child')}}</th>--}}
{{--                                <th>{{__('site.adults')}}</th>--}}
{{--                                <th>{{__('site.room_type')}}</th>--}}
{{--                                <th>{{__('site.room_number')}}</th>--}}
{{--                                <th>{{__('site.num_of_nights')}}</th>--}}
{{--                                <th>{{__('site.date_arrive')}}</th>--}}
{{--                                <th>{{__('site.date_leave')}}</th>--}}
{{--                                <th>{{__('site.hotel')}}</th>--}}
{{--                                <th>{{__('site.total_money')}}</th>--}}
{{--                                <th>{{__('site.name')}}</th>--}}
{{--                                <th>{{__('site.reserve')}}</th>--}}


{{--                            </tr>--}}
{{--                            </thead>--}}


{{--                            @foreach($invoices as $invoice)--}}
{{--                                <tbody>--}}

{{--                                <tr>--}}

{{--                                    <td>{{$invoice->id}}</td>--}}
{{--                                    <td>{{$invoice->destination}}</td>--}}
{{--                                    <td>{{$invoice->children}}</td>--}}
{{--                                    <td>{{$invoice->adults}}</td>--}}
{{--                                    <td>{{$invoice->room->room_type->room_type}}</td>--}}
{{--                                    <td>{{$invoice->room_number}}</td>--}}
{{--                                    <td>{{$invoice->num_of_nights}}</td>--}}
{{--                                    <td>{{$invoice->check_in}}</td>--}}
{{--                                    <td>{{$invoice->check_out}}</td>--}}
{{--                                    <td>{{ lang() == 'ar' ? $invoice->hotel->name_ar : $invoice->hotel->name_en}}</td>--}}
{{--                                    <td>{{ lang() == 'ar' ? number_format($invoice->total,2) . $invoice->hotel->currency_ar : number_format($invoice->total,2) . $invoice->hotel->currency_en}}</td>--}}
{{--                                    <td>{{$invoice->user->name}}</td>--}}
{{--                                    <td>{{$invoice->cancel()}}</td>--}}


{{--                                </tr>--}}


{{--                                </tbody>--}}
{{--                            @endforeach--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--/div-->--}}
{{--    </div>--}}



{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Data tables -->--}}

{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>--}}
{{--    <!--Internal  Datatable js -->--}}
{{--    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>--}}
{{--    <!--Internal  Notify js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>--}}



{{--    <script src="{{asset('js/NewNotificationHotel.js')}}"></script>--}}



{{--@endsection--}}
end booking of admin =============================================================================================================

{{--@extends('layout.master')--}}
{{--@section('title')--}}
{{--    قائمه الفنادق--}}
{{--@stop--}}
{{--@section('css')--}}
{{--    <!-- Internal Data table css -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!--Internal   Notify -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />--}}
{{--@endsection--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}



{{--                <h4 class="content-title mb-0 my-auto">{{__('admin.hotels_list')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/--}}

{{--                {{__('admin.list_of_all_hotels_on_the_site')}}--}}
{{--                </span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}


{{--    @if (session()->has('active'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('active') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}




{{--    <!-- row -->--}}
{{--    <div class="row">--}}
{{--        <!--div-->--}}
{{--        <div class="col-xl-12">--}}
{{--            <div class="card mg-b-20">--}}
{{--                <div class="card-header pb-0">--}}

{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>{{__('data.name')}}</th>--}}
{{--                                <th>{{__('data.location')}}</th>--}}
{{--                                <th>{{__('data.pound')}}</th>--}}
{{--                                <th>{{__('data.active')}}</th>--}}
{{--                                <th>{{__('data.action')}}</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}

{{--                            @foreach($hotels as $hotel)--}}

{{--                                <tbody>--}}
{{--                                <tr>--}}

{{--                                    <td>{{lang() == 'ar' ? $hotel->name_ar : $hotel->name_en}}</td>--}}
{{--                                    <td>{{lang() == 'ar' ? $hotel->location_ar : $hotel->location_en}}</td>--}}
{{--                                    <td>{{ lang() == 'ar' ? $hotel->currency_ar : $hotel->currency_en }}</td>--}}
{{--                                    <td>{{$hotel->active()}}</td>--}}

{{--                                    <td>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <button aria-expanded="false" aria-haspopup="true"--}}
{{--                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"--}}
{{--                                                    type="button">{{__('content.operations')}}<i class="fas fa-caret-down ml-1"></i></button>--}}
{{--                                            <div class="dropdown-menu tx-13">--}}

{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{route('admins.hotels/active',$hotel->id)}}">{{__('content.active')}}</a>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </td>--}}


{{--                                </tr>--}}

{{--                                </tbody>--}}
{{--                            @endforeach--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--/div-->--}}
{{--    </div>--}}



{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Data tables -->--}}

{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>--}}
{{--    <!--Internal  Datatable js -->--}}
{{--    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>--}}
{{--    <!--Internal  Notify js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>--}}



{{--    <script>--}}

{{--        $( document ).ready(function() {--}}

{{--            setTimeout(function() {--}}
{{--                $('#alert').fadeOut('slow');--}}
{{--            }, 1000);--}}

{{--        });--}}



{{--    </script>--}}


{{--@endsection--}}
end hotels show in admin ====================================================================================================================
{{--@extends('layout.master')--}}
{{--@section('title')--}}
{{--    قائمه مستخدمين الموقع--}}
{{--@stop--}}
{{--@section('css')--}}
{{--    <!-- Internal Data table css -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!--Internal   Notify -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />--}}
{{--@endsection--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}
{{--                <h4 class="content-title mb-0 my-auto">{{__('admin_create.users')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /--}}
{{--                    {{__('admin_create.users_show')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}


{{--    @if (session()->has('update'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('update') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    @if (session()->has('success'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('success') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <!-- row -->--}}
{{--    <div class="row">--}}
{{--        <!--div-->--}}
{{--        <div class="col-xl-12">--}}
{{--            <div class="card mg-b-20">--}}
{{--                <div class="card-header pb-0">--}}


{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>id</th>--}}
{{--                                <th>{{__('users.name')}}</th>--}}
{{--                                <th>{{__('users.email')}}</th>--}}
{{--                                <th>{{__('users.active')}}</th>--}}
{{--                                <th>{{__('users.created_at')}}</th>--}}
{{--                                <th>{{__('users.action')}}</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}

{{--                            @foreach($users as $user)--}}

{{--                                <tbody>--}}
{{--                                <tr>--}}

{{--                                    <td>{{$user->id}}</td>--}}
{{--                                    <td>{{$user->name}}</td>--}}
{{--                                    <td>{{$user->email}}</td>--}}
{{--                                    <td>{{$user->active()}}</td>--}}
{{--                                    <td>{{$user->created_at->diffForHumans()}}</td>--}}

{{--                                    <td>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <button aria-expanded="false" aria-haspopup="true"--}}
{{--                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"--}}
{{--                                                    type="button">{{__('content.operations')}}<i class="fas fa-caret-down ml-1"></i></button>--}}
{{--                                            <div class="dropdown-menu tx-13">--}}

{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{route('users.update',$user->id)}}">--}}
{{--                                                    {{__('content.active')}}</a>--}}


{{--                                                <a class="dropdown-item" href="{{route('users.delete',$user->id)}}">&nbsp;&nbsp;حذف--}}
{{--                                                    المستخدم</a>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </td>--}}


{{--                                </tr>--}}

{{--                                </tbody>--}}
{{--                            @endforeach--}}

{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!--/div-->--}}




{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}

{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Data tables -->--}}

{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>--}}
{{--    <!--Internal  Datatable js -->--}}
{{--    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>--}}
{{--    <!--Internal  Notify js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>--}}



{{--    <script>--}}

{{--        $( document ).ready(function() {--}}

{{--            setTimeout(function() {--}}
{{--                $('#alert').fadeOut('slow');--}}
{{--            }, 1000);--}}

{{--        });--}}

{{--    </script>--}}


{{--@endsection--}}

end users in admin =============================================================================================================================================================

{{--@extends('layout.master')--}}
{{--@section('title')--}}
{{--    عرض موظفين لوحه التحكم--}}
{{--@stop--}}
{{--@section('css')--}}
{{--    <!-- Internal Data table css -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!--Internal   Notify -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />--}}
{{--@endsection--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}
{{--                <h4 class="content-title mb-0 my-auto">{{__('admin_create.employees')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /--}}
{{--                   {{__('admin_create.employees')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}



{{--    <!-- row -->--}}
{{--    <div class="row">--}}
{{--        <!--div-->--}}
{{--        <div class="col-xl-12">--}}
{{--            <div class="card mg-b-20">--}}
{{--                <div class="card-header pb-0">--}}


{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>{{ __('employees.name') }}</th>--}}
{{--                                <th>{{ __('employees.email') }}</th>--}}
{{--                                <th>{{ __('employees.image') }}</th>--}}
{{--                                <th>{{ __('employees.phone') }}</th>--}}
{{--                                <th>{{ __('employees.role') }}</th>--}}


{{--                            </tr>--}}
{{--                            </thead>--}}

{{--                            @foreach($admins as $admin)--}}

{{--                                <tbody>--}}
{{--                                <tr>--}}

{{--                                    <td>{{$admin->name}}</td>--}}
{{--                                    <td>{{$admin->email}}</td>--}}
{{--                                    <td>--}}
{{--                                        <img style="width: 80px;height: 80px;border-radius: 4px" src="{{URL::to('/admins/'.$admin->image)}}">--}}
{{--                                    </td>--}}
{{--                                    <td>{{$admin->phone}}</td>--}}
{{--                                    <td>{{$admin->role->name}}</td>--}}


{{--                                </tr>--}}

{{--                                </tbody>--}}
{{--                            @endforeach--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--/div-->--}}
{{--    </div>--}}



{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Data tables -->--}}

{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>--}}
{{--    <!--Internal  Datatable js -->--}}
{{--    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>--}}
{{--    <!--Internal  Notify js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>--}}



{{--@endsection--}}

end show admins ========================================================================

{{--@extends('layout.master')--}}
{{--@section('css')--}}
{{--    <!--- Internal Select2 css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!---Internal Fileupload css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />--}}
{{--    <!--Internal Sumoselect css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">--}}
{{--    <!--Internal  TelephoneInput css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">--}}
{{--@endsection--}}
{{--@section('title')--}}
{{--    اضافه موظف جديد للوحه--}}
{{--@stop--}}

{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}
{{--                <h4 class="content-title mb-0 my-auto">{{__('admin_create.home')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/--}}
{{--                   {{__('admin_create.edit_admin')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    @if (session()->has('admin'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('admin') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}

{{--    <!-- row -->--}}
{{--    <div class="row">--}}

{{--        <div class="col-lg-12 col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <form action="{{route('admins.store')}}" method="post" enctype="multipart/form-data"--}}
{{--                          autocomplete="off">--}}

{{--                        @csrf--}}

{{--                        <div class="row">--}}


{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('admin_create.employee_name')}}</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="name" value="{{old('name')}}">--}}
{{--                                <span class="text-danger"> @error('name') {{$message}} @enderror</span>--}}

{{--                            </div>--}}

{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('admin_create.email')}}</label>--}}
{{--                                <input type="email" class="form-control" id="inputName" name="email" value="{{old('email')}}">--}}
{{--                                <span class="text-danger"> @error('email') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('admin_create.password')}}</label>--}}
{{--                                <input type="password" class="form-control" id="inputName" name="password" value="{{old('password')}}">--}}
{{--                                <span class="text-danger"> @error('password') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="col-lg-4 col-md-4 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('admin_create.phone')}}</label>--}}
{{--                                <input type="number" class="form-control" id="inputName" name="phone" value="{{old('phone')}}">--}}
{{--                                <span class="text-danger"> @error('phone') {{$message}} @enderror</span>--}}

{{--                            </div>--}}



{{--                            <div class="col-lg-8 col-md-8 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('admin.select_role')}}</label>--}}
{{--                                <select name="role_id" class="form-control SlectBox" onclick="console.log($(this).val())"--}}
{{--                                        onchange="console.log('change is firing')">--}}

{{--                                    <option selected disabled>{{__('admin.select_role')}}</option>--}}
{{--                                    @foreach($roles as $role)--}}
{{--                                        <option value="{{$role->id}}">{{$role->name}}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                                <span class="text-danger"> @error('role_id') {{$message}} @enderror</span>--}}

{{--                            </div>--}}






{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <h5 class="card-title">{{__('admin_create.image')}}</h5>--}}

{{--                                <input type="file" name="image" class="dropify" accept=".jpg, .png, image/jpeg, image/png"--}}
{{--                                       data-height="70" />--}}
{{--                                <span class="text-danger"> @error('image') {{$message}} @enderror</span>--}}

{{--                            </div>--}}
{{--                            <br>--}}


{{--                        </div>--}}


{{--                        <div class="d-flex justify-content-center mt-3">--}}
{{--                            <button type="submit" class="btn btn-primary">{{__('admin_create.save')}}</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Select2 js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>--}}
{{--    <!--Internal Fileuploads js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>--}}
{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>--}}
{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>--}}
{{--    <!--Internal Sumoselect js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>--}}
{{--    <!--Internal  Datepicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}
{{--    <!--Internal  jquery.maskedinput js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>--}}
{{--    <!--Internal  spectrum-colorpicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
{{--    <!-- Internal form-elements js -->--}}
{{--    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>--}}



{{--@endsection--}}
end admin create =============================================================================================================================================================


{{--@extends('layout.master')--}}
{{--@section('css')--}}
{{--    <!--- Internal Select2 css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!---Internal Fileupload css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />--}}
{{--    <!--Internal Sumoselect css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">--}}
{{--    <!--Internal  TelephoneInput css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">--}}
{{--@endsection--}}
{{--@section('title')--}}

{{--    اضافه صلاحيه جديده--}}
{{--@stop--}}

{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}
{{--                <h4 class="content-title mb-0 my-auto">{{__('roles_content.new_role')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/--}}
{{--                   {{__('roles_content.role_add')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    @if (session()->has('role'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('role') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    <!-- row -->--}}
{{--    <div class="row">--}}

{{--        <div class="col-lg-12 col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <form action="{{route('roles.store')}}" method="post" autocomplete="off">--}}

{{--                        @csrf--}}

{{--                        <div class="row">--}}


{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('roles_content.role_name')}}</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="name" value="{{old('name')}}">--}}
{{--                                <span class="text-danger"> @error('name') {{$message}} @enderror</span>--}}

{{--                            </div>--}}




{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}

{{--                                @foreach(config('access.permissions') as $name=>$value)--}}
{{--                                    <div class="form-group">--}}

{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$name}}" id="defaultCheck1">--}}
{{--                                            <label class="form-check-label" for="defaultCheck1">{{$value}}</label>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                @endforeach--}}

{{--                                <span class="text-danger"> @error('permissions') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="d-flex justify-content-center mt-3">--}}
{{--                                <button type="submit" class="btn btn-primary">{{__('admin_create.save')}}</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Select2 js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>--}}
{{--    <!--Internal Fileuploads js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>--}}
{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>--}}
{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>--}}
{{--    <!--Internal Sumoselect js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>--}}
{{--    <!--Internal  Datepicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}
{{--    <!--Internal  jquery.maskedinput js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>--}}
{{--    <!--Internal  spectrum-colorpicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
{{--    <!-- Internal form-elements js -->--}}
{{--    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>--}}



{{--@endsection--}}
end role create ==========================================================================================================================================================================

{{--@extends('layout.master')--}}
{{--@section('title')--}}
{{--    عرض الصلاحيات--}}
{{--@stop--}}
{{--@section('css')--}}
{{--    <!-- Internal Data table css -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!--Internal   Notify -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />--}}
{{--@endsection--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}
{{--                <h4 class="content-title mb-0 my-auto">{{__('roles_content.show_all')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /--}}
{{--                    {{__('roles_content.permissions')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}


{{--    @if (session()->has('role_update'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('role_update') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}



{{--    <!-- row -->--}}
{{--    <div class="row">--}}
{{--        <!--div-->--}}
{{--        <div class="col-xl-12">--}}
{{--            <div class="card mg-b-20">--}}
{{--                <div class="card-header pb-0">--}}


{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>{{__('admin_role.role_one')}}</th>--}}
{{--                                <th>{{__('admin_role.permissions_role')}}</th>--}}
{{--                                <th>{{__('data.action')}}</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}

{{--                            @foreach($roles as $role)--}}

{{--                                <tbody>--}}
{{--                                <tr>--}}

{{--                                    <td>{{$role->name}}</td>--}}
{{--                                    <td>--}}
{{--                                        @foreach(json_decode($role->permissions) as $permissions)--}}
{{--                                            {{$permissions}},--}}
{{--                                        @endforeach--}}
{{--                                    </td>--}}


{{--                                    <td>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <button aria-expanded="false" aria-haspopup="true"--}}
{{--                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"--}}
{{--                                                    type="button">{{__('content.operations')}}<i class="fas fa-caret-down ml-1"></i></button>--}}
{{--                                            <div class="dropdown-menu tx-13">--}}

{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{route('roles.edit',$role->id)}}">{{__('content.update')}}</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </td>--}}

{{--                                </tr>--}}

{{--                                </tbody>--}}
{{--                            @endforeach--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--/div-->--}}
{{--    </div>--}}



{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Data tables -->--}}

{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>--}}
{{--    <!--Internal  Datatable js -->--}}
{{--    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>--}}
{{--    <!--Internal  Notify js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>--}}



{{--@endsection--}}
end roles show ==========================================================================================================================================================================

{{--@extends('layout.master')--}}
{{--@section('css')--}}
{{--    <!--- Internal Select2 css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!---Internal Fileupload css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />--}}
{{--    <!---Internal Fancy uploader css-->--}}
{{--    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />--}}
{{--    <!--Internal Sumoselect css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">--}}
{{--    <!--Internal  TelephoneInput css-->--}}
{{--    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">--}}
{{--@endsection--}}
{{--@section('title')--}}

{{--    تحديث الصلاحيه--}}
{{--@stop--}}

{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}
{{--                <h4 class="content-title mb-0 my-auto">{{__('roles_content.new_role')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/--}}
{{--                   {{__('roles_content.role_add')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    @if (session()->has('role'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('role') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    <!-- row -->--}}
{{--    <div class="row">--}}

{{--        <div class="col-lg-12 col-md-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <form action="{{route('roles.update',$role->id)}}" method="POST" autocomplete="off">--}}

{{--                        @csrf--}}
{{--                        @method('PUT')--}}

{{--                        <div class="row">--}}


{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}
{{--                                <label for="inputName" class="control-label">{{__('roles_content.role_name')}}</label>--}}
{{--                                <input type="text" class="form-control" id="inputName" name="name" value="{{$role->name}}">--}}
{{--                                <span class="text-danger"> @error('name') {{$message}} @enderror</span>--}}

{{--                            </div>--}}




{{--                            <div class="col-lg-12 col-md-12 col-sm-12 mt-3">--}}

{{--                                @foreach(config('access.permissions') as $name=>$value)--}}
{{--                                    <div class="form-group">--}}

{{--                                        <div class="form-check">--}}
{{--                                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$name}}" id="defaultCheck1" {{ in_array($name,json_decode($role->permissions))? 'checked' : ''}}>--}}
{{--                                            <label class="form-check-label" for="defaultCheck1">{{$value}}</label>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                @endforeach--}}

{{--                                <span class="text-danger"> @error('permissions') {{$message}} @enderror</span>--}}

{{--                            </div>--}}


{{--                            <div class="d-flex justify-content-center mt-3">--}}
{{--                                <button type="submit" class="btn btn-primary">{{__('admin_create.save')}}</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}

{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Select2 js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>--}}
{{--    <!--Internal Fileuploads js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>--}}
{{--    <!--Internal Fancy uploader js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>--}}
{{--    <!--Internal  Form-elements js-->--}}
{{--    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>--}}
{{--    <!--Internal Sumoselect js-->--}}
{{--    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>--}}
{{--    <!--Internal  Datepicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>--}}
{{--    <!--Internal  jquery.maskedinput js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>--}}
{{--    <!--Internal  spectrum-colorpicker js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>--}}
{{--    <!-- Internal form-elements js -->--}}
{{--    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>--}}



{{--@endsection--}}
end roles update

{{--@extends('layout.master')--}}
{{--@section('title')--}}
{{--    فواتير الفنادق السنويه--}}
{{--@stop--}}
{{--@section('css')--}}
{{--    <!-- Internal Data table css -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">--}}
{{--    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">--}}
{{--    <!--Internal   Notify -->--}}
{{--    <link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />--}}
{{--@endsection--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}
{{--                <h4 class="content-title mb-0 my-auto">{{__('admin_create.hotels')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /--}}
{{--                   {{__('admin_create.hotels_show')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}



{{--    @if (session()->has('active'))--}}
{{--        <div class="alert alert-success alert-dismissible fade show" role="alert">--}}
{{--            <strong>{{ session()->get('active') }}</strong>--}}

{{--            <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">&times;</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}


{{--    <!-- row -->--}}
{{--    <div class="row">--}}
{{--        <!--div-->--}}
{{--        <div class="col-xl-12">--}}
{{--            <div class="card mg-b-20">--}}
{{--                <div class="card-header pb-0">--}}


{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'style="text-align: center">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th>{{__('data.name')}}</th>--}}
{{--                                <th>{{__('data.active')}}</th>--}}
{{--                                <th>{{__('data.action')}}</th>--}}

{{--                            </tr>--}}
{{--                            </thead>--}}


{{--                            @foreach($hotels as $hotel)--}}

{{--                                <tbody>--}}
{{--                                <tr>--}}

{{--                                    <td>{{lang() == 'ar' ? $hotel->name_ar : $hotel->name_en}}</td>--}}
{{--                                    <td>{{$hotel->active()}}</td>--}}

{{--                                    <td>--}}
{{--                                        <div class="dropdown">--}}
{{--                                            <button aria-expanded="false" aria-haspopup="true"--}}
{{--                                                    class="btn ripple btn-primary btn-sm" data-toggle="dropdown"--}}
{{--                                                    type="button">{{__('content.operations')}}<i class="fas fa-caret-down ml-1"></i></button>--}}
{{--                                            <div class="dropdown-menu tx-13">--}}

{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{route('admins.commissions.hotel',$hotel->id)}}">{{__('content.yearly')}}</a>--}}

{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{route('admins.month.hotel',$hotel->id)}}">{{__('content.report')}}</a>--}}


{{--                                                <a class="dropdown-item"--}}
{{--                                                   href="{{route('admins.hotels/active',$hotel->id)}}">{{__('content.active')}}</a>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </td>--}}


{{--                                </tr>--}}

{{--                                </tbody>--}}
{{--                            @endforeach--}}

{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <!--/div-->--}}
{{--    </div>--}}



{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!-- Internal Data tables -->--}}

{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>--}}
{{--    <!--Internal  Datatable js -->--}}
{{--    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>--}}
{{--    <!--Internal  Notify js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>--}}
{{--    <script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>--}}


{{--    <script>--}}

{{--        $( document ).ready(function() {--}}

{{--            setTimeout(function() {--}}
{{--                $('#alert').fadeOut('slow');--}}
{{--            }, 1000);--}}

{{--        });--}}

{{--    </script>--}}


{{--@endsection--}}
end month invoices =========================================================================================================================

{{--@extends('layout.master')--}}
{{--@section('css')--}}
{{--    <style>--}}
{{--        @media print {--}}
{{--            #print_Button {--}}
{{--                display: none;--}}
{{--            }--}}
{{--        }--}}

{{--    </style>--}}
{{--@endsection--}}
{{--@section('title')--}}
{{--    معاينه طباعة الفاتورة--}}
{{--@stop--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}


{{--                <h4 class="content-title mb-0 my-auto">{{__('admin.invoices')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/--}}
{{--                   {{__('admin.invoices_month')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    <!-- row -->--}}
{{--    <div class="row row-sm">--}}
{{--        <div class="col-md-12 col-xl-12">--}}
{{--            <div class=" main-content-body-invoice" id="print">--}}
{{--                <div class="card card-invoice">--}}
{{--                    <div class="card-body">--}}

{{--                        <div class="invoice-header">--}}




{{--                            <h1 class="invoice-title">{{__('admin.invoices_pay')}}</h1>--}}
{{--                            <div class="billed-from">--}}
{{--                                <h6>{{__('admin.hotel_welcome')}}</h6>--}}
{{--                                <p>{{__('admin.invoices_details')}}<br>--}}
{{--                                    {{__('admin.phone_admin')}}    {{$hotel->phone_hotel}}<br>--}}
{{--                                    {{__('admin.admin_name')}} {{lang() == 'ar' ? $hotel->name_ar : $hotel->name_en}}</p>--}}
{{--                            </div><!-- billed-from -->--}}
{{--                        </div><!-- invoice-header -->--}}
{{--                        <div class="row mg-t-20">--}}
{{--                            <div class="col-md">--}}
{{--                                <label class="tx-gray-600">{{__('admin.hotel_detail')}}</label>--}}

{{--                            </div>--}}
{{--                            <div class="col-md">--}}
{{--                                <label class="tx-gray-600">{{__('admin.invoices_information')}}</label>--}}
{{--                                <p class="invoice-info-row"><span>{{__('admin.invoices_number')}}</span>--}}
{{--                                    <span>{{rand(1,20000000)}}</span></p>--}}

{{--                                <p class="invoice-info-row"><span> {{__('admin.invoices_year')}} </span>--}}
{{--                                    <span>{{\Carbon\Carbon::now()->format('Y')}}</span></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="table-responsive mg-t-40">--}}
{{--                            <table class="table table-invoice border text-md-nowrap mb-0">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}

{{--                                    <th>{{__('site.id')}}</th>--}}
{{--                                    <th>{{__('site.city')}}</th>--}}
{{--                                    <th>{{__('site.child')}}</th>--}}
{{--                                    <th>{{__('site.adults')}}</th>--}}
{{--                                    <th>{{__('site.room_type')}}</th>--}}
{{--                                    <th>{{__('site.room_number')}}</th>--}}
{{--                                    <th>{{__('site.num_of_nights')}}</th>--}}
{{--                                    <th>{{__('site.date_arrive')}}</th>--}}
{{--                                    <th>{{__('site.date_leave')}}</th>--}}
{{--                                    <th>{{__('site.total_money')}}</th>--}}
{{--                                    <th>{{__('site.name')}}</th>--}}
{{--                                    <th>{{__('site.reserve')}}</th>--}}


{{--                                </tr>--}}
{{--                                </thead>--}}

{{--                                @foreach($invoices as $invoice)--}}
{{--                                    <tbody>--}}

{{--                                    <tr>--}}

{{--                                        <td>{{$invoice->id}}</td>--}}
{{--                                        <td>{{$invoice->destination}}</td>--}}
{{--                                        <td>{{$invoice->children}}</td>--}}
{{--                                        <td>{{$invoice->adults}}</td>--}}
{{--                                        <td>{{$invoice->room->room_type->room_type}}</td>--}}
{{--                                        <td>{{$invoice->room_number}}</td>--}}
{{--                                        <td>{{$invoice->num_of_nights}}</td>--}}
{{--                                        <td>{{$invoice->check_in}}</td>--}}
{{--                                        <td>{{$invoice->check_out}}</td>--}}
{{--                                        <td>{{ lang() == 'ar' ? number_format($invoice->total,2) . $invoice->hotel->currency_ar : number_format($invoice->total,2) . $invoice->hotel->currency_en}}</td>--}}
{{--                                        <td>{{$invoice->user->name}}</td>--}}
{{--                                        <td>{{$invoice->cancel()}}</td>--}}


{{--                                    </tr>--}}

{{--                                    </tbody>--}}
{{--                                @endforeach--}}


{{--                                <tr>--}}


{{--                                    <td>{{__('hotels.commission')}}</td>--}}
{{--                                    <td class="tx-left" colspan="13">@foreach($commissions as $commission) {{ lang() == 'ar' ? number_format($commission->commission,2)  . $hotel->currency_ar : number_format($commission->commission,2)  . $hotel->currency_en}}   @endforeach</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}

{{--                                    <td>{{__('hotels.total')}}</td>--}}
{{--                                    <td class="tx-left" colspan="13"> @foreach($commissions as $commission)  {{ lang() == 'ar' ? number_format($commission->total,2) . $hotel->currency_ar : number_format($commission->total,2) . $hotel->currency_en}}   @endforeach</td>--}}
{{--                                </tr>--}}


{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <hr class="mg-b-40">--}}



{{--                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i--}}
{{--                                    class="mdi mdi-printer ml-1"></i>{{__('admin.print_invoice')}}</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div><!-- COL-END -->--}}
{{--    </div>--}}
{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!--Internal  Chart.bundle js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>--}}


{{--    <script type="text/javascript">--}}
{{--        function printDiv() {--}}
{{--            var printContents = document.getElementById('print').innerHTML;--}}
{{--            var originalContents = document.body.innerHTML;--}}
{{--            document.body.innerHTML = printContents;--}}
{{--            window.print();--}}
{{--            document.body.innerHTML = originalContents;--}}
{{--            location.reload();--}}
{{--        }--}}

{{--    </script>--}}

{{--@endsection--}}

end invoices ????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
{{--@extends('layout.master')--}}
{{--@section('css')--}}
{{--    <style>--}}
{{--        @media print {--}}
{{--            #print_Button {--}}
{{--                display: none;--}}
{{--            }--}}
{{--        }--}}

{{--    </style>--}}
{{--@endsection--}}
{{--@section('title')--}}
{{--    معاينه طباعة الفاتورة--}}
{{--@stop--}}
{{--@section('page-header')--}}
{{--    <!-- breadcrumb -->--}}
{{--    <div class="breadcrumb-header justify-content-between">--}}
{{--        <div class="my-auto">--}}
{{--            <div class="d-flex">--}}


{{--                <h4 class="content-title mb-0 my-auto">{{__('admin.invoices')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/--}}
{{--                   {{__('admin.invoices_month')}}</span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    <!-- breadcrumb -->--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    <!-- row -->--}}
{{--    <div class="row row-sm">--}}
{{--        <div class="col-md-12 col-xl-12">--}}
{{--            <div class=" main-content-body-invoice" id="print">--}}
{{--                <div class="card card-invoice">--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="invoice-header">--}}




{{--                            <h1 class="invoice-title">{{__('admin.invoices_pay')}}</h1>--}}
{{--                            <div class="billed-from">--}}
{{--                                <h6>{{__('admin.hotel_welcome')}}</h6>--}}
{{--                                <p>{{__('admin.invoices_details')}}<br>--}}
{{--                                    {{__('admin.phone_admin')}}    {{admin()->phone}}<br>--}}
{{--                                    {{__('admin.admin_name')}} {{admin()->name}}</p>--}}
{{--                            </div><!-- billed-from -->--}}
{{--                        </div><!-- invoice-header -->--}}
{{--                        <div class="row mg-t-20">--}}
{{--                            <div class="col-md">--}}
{{--                                <label class="tx-gray-600">{{__('admin.hotel_detail')}}</label>--}}

{{--                            </div>--}}
{{--                            <div class="col-md">--}}
{{--                                <label class="tx-gray-600">{{__('admin.invoices_information')}}</label>--}}
{{--                                <p class="invoice-info-row"><span>{{__('admin.invoices_number')}}</span>--}}
{{--                                    <span>{{rand(1,20000000)}}</span></p>--}}

{{--                                <p class="invoice-info-row"><span> {{__('admin.invoices_year')}} </span>--}}
{{--                                    <span>{{\Carbon\Carbon::now()->format('Y')}}</span></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="table-responsive mg-t-40">--}}
{{--                            <table class="table table-invoice border text-md-nowrap mb-0">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>{{__('admin.hotel_number')}}</th>--}}
{{--                                    <th>{{__('admin.commission')}}</th>--}}
{{--                                    <th>{{__('admin.rate')}}</th>--}}
{{--                                    <th>{{__('admin.month_pay')}}</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}


{{--                                @foreach($commissions as $commission)--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$hotel->id}}</td>--}}
{{--                                        <td>{{ number_format($commission->commission,2)  }} : {{ lang() == 'ar' ? $hotel->currency_ar : $hotel->currency_en}}</td>--}}
{{--                                        <td>{{ number_format($commission->total,2) }} : {{lang() == 'ar' ? $hotel->currency_ar : $hotel->currency_en}}</td>--}}
{{--                                        <td>{{$commission->month_year}}</td>--}}

{{--                                    </tr>--}}

{{--                                    </tbody>--}}
{{--                                @endforeach--}}

{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <hr class="mg-b-40">--}}



{{--                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i--}}
{{--                                    class="mdi mdi-printer ml-1"></i>{{__('admin.print_invoice')}}</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div><!-- COL-END -->--}}
{{--    </div>--}}
{{--    <!-- row closed -->--}}
{{--    </div>--}}
{{--    <!-- Container closed -->--}}
{{--    </div>--}}
{{--    <!-- main-content closed -->--}}
{{--@endsection--}}
{{--@section('js')--}}
{{--    <!--Internal  Chart.bundle js -->--}}
{{--    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>--}}


{{--    <script type="text/javascript">--}}
{{--        function printDiv() {--}}
{{--            var printContents = document.getElementById('print').innerHTML;--}}
{{--            var originalContents = document.body.innerHTML;--}}
{{--            document.body.innerHTML = printContents;--}}
{{--            window.print();--}}
{{--            document.body.innerHTML = originalContents;--}}
{{--            location.reload();--}}
{{--        }--}}

{{--    </script>--}}

{{--@endsection--}}
end year invoices



{{--@extends('client_app.layout')--}}
{{--@section('style')--}}
{{--    <style>--}}

{{--        *{--}}

{{--            padding: 0px;--}}
{{--            margin: 0px;--}}
{{--            box-sizing: border-box;--}}
{{--        }--}}

{{--        a{--}}

{{--            text-decoration: none;--}}
{{--        }--}}

{{--        body{--}}

{{--            font-family: 'Tajawal', sans-serif;--}}
{{--            direction: rtl;--}}


{{--        }--}}


{{--        .navbar-light .navbar-toggler{--}}

{{--            border: none;--}}
{{--            outline: none;--}}
{{--        }--}}

{{--        .navbar-toggler{--}}

{{--            font-size: 1.3rem;--}}
{{--            display: none;--}}

{{--        }--}}

{{--        .navbar-toggler i{--}}

{{--            color: #fff;--}}
{{--        }--}}

{{--        .navbar-toggler:focus{--}}
{{--            text-decoration: none;--}}
{{--            outline: 0;--}}
{{--            box-shadow: 0 0 0 0rem;--}}
{{--        }--}}

{{--        .navbar .navbar-brand{--}}

{{--            font-size: 23px;--}}
{{--            color: #282828bd;--}}
{{--        }--}}

{{--        .navbar{--}}

{{--            direction: rtl;--}}
{{--            padding-top: 0.6rem;--}}
{{--            padding-bottom: 0.2rem;--}}
{{--        }--}}


{{--        .navbar .data{--}}

{{--            margin: 0px;--}}
{{--        }--}}

{{--        .navbar .data li{--}}

{{--            list-style-type: none;--}}
{{--            float: left;--}}
{{--            padding: 15px 10px;--}}
{{--            margin: 0px;--}}

{{--        }--}}

{{--        .navbar .data li a i{--}}

{{--            padding-left: 8px;--}}
{{--            font-size: 14px;--}}
{{--            color: #ddd;--}}
{{--        }--}}

{{--        .navbar .data li a{--}}

{{--            text-decoration: none;--}}
{{--            color: #fff;--}}
{{--            font-size: 14.5px;--}}
{{--        }--}}

{{--        .navbar img{--}}

{{--            width: 70px;--}}
{{--        }--}}

{{--        .bg-light {--}}
{{--            --bs-bg-opacity: 1;--}}
{{--            background-color: #1a789b!important;--}}
{{--        }--}}

{{--        .navbar-nav a i{--}}

{{--            padding-left: 8px;--}}
{{--            font-size: 14px;--}}
{{--            color: #999;--}}

{{--        }--}}

{{--        .navbar-nav .nav-item{--}}

{{--            padding: 6px 0px;--}}
{{--        }--}}


{{--        @media(max-width:768px){--}}

{{--            .navbar-toggler{--}}

{{--                font-size: 1.6rem;--}}
{{--                display: block;--}}

{{--            }--}}


{{--            .navbar .data{--}}

{{--                list-style-type: none;--}}
{{--                float: left;--}}
{{--                padding: 15px 10px;--}}
{{--                margin: 0px;--}}
{{--                display: none;--}}

{{--            }--}}

{{--            .navbar{--}}

{{--                direction: rtl;--}}
{{--                padding-top: 0.8rem;--}}
{{--                padding-bottom: 0.4rem;--}}
{{--            }--}}

{{--        }--}}


{{--        table{--}}
{{--            margin-top: 30px;--}}
{{--        }--}}

{{--        table tr th{--}}

{{--            border: 1px solid #555;--}}
{{--            padding: 12px 20px;--}}
{{--            font-size: 12px;--}}
{{--            background-color: #19637e;--}}
{{--            color: #fff;--}}
{{--        }--}}

{{--        table tr td{--}}

{{--            border: 1px solid #555;--}}
{{--            padding: 12px 20px;--}}
{{--            font-size: 12px;--}}

{{--        }--}}




{{--        /**End Second**/--}}



{{--        .offcanvas-end {--}}
{{--            top: 0;--}}
{{--            right: 0;--}}
{{--            width: 100%;--}}
{{--            border-left: 1px solid rgba(0,0,0,.2);--}}
{{--            transform: translateX(100%);--}}
{{--        }--}}

{{--        .Photo-head2{--}}

{{--            display: flex;--}}
{{--            flex-wrap: wrap;--}}
{{--            align-items: center;--}}
{{--            justify-content: center;--}}
{{--            height: 100vh;--}}

{{--        }--}}



{{--        .offcanvas-body {--}}
{{--            flex-grow: 1;--}}
{{--            padding: 1rem 1rem;--}}
{{--            overflow-y: hidden;--}}
{{--        }--}}

{{--        .offcanvas-backdrop.show {--}}


{{--            opacity: 0;--}}
{{--            display: none;--}}
{{--        }--}}

{{--        .offcanvas .show {--}}

{{--            opacity: 0;--}}
{{--            display: none;--}}
{{--        }--}}


{{--        .mt-new-seaction{--}}

{{--            padding: 20px 0px;--}}
{{--        }--}}

{{--        .element-list {--}}
{{--            flex-wrap: nowrap;--}}
{{--            flex-direction: column;--}}
{{--        }--}}
{{--        .element-list {--}}
{{--            flex-wrap: wrap;--}}
{{--        }--}}
{{--        .d-flex {--}}
{{--            display: -ms-flexbox!important;--}}
{{--            display: flex!important;--}}
{{--        }--}}
{{--        *, :after, :before {--}}
{{--            -webkit-box-sizing: border-box;--}}
{{--            -moz-box-sizing: border-box;--}}
{{--            box-sizing: border-box;--}}
{{--        }--}}
{{--        *, ::after, ::before {--}}
{{--            box-sizing: border-box;--}}
{{--        }--}}

{{--        div {--}}
{{--            display: block;--}}
{{--        }--}}
{{--        body, html {--}}
{{--            direction: rtl;--}}
{{--        }--}}
{{--        body {--}}
{{--            color: #555;--}}
{{--            text-align: initial;--}}
{{--        }--}}
{{--        body {--}}
{{--            font-size: 14px;--}}
{{--            line-height: 1.42857143;--}}
{{--            background-color: #fff;--}}
{{--        }--}}
{{--        body {--}}
{{--            font-weight: 400;--}}
{{--        }--}}
{{--        html {--}}
{{--            font-size: 10px;--}}
{{--            -webkit-tap-highlight-color: transparent;--}}
{{--        }--}}

{{--        html {--}}
{{--            line-height: 1.15;--}}
{{--        }--}}
{{--        *, :after, :before {--}}
{{--            -webkit-box-sizing: border-box;--}}
{{--            -moz-box-sizing: border-box;--}}
{{--            box-sizing: border-box;--}}
{{--        }--}}
{{--        *, ::after, ::before {--}}
{{--            box-sizing: border-box;--}}
{{--        }--}}
{{--        *, :after, :before {--}}
{{--            -webkit-box-sizing: border-box;--}}
{{--            -moz-box-sizing: border-box;--}}
{{--            box-sizing: border-box;--}}
{{--        }--}}
{{--        *, ::after, ::before {--}}
{{--            box-sizing: border-box;--}}
{{--        }--}}


{{--        .container{--}}

{{--            width: 93%;--}}
{{--        }--}}

{{--        /**Start Section2**/--}}


{{--        .table{--}}

{{--            overflow: scroll;--}}
{{--        }--}}


{{--        table{--}}

{{--            overflow: scroll;--}}
{{--        }--}}

{{--        .section2{--}}

{{--            padding: 1px 0px;--}}

{{--        }--}}

{{--        .section2 .col{--}}

{{--            cursor: pointer;--}}

{{--        }--}}

{{--        .section2 .card-footer{--}}

{{--            padding: 15px 10px;--}}
{{--        }--}}

{{--        .section2{--}}

{{--            font-size: 14px;--}}
{{--        }--}}

{{--        .section2 .row{--}}

{{--            padding: 10px 0px;--}}
{{--        }--}}

{{--        .section2 h5{--}}

{{--            padding-bottom: 10px;--}}
{{--            font-size: 15px;--}}
{{--        }--}}



{{--        .section2 h2{--}}


{{--            font-size: 17px;--}}

{{--        }--}}



{{--        .section2 .card-footer button{--}}

{{--            border: none;--}}
{{--            padding: 9px 30px;--}}
{{--            background-color: #48667c;--}}
{{--            color: #fff;--}}
{{--            border-radius: 2px;--}}
{{--            font-size: 14px;--}}

{{--        }--}}

{{--        .section2 .card-body{--}}

{{--            padding: 15px 10px;--}}
{{--        }--}}

{{--        .section2 h3{--}}

{{--            padding: 15px 0px;--}}
{{--        }--}}

{{--        .section2 h4{--}}

{{--            margin-bottom: 20px;--}}
{{--            margin-top: 10px;--}}
{{--            font-size: 16px;--}}
{{--        }--}}

{{--        .section2 .card-body h5{--}}

{{--            font-size: 15px;--}}


{{--        }--}}

{{--        .section2 .card-body h6{--}}

{{--            font-size: 13px;--}}


{{--        }--}}


{{--        .section2 .card-body{--}}

{{--            position: absolute;--}}
{{--            height: 100%;--}}
{{--            background: rgba(0,0,0,0.3);--}}
{{--            width: 100%;--}}
{{--            color: #fff;--}}

{{--        }--}}



{{--        .section2 .card img{--}}

{{--            height: 370px;--}}
{{--            border-radius: 5px;--}}
{{--        }--}}

{{--        /**End Section2**/--}}






{{--        /**Start Footer**/--}}
{{--        .footer{--}}

{{--            background-color: #196581!important;--}}
{{--            direction: ltr;--}}

{{--        }--}}

{{--        .footer p{--}}

{{--            padding: 0px;--}}
{{--            margin: 0px;--}}
{{--            color: #bbb;--}}
{{--            font-size: 14px;--}}
{{--        }--}}

{{--        .footer p a i{--}}

{{--            padding: 25px 10px;--}}
{{--            color: #bbb;--}}
{{--            font-size: 14px;--}}
{{--        }--}}

{{--        .footer .para2{--}}

{{--            padding: 20px 0px;--}}
{{--            text-align: center;--}}
{{--        }--}}

{{--        .footer .para22{--}}

{{--            text-align: right;--}}

{{--        }--}}

{{--        .footer .btn-primary{--}}

{{--            padding: 6px 12px;--}}
{{--        }--}}

{{--        @media(max-width:768px)--}}
{{--        {--}}


{{--            .footer .para2{--}}

{{--                padding: 10px 0px;--}}
{{--            }--}}

{{--            .footer p a i {--}}
{{--                padding: 15px 10px;--}}
{{--                color: #bbb;--}}
{{--                font-size: 14px;--}}
{{--            }--}}

{{--            .second input {--}}
{{--                padding: 14px 5px;--}}
{{--                border: none;--}}
{{--                outline: none;--}}
{{--                width: 32.6%;--}}
{{--            }--}}

{{--            .second .form1 div{--}}

{{--                background-color: #fff;--}}
{{--                padding: 0px 12px;--}}
{{--                border: 1px solid #aaa;--}}

{{--            }--}}



{{--        }--}}

{{--        /**End Footer**/--}}
{{--        *::before, *::after {--}}
{{--            box-sizing: border-box;--}}
{{--        }--}}
{{--        *::-webkit-scrollbar {--}}
{{--            width: 4px;--}}
{{--            height: 4px;--}}
{{--            transition: .3s;--}}
{{--        }--}}
{{--        ::-webkit-scrollbar-thumb {--}}
{{--            background: #e1e6f1;--}}
{{--        }--}}



{{--        .h-100 {--}}
{{--            height: 100%!important;--}}
{{--        }--}}
{{--        .card {--}}

{{--            border: none;--}}
{{--        }--}}

{{--        .card-footer {--}}
{{--            padding: 0.5rem 1rem;--}}
{{--            background-color: rgba(0,0,0,.03);--}}
{{--            border-top: none;--}}
{{--        }--}}

{{--        .container {--}}
{{--            width: 98%;--}}
{{--        }--}}

{{--        @media(min-width:768px)--}}
{{--        {--}}

{{--            .row-cols-md-3>* {--}}
{{--                flex: 0 0 auto;--}}
{{--                width: 25%;--}}
{{--            }--}}

{{--        }--}}

{{--        /**Start download**/--}}

{{--        .down{--}}

{{--            padding: 20px 0px;--}}

{{--        }--}}

{{--        .down img{--}}

{{--            padding: 3px 0px;--}}
{{--            width: 100px;--}}
{{--            height: 50px;--}}

{{--        }--}}

{{--        .down p{--}}


{{--            font-size: 13px;--}}
{{--            padding: 10px 0px;--}}
{{--            color: #777;--}}

{{--        }--}}

{{--        .down h3{--}}

{{--            font-size: 16px;--}}
{{--            color: #666;--}}

{{--        }--}}

{{--        /**End download**/--}}

{{--        /**Start head-location**/--}}
{{--        .head-location{--}}

{{--            padding: 40px 0px;--}}
{{--            background-color: #1a789b;--}}

{{--        }--}}

{{--        .head-location h3{--}}

{{--            color: #fff;--}}
{{--        }--}}

{{--        .head-location .head-location1 p i{--}}

{{--            font-size: 12.5px;--}}
{{--            padding-left: 7px;--}}

{{--        }--}}

{{--        .head-location .head-location1 p,.head-location .head-location2 p,.head-location .head-location2 p a{--}}

{{--            font-size: 13.5px;--}}
{{--            text-align: justify;--}}
{{--            color: #eee;--}}

{{--        }--}}

{{--        .head-location .head-location2 p a i{--}}

{{--            font-size: 11px;--}}
{{--            padding-left: 4px;--}}

{{--        }--}}

{{--        .head-location .head-location1 h3{--}}

{{--            font-size: 16px;--}}
{{--            padding-bottom: 15px;--}}

{{--        }--}}

{{--        .head-location .head-location2 h3{--}}

{{--            color: #fff;--}}
{{--            font-size: 16px;--}}
{{--            padding-bottom: 15px;--}}

{{--        }--}}

{{--        .head-location .head-location1 p:nth-of-type(2){--}}

{{--            padding-top: 10px;--}}

{{--        }--}}

{{--        .head-location .head-location1 p:nth-of-type(3){--}}

{{--            padding-top: 5px;--}}

{{--        }--}}

{{--        .head-location .head-location3 h3{--}}

{{--            color: #fff;--}}
{{--            font-size: 16px;--}}
{{--            padding-bottom: 15px;--}}

{{--        }--}}

{{--        .head-location .head-location3 a{--}}

{{--            color: #eee;--}}
{{--            display: block;--}}
{{--            padding-bottom: 10px;--}}
{{--            font-size: 13.5px;--}}

{{--        }--}}

{{--        .head-location .head-location3 a i{--}}

{{--            padding-left: 7px;--}}
{{--            font-size: 12px;--}}

{{--        }--}}


{{--        .head-location .head-location2{--}}

{{--            padding-right: 40px;--}}
{{--        }--}}

{{--        @media(max-width:768px){--}}

{{--            .head-location .head-location1{--}}

{{--                width: 100%;--}}

{{--            }--}}

{{--            .head-location .head-location2{--}}

{{--                padding-top: 10px;--}}

{{--            }--}}

{{--            .footer .para22{--}}

{{--                text-align: left;--}}

{{--            }--}}

{{--        }--}}

{{--        /**End head-location**/--}}


{{--    </style>--}}

{{--    @if(LaravelLocalization::setLocale() == 'en')--}}
{{--        <style>--}}
{{--            body{--}}

{{--                direction: ltr;--}}
{{--            }--}}
{{--            table{--}}

{{--                direction: ltr;--}}
{{--            }--}}
{{--            .top{--}}

{{--                direction: ltr;--}}
{{--            }--}}
{{--        </style>--}}
{{--    @endif--}}
{{--@endsection--}}

{{--@section('content')--}}

{{--    <!--Start Table-->--}}
{{--    <div class="table container">--}}

{{--        @if(session()->has('canceled'))--}}
{{--            <div class="alert alert-primary mt-3">{{session()->get('canceled')}}</div>--}}
{{--        @endif--}}

{{--        @if(session()->has('success'))--}}
{{--            <div class="alert alert-primary mt-3">{{session()->get('success')}}</div>--}}
{{--        @endif--}}

{{--        <table>--}}

{{--            <tr>--}}
{{--                <th>{{__('site.id')}}</th>--}}
{{--                <th>{{__('site.rate')}}</th>--}}
{{--                <th>{{__('site.city')}}</th>--}}
{{--                <th>{{__('site.child')}}</th>--}}
{{--                <th>{{__('site.adults')}}</th>--}}
{{--                <th>{{__('site.room_type')}}</th>--}}
{{--                <th>{{__('site.room_number')}}</th>--}}
{{--                <th>{{__('site.num_of_nights')}}</th>--}}
{{--                <th>{{__('site.date_arrive')}}</th>--}}
{{--                <th>{{__('site.date_leave')}}</th>--}}
{{--                <th>{{__('site.hotel')}}</th>--}}
{{--                <th>{{__('site.total')}}</th>--}}
{{--                <th>{{__('site.reserve')}}</th>--}}
{{--                <th>{{__('site.control')}}</th>--}}
{{--            </tr>--}}



{{--            @foreach($reservations as $reservation)--}}
{{--                <tbody>--}}

{{--                <tr>--}}

{{--                    <td>{{$reservation->id}}</td>--}}
{{--                    @if(\Carbon\Carbon::now()->format('Y-m-d') == $reservation->check_out)--}}
{{--                        <td><a href="{{route('users.rates.create',$reservation->hotel->id)}}">تقيم الفندق</a> </td>--}}

{{--                    @else--}}
{{--                        <td>سيظهر لينك تقييم الفندق يوم تاريخ المغادره</td>--}}
{{--                    @endif--}}
{{--                    <td>{{$reservation->destination}}</td>--}}
{{--                    <td>{{$reservation->children}}</td>--}}
{{--                    <td>{{$reservation->adults}}</td>--}}
{{--                    <td>{{$reservation->room->room_type->room_type}}</td>--}}
{{--                    <td>{{$reservation->room_number}}</td>--}}
{{--                    <td>{{$reservation->num_of_nights}}</td>--}}
{{--                    <td>{{$reservation->check_in}}</td>--}}
{{--                    <td>{{$reservation->check_out}}</td>--}}
{{--                    <td>{{ lang() == 'ar' ? $reservation->hotel->name_ar : $reservation->hotel->name_en}}</td>--}}
{{--                    <td>{{ lang() == 'ar' ? number_format($reservation->total_all,2) . $reservation->hotel->currency_ar : number_format($reservation->total_all,2) . $reservation->hotel->currency_en}}</td>--}}
{{--                    <td>{{$reservation->cancel()}}</td>--}}
{{--                    <td>--}}

{{--                        @if($reservation->status == 1)--}}

{{--                            <button style="border: none;background:rgba(0, 0, 0, 0.2);padding: 7px 20px"><a  href="{{route('reservations.cancel',$reservation->id)}}">{{__('site.cancel')}}</a></button>--}}


{{--                        @else--}}
{{--                            <button style="border: none;background:rgba(0, 0, 0, 0.2);padding: 7px 20px">{{__('site.canceled')}}</button>--}}

{{--                        @endif--}}
{{--                    </td>--}}

{{--                </tr>--}}
{{--                </tbody>--}}
{{--            @endforeach--}}



{{--        </table>--}}
{{--    </div>--}}

{{--    <div class="container top">--}}

{{--        {{$reservations->links()}}--}}
{{--    </div>--}}
{{--@endsection--}}