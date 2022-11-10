@extends('layouts_admin.master')
@section('css')
    @section('title')
        فواتير الفنادق السنويه
    @stop
@endsection

@section('PageText')
    {{__('admin_create.hotels_show')}}

@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{__('admin_create.hotels')}}

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
                                    <form  action="{{route('admins.commissions')}}" method="GET" autocomplete="off">

                                        <div class="row">

                                            <div class="col-12">
                                                <label for="Name_en" class="mr-sm-2">{{__('data.name')}}
                                                    :</label>
                                                <input type="text" class="form-control" name="name_{{lang()}}">
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

                                @if (session()->has('active'))
                                    <div class="alert alert-danger">
                                        {{session()->get('active')}}
                                    </div>
                                @endif

                                    <a href="{{route('admins.hotel.all')}}" class="btn btn-success btn-sm" role="button"
                                       aria-pressed="true">{{__('hotel_sidebar.all_hotels')}}</a>

                                    <button class="sear btn btn-info btn-sm" role="button"
                                            aria-pressed="true" data-toggle="modal" data-target="#exampleModal">{{__('book.search')}}</button><br><br>

                                    <br><br>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>{{__('data.name')}}</th>
                                            <th>{{__('data.active')}}</th>
                                            <th>{{__('data.action')}}</th>
                                        </tr>
                                        </thead>

                                        @foreach($hotels as $hotel)

                                            <tbody>
                                            <tr>


                                                <td>{{lang() == 'ar' ? $hotel->name_ar : $hotel->name_en}}</td>
                                                <td>{{$hotel->active()}}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('content.operations')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                                                            <a class="dropdown-item" href="{{route('admins.commissions.hotel',$hotel->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('content.yearly')}}</a>
                                                            <a class="dropdown-item" href="{{route('admins.month.hotel',$hotel->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('content.report')}}</a>
                                                            <a class="dropdown-item" href="{{route('admins.hotels/active',$hotel->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('content.active')}}</a>


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
