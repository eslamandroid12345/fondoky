@extends('layouts_admin.master')
@section('css')
    @section('title')
        عرض موظفين لوحه التحكم
    @stop
@endsection

@section('PageText')
    {{__('admin_create.employees')}}
@stop

@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')

        {{__('admin_create.employees_list')}}
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

                                <a href="{{route('admins.register')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{__('sidebar_admin.admin_create')}}</a><br><br>

                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>{{ __('employees.name') }}</th>
                                            <th>{{ __('employees.email') }}</th>
                                            <th>{{ __('employees.image') }}</th>
                                            <th>{{ __('employees.phone') }}</th>
                                            <th>{{ __('employees.role') }}</th>

                                        </tr>
                                        </thead>

                                        @foreach($admins as $admin)
                                            <tbody>
                                            <tr>
                                                <td>{{$admin->name}}</td>
                                                <td>{{$admin->email}}</td>
                                                <td>
                                                    <img style="width: 80px;height: 80px;border-radius: 4px" src="{{URL::to('/admins/'.$admin->image)}}">
                                                </td>
                                                <td>{{$admin->phone}}</td>
                                                <td>{{$admin->role->name}}</td>

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
