@extends('layouts_auth_login.master')

@section('content')
    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">
{{--            <!-- Brand logo--><a class="brand-logo" href="#">--}}
{{--                <img src="{{asset('dashbord/app-assets/images/logo/logo.png')}}">--}}

{{--            </a>--}}
            <!-- /Brand logo-->
            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src=" {{asset('dashbord/app-assets/images/pages/login-v2.svg')}}" alt="Login V2" /></div>
            </div>
            <!-- /Left Text-->
            <!-- Login-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">

                    <h2 class="card-title fw-bold mb-1 font">@lang('auth_user.text')</h2>
                    <p class="card-text mb-2 font">@lang('auth_user.paragraph')</p>


                    @if($errors->any())
                        <div class="alert alert-danger fontSize" role="alert">
                            @foreach ($errors->all() as $error )
                                <div class="alert-body">
                                    {{$error}}
                                </div>
                            @endforeach
                        </div>
                    @endif



                    <form class="auth-login-form mt-2" action="{{route('auth.login')}}" method="POST">
                        @csrf
                        <div class="mb-1">
                            <label class="form-label font" for="login-email">@lang('auth_user.email') </label>
                            <input class="form-control font" id="login-email" type="text" name="email" placeholder="user@example.com" aria-describedby="login-email" autofocus="" tabindex="1" />
                        </div>
                        <div class="mb-1">
                            <div class="d-flex justify-content-between color font">
                                <label class="form-label" for="login-password color">@lang('auth_user.password')</label><a href=""><small>@lang('auth_user.forget_password')</small></a>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control form-control-merge" id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                        <div class="mb-1">
                            <div class="form-check">
                                <input class="form-check-input" id="remember-me" type="checkbox" tabindex="3" />
                                <label class="form-check-label" for="remember-me">@lang('auth_user.remember')</label>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100" tabindex="4">@lang('auth_user.login')</button>
                    </form>
                    <p class="text-center mt-2"><span>@lang('auth_user.new_user')</span><a href="{{route('register')}}"><span>&nbsp;@lang('auth_user.register')</span></a></p>
                    <div class="divider my-2">
                        <div class="divider-text">@lang('auth_user.login_with')</div>
                    </div>
                    <div class="auth-footer-btn d-flex justify-content-center"></i></a>
                        <a class="btn btn-google" href=""><i data-feather="mail"></i></a>
                        <a class="btn btn-facebook" href=""><i data-feather="mail"></i></a>
                    </div>


                </div>
            </div>
            <!-- /Login-->
        </div>
    </div>
@endsection