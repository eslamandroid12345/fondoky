@extends('layouts_admin.master')
@section('css')
    @section('title')
        {{ GoogleTranslate::trans('جميع المستخدمين',\App::getLocale()) }}
    @stop
@endsection

@section('PageText')
    {{__('admin_create.users_show')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{__('admin_create.users')}}

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
                                @if (session()->has('update'))
                                    <div class="alert alert-danger">
                                        {{session()->get('update')}}
                                    </div>
                                @endif

                                    @if (session()->has('success'))
                                        <div class="alert alert-danger">
                                            {{session()->get('success')}}
                                        </div>
                                    @endif
                                    <a href="{{route('admins.hotel.all')}}" class="btn btn-success btn-sm" role="button"
                                       aria-pressed="true">{{__('hotel_sidebar.all_hotels')}}</a><br><br>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>{{__('users.name')}}</th>
                                            <th>{{__('users.email')}}</th>
                                            <th>{{__('users.active')}}</th>
                                            <th>{{__('users.created_at')}}</th>
                                            <th>{{__('users.action')}}</th>
                                        </tr>
                                        </thead>

                                        @foreach($users as $user)
                                            <tbody>
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->active()}}</td>
                                                <td>{{$user->created_at->diffForHumans()}}</td>

                                                <td>


                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('content.operations')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                                            <a class="dropdown-item" href="{{route('users.update',$user->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp; {{__('content.active')}}</a>


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
