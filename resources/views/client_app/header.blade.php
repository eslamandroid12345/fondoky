<!--This Is Navbar-->
<nav class="navbar navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{url('/')}}" style="font-weight: bold;color: #fff">{{__('navbar.my')}}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <i class="fa fa-bars"></i>
        </button>

        <ul class="data">


            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li class="nav-item">
                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach

                @auth
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                    class="bx bx-log-out"></i>{{__('welcome.logout')}}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </li>
                @else
                    <li><a href="{{route('login')}}">{{__('navbar.login')}}</a></li>

                @endauth
            @auth<li><a href="{{route('home')}}">{{__('welcome.reservations')}}</a></li>@endauth
            <li><a href="{{url('/')}}">{{__('navbar.home')}}</a></li>

        </ul>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <a class="navbar-brand" href="#" style="font-weight: bold;">{{__('navbar.my')}}</a>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('/')}}"><i class="fa fa-home"></i>{{__('navbar.home')}}</a>
                    </li>
                    <li class="nav-item">
                        @auth<a class="nav-link" href="{{route('home')}}"><i class="fa fa-search"></i>{{__('welcome.reservations')}}</a>@endauth
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}"><i class="fa fa-address-book"></i>{{__('navbar.login')}}</a>
                    </li>

                   @auth
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                    class="bx bx-log-out"></i>{{__('welcome.logout')}}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    @endauth
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li class="nav-item">
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach


                </ul>

            </div>
        </div>
    </div>
</nav>

<!--End Navbar-->

