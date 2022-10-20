<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                        class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                            class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="#">
                        <img class="brand-logo"
                             src="{{asset('css/admin/images/logo/logo.png')}}">
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                            class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>

                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                    <span class="mr-1">{{__('admin.welcome')}}<span
                      class="user-name text-bold-700">  {{admin()->name}}</span>
                </span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-divider"></div>
                            <a href class="dropdown-item" href="{{ route('logout') }}"

                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('navbar.logout') }}

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>

                            </a>
                        </div>
                    </li>

                    {{--start notifications --}}


                    {{--end notifications--}}


                    @auth

                        <li class="dropdown dropdown-notification nav-item  dropdown-notifications">
                            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                                <i class="ficon ft-bell"> </i>
                                <span style="position: absolute;margin-top: -5px" class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow   notif-count" data-count="0">0</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0 text-center">
                                        <span class="grey darken-2 text-center"> {{__('users.messages')}}</span>
                                    </h6>
                                </li>
                                <li class="scrollable-container ps-container ps-active-y media-list w-100">
                                    <a href="">
                                        <div class="media">
                                            <div class="media-body">
                                                {{-- start push notification--}}
                                            </div>
                                        </div>
                                    </a>

                                </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                                                                    href="">{{__('users.notification')}} </a>
                                </li>
                            </ul>
                        </li>

                    @endauth



                </ul>
            </div>
        </div>
    </div>
</nav>

@include('admin.alerts.alerts')