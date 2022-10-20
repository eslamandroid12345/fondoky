@extends('layouts_admin.master')
@section('css')
    @section('title')
        اضافه صلاحيه جديده


    @stop
@endsection

@section('PageText')
    {{__('roles_content.new_role')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{__('roles_content.role_add')}}

    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if (session()->has('role'))
                        <div class="alert alert-danger">
                            {{session()->get('role')}}
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


                        <form action="{{route('roles.store')}}" method="post" autocomplete="off">

                            @csrf


                            <h6 style="font-family: 'Cairo', sans-serif;color: blue"> {{__('roles_content.new_role')}}</h6><br>


                        <div class="row">



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{__('roles_content.role_name')}}</label>
                                    <input  type="text"  class="form-control" name="name" value="{{old('name')}}">
                                </div>
                            </div>


                            <div class="col-md-12">
                                @foreach(config('access.permissions') as $name=>$value)
                                    <div class="form-group">

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$name}}" id="defaultCheck1">
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
@endsection
