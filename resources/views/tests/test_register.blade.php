{{--@extends('layouts_auth_login.master')--}}


{{--@section('content')--}}

{{--    <div class="auth-wrapper auth-cover">--}}
{{--        <div class="auth-inner row m-0">--}}
{{--            <!-- Brand logo--><a class="brand-logo" href="#">--}}
{{--                <img src="{{asset('dashbord/app-assets/images/logo/logo.png')}}">--}}

{{--            </a>--}}
{{--            <!-- /Brand logo-->--}}
{{--            <!-- Left Text-->--}}
{{--            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">--}}
{{--                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src=" {{asset('dashbord/app-assets/images/pages/register-v2.svg')}}" alt="Login V2" /></div>--}}
{{--            </div>--}}
{{--            <!-- /Left Text-->--}}
{{--            <!-- Login-->--}}
{{--            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">--}}
{{--                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">--}}

{{--                    <h2 class="card-title fw-bold mb-1 font">@lang('auth_user.text_2')</h2>--}}
{{--                    <p class="card-text mb-2 font">@lang('auth_user.paragraph')</p>--}}


{{--                @if($errors->any())--}}
{{--                        <div class="alert alert-danger fontSize" role="alert">--}}
{{--                            @foreach ($errors->all() as $error )--}}
{{--                                <div class="alert-body">--}}
{{--                                    {{$error}}--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    @endif--}}


{{--                    <form class="auth-login-form mt-2" action="{{route('register.user')}}" method="POST">--}}
{{--                        @csrf--}}

{{--                        <div class="mb-1">--}}
{{--                            <label class="form-label font" for="login-email">@lang('auth_user.name') </label>--}}
{{--                            <input class="form-control font" id="login-email" type="text" name="name"  aria-describedby="login-email" autofocus="" tabindex="1" />--}}
{{--                        </div>--}}

{{--                        <div class="mb-1">--}}
{{--                            <label class="form-label font" for="login-email">@lang('auth_user.phone') </label>--}}
{{--                            <input class="form-control font" id="login-email" type="number" name="phone"  aria-describedby="login-email" autofocus="" tabindex="1" />--}}
{{--                        </div>--}}

{{--                        <div class="mb-1">--}}
{{--                            <label class="form-label font" for="login-email">@lang('auth_user.email')</label>--}}
{{--                            <input class="form-control font" id="login-email" type="text" name="email"  aria-describedby="login-email" autofocus="" tabindex="1" />--}}
{{--                        </div>--}}
{{--                        <div class="mb-1">--}}
{{--                            <div class="d-flex justify-content-between color font">--}}
{{--                                <label class="form-label" for="login-password color">@lang('auth_user.password')</label>--}}
{{--                            </div>--}}
{{--                            <div class="input-group input-group-merge form-password-toggle">--}}
{{--                                <input class="form-control form-control-merge" id="login-password" type="password" name="password" placeholder="***************" aria-describedby="login-password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="mb-1">--}}
{{--                            <div class="d-flex justify-content-between color font">--}}
{{--                                <label class="form-label" for="login-password color">@lang('auth_user.password_confirmation')</label>--}}
{{--                            </div>--}}
{{--                            <div class="input-group input-group-merge form-password-toggle">--}}
{{--                                <input class="form-control form-control-merge" id="login-password" type="password" name="password_confirmation" placeholder="***************" aria-describedby="login-password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <button class="btn btn-primary w-100" tabindex="4">@lang('auth_user.register')</button>--}}
{{--                    </form>--}}
{{--                    <p class="text-center mt-2"><span>@lang('auth_user.user_before')</span><a href="{{route('login')}}"><span>&nbsp;@lang('auth_user.login_now')</span></a></p>--}}
{{--                    <div class="divider my-2">--}}
{{--                        <div class="divider-text">@lang('auth_user.login_with')</div>--}}
{{--                    </div>--}}
{{--                    <div class="auth-footer-btn d-flex justify-content-center"></i></a>--}}
{{--                        <a class="btn btn-google" href=""><i data-feather="mail"></i></a>--}}
{{--                        <a class="btn btn-facebook" href=""><i data-feather="mail"></i></a>--}}
{{--                    </div>--}}


{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- /Login-->--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}

