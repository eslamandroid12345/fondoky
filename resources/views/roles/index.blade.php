@extends('layouts_admin.master')
@section('css')
    @section('title')
        عرض الصلاحيات
    @stop
@endsection

@section('PageText')
    {{__('roles_content.permissions')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{__('roles_content.show_all')}}

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

                                @if (session()->has('role_update'))
                                    <div class="alert alert-danger">
                                        {{session()->get('role_update')}}
                                    </div>
                                @endif

                                <a href="{{route('roles.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{__('sidebar_admin.roles_create')}}</a><br><br>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>{{__('admin_role.role_one')}}</th>
                                            <th>{{__('admin_role.permissions_role')}}</th>
                                            <th>{{__('data.action')}}</th>

                                        </tr>
                                        </thead>

                                        @foreach($roles as $role)

                                            <tbody>
                                            <tr>
                                                <td>{{$role->name}}</td>
                                                <td>
                                                    @foreach(json_decode($role->permissions) as $permissions)
                                                        {{$permissions}},
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{__('content.operations')}}
                                                        </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">


                                                            <a class="dropdown-item" href="{{route('roles.edit',$role->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp;{{__('content.update')}}</a>


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
