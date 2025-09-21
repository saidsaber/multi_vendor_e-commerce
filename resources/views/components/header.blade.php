@props(['categories' ])
<header class="header header-intro-clearance header-4">
    <div class="header-top">
        <div class="container">
            @if (auth('web')->check())
                <div class="header-right">
                    <ul class="top-menu">
                        <li>
                            <ul>
                                <li>
                                    <a href="{{ route('logout') }}">logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                </div><!-- End .header-right -->
            @else
                <div class="header-right">
                    <ul class="top-menu">
                        <li>
                            <a href="#">Links</a>
                            <ul>
                                <li>
                                    <a href="{{ route('login') }}">Login</a>
                                    <span> | </span>
                                    <a href="{{ route('register') }}">Register</a>
                                </li>
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                </div><!-- End .header-right -->
            @endif

        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ route('home') }}" class="logo">
                    <img src="{{ asset('assets/images/logoo.png') }}" alt="Molla Logo" width="105"
                        height="25">
                </a>
            </div><!-- End .header-left -->

            @livewire('search')

            @livewire('bottun-count')
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            @if (!empty($categories))
                <div class="header-left">
                    <div class="dropdown category-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                            Browse Categories <i class="icon-angle-down"></i>
                        </a>

                        <div class="dropdown-menu">
                            <nav class="side-nav">
                                @foreach ($categories as $category)
                                    <ul class="menu-vertical sf-arrows">
                                        <li><a
                                                href="{{ route('category.products', $category->id) }}">{{ $category->name }}</a>
                                        </li>
                                    </ul><!-- End .menu-vertical -->
                                @endforeach
                            </nav><!-- End .side-nav -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .category-dropdown -->
                </div><!-- End .header-left -->
            @endif
            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="@yield('activHome')">
                            <a href="{{ route('home') }}" class="sf-with-ul">Home</a>
                        </li>
                        <li class="@yield('activDashboard')">
                            <a href="{{ route('orders') }}" class="sf-with-ul">Dashboard</a>
                        </li>
                        <li class="@yield('activCart')">
                            <a href="{{ route('cart') }}" class="sf-with-ul">Cart</a>
                        </li>
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->

        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
</header><!-- End .header -->
