@extends('layouts_admin.master')
@section('css')
    @section('title')

        اضافه موظف جديد للوحه

    @stop
@endsection

@section('PageText')
    {{__('admin_create.home')}}

@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{__('admin_create.edit_admin')}}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (session()->has('admin'))
                        <div class="alert alert-danger">
                            {{session()->get('admin')}}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                        <form action="{{route('admins.store')}}" method="post" enctype="multipart/form-data"
                              autocomplete="off">

                            @csrf
                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('admin_create.home')}}</h6><br>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('admin_create.employee_name')}}</label>
                                    <input  type="text"  class="form-control" name="name" value="{{old('name')}}">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('admin_create.email')}}</label>
                                    <input  type="email"  class="form-control" name="email" value="{{old('email')}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('admin_create.password')}}</label>
                                    <input  type="password"  class="form-control" name="password" value="{{old('password')}}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('admin_create.phone')}}</label>
                                    <input  type="number"  class="form-control" name="phone" value="{{old('phone')}}">
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group">

                                    <label for="gender">{{__('admin.select_role')}} <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="role_id">
                                        <option selected disabled>{{__('admin.select_role')}}...</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                        <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{__('admin_create.image')}}</h6><br>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="academic_year">{{__('admin_create.image')}} : <span class="text-danger">*</span></label>
                                <input type="file" name="image" />
                            </div>
                        </div>

                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{__('admin_create.save')}}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
