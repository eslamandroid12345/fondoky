
@extends('layouts_login.layout')
@section('title','تسجيل دخول المشرف العام للفنادق')
@section('content')

    <div class="login-wrap p-4 p-md-5">
        @if($message = Session::get('error'))
            <div id="alert" class="row mr-2 ml-2">
                <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                        id="type-error">{{$message}}
                </button>
            </div>
        @endif



        <div class="d-flex">
            <div class="w-100">
                <h3 class="mb-4">{{__('supervisor.log')}}</h3>
            </div>

        </div>
        <form action="{{route('supervisors.login')}}" method="post" class="signin-form">

            @csrf
            <div class="form-group mb-3">
                <label class="label" for="name">{{__('login.email')}}</label>
                <input type="email" value="{{old('email')}}" name="email" class="form-control" placeholder="{{__('login.email')}}" >
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="label" for="password">{{__('login.password')}}</label>
                <input type="password" name="password" class="form-control" placeholder="{{__('login.password')}}" >
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary rounded submit px-3">{{ __('supervisor.log_two')}}</button>
            </div>


        </form>
    </div>

@endsection

