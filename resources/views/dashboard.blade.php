@extends('layouts.header_tages')
@section('activDashboard', 'megamenu-container active')
@section('data')
    <x-header />
    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                @if (auth('web')->check())
                    <div class="row">
                        <aside class="col-md-4 col-lg-3">
                            <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}"
                                        id="tab-dashboard-link" href="{{ route('dashboard') }}" role="tab"
                                        aria-controls="tab-dashboard" aria-selected="false">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('orders*') ? 'active' : '' }}"
                                        href="{{ route('orders') }}">Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('adresses*') ? 'active' : '' }}"
                                        id="tab-address-link" href="{{ route('adresses') }}" role="tab"
                                        aria-controls="tab-address" aria-selected="false">Adresses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}">Sign Out</a>
                                </li>
                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="tab-dashboard" role="tabpanel"
                                    aria-labelledby="tab-dashboard-link active">
                                    @php
                                        $pages = [
                                            'dashboard' => 'dashboard.dashboard',
                                            'orders' => 'dashboard.orders',
                                            'adresses' => 'dashboard.adresses',
                                            'createAddrese' => 'dashboard.createAddrese',
                                            'order' => 'dashboard.order',
                                            'reviews' => 'dashboard.reviews',
                                            'refund_request' => 'dashboard.refund_request',
                                        ];
                                    @endphp
                                    @include($pages[$page])
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .col-lg-9 -->
                        </div><!-- End .row -->
                    @else
                        <div class="alert alert-danger" role="alert">
                            Please Log In
                        </div>
                @endif
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div>
@endsection
