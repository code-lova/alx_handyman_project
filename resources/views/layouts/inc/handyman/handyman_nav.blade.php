<!-- Header -->
<header class="header header-menu-fullw">

    <!-- Header Top Bar -->
    <div class="header-top">
        <div class="container">
            <div class="header-top-left">
                <button class="btn btn-sm btn-default menu-link menu-link__secondary">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="menu-container">
                    <ul class="header-top-nav header-top-nav__secondary">
                        <li><a href="#"><i class="fa fa-twitter"></i> <span class="nav-label">Twitter</span></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i> <span class="nav-label">Facebook</span></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i> <span class="nav-label">Google+</span></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i> <span class="nav-label">Pinterest</span></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i> <span class="nav-label">Instagram</span></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i> <span class="nav-label">RSS Feed</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="header-top-right">
                <button class="btn btn-sm btn-default menu-link menu-link__tertiary">
                    <i class="fa fa-user"></i>
                </button>
                @if (Auth::check())
                    <div class="menu-container">
                        <ul class="header-top-nav header-top-nav__tertiary">
                            <li style="font-size:15px;"><i class="fa fa-user-plus" style="color: greenyellow;"></i> {{ $handyman->name }}</li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-in"></i><b>{{ __('Logout') }}</b>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="menu-container">
                        <ul class="header-top-nav header-top-nav__tertiary">
                            <li><a href="{{ route('register') }}"><i class="fa fa-user-plus"></i> {{ __('Register') }}</a></li>
                            <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> {{ __('Login') }}</a></li>
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </div>
    <!-- Header Top Bar / End -->

    <div class="header-main">
        <div class="container">
            <!-- Logo -->
            <div class="logo">
                <a href="{{ url('handyman-app/dashboard') }}"><img src="{{ asset('asset/images/logo.png') }}" alt="Handyman"></a>
                <!-- <h1><a href="index.html"><span>Handy</span>Man</a></h1> -->
            </div>
            <!-- Logo / End -->

            <button type="button" class="navbar-toggle">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Navigation -->
            <nav class="nav-main">
                <div class="nav-main-inner">
                    <ul data-breakpoint="992" class="flexnav">
                        <li class="active"><a href="{{ url('handyman-app/dashboard') }}">Dashboard</a></li>
                        <li><a href="{{ url('handyman-app/post-job') }}">Post a Job</a></li>
                        <li><a href="{{ url('handyman-app/profile') }}">Profile</a></li>
                        <li><a href="{{ url('handyman-app/message') }}">Message</a></li>
                        <li><a href="{{ url('handyman-app/notification') }}">Notification</a></li>
                        <li><a href="{{ url('handyman-app/settings') }}">Settings</a></li>

                        {{-- <li><a href="#">Features</a>
                            <ul>
                                <li><a href="features-shortcodes.html">Shortcodes</a></li>
                                <li><a href="features-pricing-tables.html">Pricing Tables</a></li>
                                <li><a href="features-typography.html">Typography</a></li>
                                <li><a href="features-columns.html">Columns</a></li>
                                <li><a href="features-icons.html">Icons</a></li>
                            </ul>
                        </li> --}}
                       
                    </ul>
                </div>
            </nav>
            <!-- Navigation / End -->

        </div>
    </div>

</header>
<!-- Header / End -->
