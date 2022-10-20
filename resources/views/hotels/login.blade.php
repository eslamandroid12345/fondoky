
@extends('layouts_login.layout')
@section('title','تسجيل دخول الفندق')

@section('content')

    <div class="login-wrap p-4 p-md-5">

            <div class="d-flex">
            <div class="w-100">
                <h3 class="mb-4">{{__('hotels.log')}}</h3>
            </div>

        </div>
        <form action="{{route('hotels.login')}}" method="post" class="signin-form">

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
                <button type="submit" class="form-control btn btn-primary rounded submit px-3 submitted">{{ __('hotels.login')}}</button>
            </div>

            <div class="form-group">
                <a href="{{route('hotels.show.register')}}" class="form-control btn bg-secondary text-white">{{ __('hotels.register_now')}}</a>
            </div>
        </form>
    </div>

@endsection
