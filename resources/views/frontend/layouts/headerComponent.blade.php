<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="menu-wrapper">
                            <!-- Main-menu -->
                            <div class="main-menu">
                                <nav class="d-none d-lg-block">
                                    <ul id="navigation">
                                        <li><a href="">Home</a></li>
                                        <li><a href="">Find a Jobs </a></li>
                                        <li><a href="">About</a></li>
                                        <li><a href="">Contact</a></li>
                                        @if (Auth::user())
                                            <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                                        @endif

                                    </ul>
                                </nav>
                            </div>
                            <!-- Header-btn -->
                            @if (Auth::user())
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf

                                    <div class="header-btn d-none f-right d-lg-block">

                                        <button type="submit" class="btn head-btn">Logout</button>

                                    </div>
                                </form>
                            @else
                                <div class="header-btn d-none f-right d-lg-block">
                                    <a href="{{ route('register') }}" class="btn head-btn1">Register</a>
                                    <a href="{{ route('login') }}" class="btn head-btn2">Login</a>
                                </div>
                            @endif


                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
