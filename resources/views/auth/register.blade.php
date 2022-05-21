
@extends('layouts_login.layout')
@section('title','تسجيل حساب')
@section('content')

    <div class="login-wrap p-4 p-md-5">
        <div class="d-flex">
            <div class="w-100">
                <h3 class="mb-4">{{__('user_create.register')}}</h3>
            </div>

        </div>
        <form action="{{route('register')}}" method="post" class="signin-form">

            @csrf

            <div class="form-group mb-3">
                <label class="label" for="name">{{__('registration.name')}}</label>
                <input type="text" name="name" class="form-control" placeholder="{{__('registration.name')}}" >
                @error('name')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group mb-3">
                <label class="label" for="name">{{__('login.email')}}</label>
                <input type="email" name="email" class="form-control" placeholder="{{__('login.email')}}" >
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label class="label" for="password">{{__('registration.password')}}</label>
                <input type="password" name="password" class="form-control" placeholder="{{__('registration.password')}}" >
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group mb-3">
                <label class="label" for="password">{{__('registration.confirm')}}</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="{{__('registration.confirm')}}" >

            </div>


            <div class="form-group mb-3">
                <label class="label" for="password">{{__('registration.phone')}}</label>
                <input type="number" name="phone" class="form-control" placeholder="{{__('registration.phone')}}" >
                @error('phone')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary rounded submit px-3"> {{__('registration.reg')}}</button>
            </div>



        </form>
    </div>

@endsection

