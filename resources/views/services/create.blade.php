@extends('layouts.master')
@section('css')
    @section('title')

        اضافه خدمات للفندق

    @stop
@endsection

@section('PageText')
    {{__('hotels.service_create')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{__('hotels.services_departments')}}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    @if($service->count() == 0)

        <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <form class="form" action="{{route('services.store')}}" method="POST" autocomplete="off">

                            @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('hotels.service_create')}}</h6><br>


                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('hotels.service_name')}}<span class="text-danger">*</span></label>
                                    <input  type="text"  class="form-control" name="name">
                                </div>
                            </div>

                             <div class="col-md-12">
                                 @foreach(config('hotel.services') as $name=>$value)
                                     <div class="form-group">

                                         <div class="form-check">
                                             <input class="form-check-input" type="checkbox" name="services[]" value="{{$name}}" id="defaultCheck1">
                                             <label class="form-check-label" for="defaultCheck1">{{$value}}</label>
                                         </div>

                                     </div>
                                 @endforeach

                             </div>


                        </div>



                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{__('admin_create.save')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
    @else

        <div class="row">
            <div class="col-md-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="col-xl-12 mb-30">
                            <div class="card card-statistics h-100">
                                <div class="card-body">
                                    @if (session()->has('create'))
                                        <div class="alert alert-danger">
                                            {{session()->get('create')}}
                                        </div>
                                    @endif

                                    @if (session()->has('update_service'))
                                        <div class="alert alert-danger">
                                            {{session()->get('update_service')}}
                                        </div>
                                    @endif
                                    <a href="{{route('rooms.create')}}" class="btn btn-success btn-sm" role="button"
                                       aria-pressed="true">{{__('hotel_sidebar.room_add')}}</a><br><br>
                                    <div class="table-responsive">
                                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                               data-page-length="50"
                                               style="text-align: center">
                                            <thead>
                                            <tr>
                                                <th>{{__('services.name_ser')}}</th>
                                                <th>{{__('services.services_all')}}</th>
                                                <th>{{__('hotels.room_service_control')}}</th>


                                            </tr>
                                            </thead>

                                            @foreach($service as $ser)

                                                <tbody>
                                                <tr>

                                                    <td>{{$ser->name}}</td>
                                                    <td>
                                                        @foreach(json_decode($ser->services) as $serv)
                                                            {{$serv}}-
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <div class="dropdown show">
                                                            <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                {{__('content.operations')}}
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                                                                <a class="dropdown-item" href="{{route('services.edit',$ser->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('content.update')}}</a>


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



    @endif
@endsection
