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

                <a href="index.html" class="logo">
                    <img src="{{ asset('assets/images/demos/demo-4/logo.png') }}" alt="Molla Logo" width="105"
                        height="25">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            <input type="search" class="form-control" name="q" id="q"
                                placeholder="Search product ..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">
                <div class="wishlist">
                    <a href="{{ route('whishlist') }}" title="Wishlist">
                        <div class="icon">
                            <i class="icon-heart-o"></i>
                            <span class="wishlist-count badge">{{ $wishListCount }}</span>
                        </div>
                        <p>Wishlist</p>
                    </a>
                </div><!-- End .compare-dropdown -->

                <div class="dropdown cart-dropdown">
                    <a href="{{ route('cart') }}" class="dropdown-toggle" aria-expanded="false" data-display="static">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">{{ $cartCount }}</span>
                        </div>
                        <p>Cart</p>
                    </a>
                </div><!-- End .cart-dropdown -->
            </div><!-- End .header-right -->
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
                            <a href="{{ route('dashboard') }}" class="sf-with-ul">Dashboard</a>
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
