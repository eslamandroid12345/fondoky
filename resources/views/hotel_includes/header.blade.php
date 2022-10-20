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
                <span class="mr-1">{{__('hotel_sidebar.welcome')}}
                  <span
                      class="user-name text-bold-700">  {{ lang() == 'ar' ? hotel()->name_ar : hotel()->name_en}}</span>
                </span>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{route('hotels.edit')}}"><i
                                    class="ft-user"></i> تعديل الملف الشحصي </a>
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


                </ul>
            </div>
        </div>
    </div>
</nav>
@include('hotel_includes.alerts.alerts')