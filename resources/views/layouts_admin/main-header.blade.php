<!--=================================
header start-->
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{ route('booking.all') }}"><img src="{{ URL::asset('assets_2/images/logo-dark.png') }}" alt=""></a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('booking.all') }}"><img src="{{ URL::asset('assets_2/images/logo-icon-dark.png') }}"
                alt=""></a>


    </div>
    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
        <li class="nav-item">
            <div class="search">
                <a class="search-btn not_click" href="javascript:void(0);"></a>
                <div class="search-box not-click">
                    <input type="text" class="not-click form-control" placeholder="Search" value=""
                        name="search">
                    <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                </div>
            </div>
        </li>
    </ul>
    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">

        <div class="btn-group mb-1">
            <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if (App::getLocale() == 'ar')
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('assets_2/images/flags/EG.png') }}" alt="">
                @else
                    {{ LaravelLocalization::getCurrentLocaleName() }}
                    <img src="{{ URL::asset('assets_2/images/flags/US.png') }}" alt="">
                @endif
            </button>
            <div class="dropdown-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                @endforeach
            </div>


        </div>

        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
        </li>

        @can('notifications')
            <div class="dropdown nav-item main-header-notification">
                <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true">
                  <i class="ti-bell"></i>

                    <span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow   notif-count" data-count="0">0</span>
                </a>
                <div class="dropdown-menu" style="width: 300px">

                    <li class="scrollable-container ps-container ps-active-y media-list w-100 mt-4 mb-4 text-center">
                        <a href="">
                            <div class="media">
                                <div class="media-body">

                                </div>
                            </div>
                        </a>

                    </li>


                </div>
            </div>


        @endcan


        <li class="nav-item dropdown mr-30">
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <img src="{{ URL::asset('assets_2/images/user_icon.png') }}" alt="avatar">


            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{__('admin.welcome')}} {{admin()->name}}</h5>
                            <span>{{ admin()->email}}</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                    <form method="post" action="{{ route('logout') }}">

                @csrf
                <a class="dropdown-item" href="#" onclick="event.preventDefault();this.closest('form').submit();"><i class="bx bx-log-out"></i>{{__('hotels.logout_now')}}</a>
            </form>

            </div>
        </li>
    </ul>
</nav>

<!--=================================
header End-->
