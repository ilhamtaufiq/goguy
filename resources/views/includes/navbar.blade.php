    <nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">
                <img src="/images/logo.svg" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a <a  class="nav-link"  href="{{route('dashboard')}}" class="dropdown-item">Dashboard</a>
                    </li>
                    @guest
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-success nav-link px-4 text-white" href="{{route('login')}}">Login</a>
                    </li>
                    @endguest
                </ul>

            @auth
            <!-- Desktop Menu -->
            <ul class="navbar-nav d-none d-lg-flex">
                <li class="nav-item dropdown">
                <a href="#" class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" >
                    <img src="/images/icon-user.png" alt="" class="rounded-circle mr-2 profile-picture" />
                    Hi, {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu">
                    <a href="{{route('dashboard-settings-account')}}" class="dropdown-item" >Setting</a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item">Logout</a>
                    
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                    </form>
                </li>
                <li class="nav-item">
                <a href="{{route('cart')}}" class="nav-link d-inline-block mt-2">
                    @php
                        $carts = \App\Cart::where('users_id', Auth::user()->id)->count();
                    @endphp
                    @if ($carts > 0)
                        <img src="/images/icon-cart-filled.svg" alt="" />
                        <div class="cart-badge">{{$carts}}</div>
                    @else
                        <img src="/images/icon-cart-empty.svg" alt="" />
                    @endif
                </a>
                </li>
            </ul>

            <ul class="navbar-nav d-block d-lg-none">
                <li class="nav-item">
                <a href="#" class="nav-link">
                    Hi, {{ Auth::user()->name }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                </form>
                </li>
                <li class="nav-item">
                    <a href="{{route('cart')}}" class="nav-link d-inline-block">
                        Cart
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link d-inline-block">
                        Logout
                    </a>
                </li>
            </ul>
                @endauth
            </div>
        </div>
    </nav>