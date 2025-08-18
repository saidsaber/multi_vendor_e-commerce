    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ $active != 'dashboard' ? 'collapsed' : '' }}" href="{{ route('vendor') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ $active != 'product' ? 'collapsed' : '' }}" href="{{ route('vendor.product') }}">
                    <i class="bx bxl-product-hunt"></i>
                    <span>Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $active != 'order' ? 'collapsed' : '' }}" href="{{ route('vendor.order') }}">
                    <i class="bx bxs-category-alt"></i>
                    <span>Orders</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                    <i class="bx bx-repeat"></i>
                    <span>Review Product</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href={{ route('vendor.logout') }}>
                    <i class="bx bx-log-out-circle"></i>
                    <span>LOGOUT</span>
                </a>
            </li>


        </ul>

    </aside><!-- End Sidebar-->
