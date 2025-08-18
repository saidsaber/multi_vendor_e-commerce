    <style>
        .logout-link {
            background: none;
            border: none;
            color: #007bff;
            padding: 0;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ $active != 'dashboard' ? 'collapsed' : '' }}" href="{{ route('admin.main') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ $active != 'products' ? 'collapsed' : '' }}" href="{{ route('admin.products') }}">
                    <i class="bx bxl-product-hunt"></i>
                    <span>Products</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $active != 'category' ? 'collapsed' : '' }}" href={{ route('admin.category') }}>
                    <i class="bx bxs-category-alt"></i>
                    <span>Categories</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $active != 'refundRequest' ? 'collapsed' : '' }}" href="{{ route('admin.refund_request') }}">
                    <i class="bx bx-repeat"></i>
                    <span>Refund Requestes</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Stores Management</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin.stores') }}">
                            <i class="bi bi-circle"></i><span>Stores</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.joinRequest') }}">
                            <i class="bi bi-circle"></i><span>Join Requestes</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->


            <li class="nav-item">
                <form action="{{ route('admin.logout') }}" method="post" style="display:inline;">
                    @csrf
                    <button type="submit" class="nav-link collapsed logout-link" style="width: 100%;">
                        <i class="bx bx-log-out-circle"></i> LOGOUT
                    </button>
                </form>
            </li>


        </ul>

    </aside><!-- End Sidebar-->
