@extends('layouts.admin.header_tags')

@section('body')
    <x-admin.header />
    <!-- ======= Header ======= -->

    <!-- ======= Sidebar ======= -->

    <x-vendor.sidebar isactive='dashboard' />
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-16">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-6    col-md-12">
                            <div class="card info-card sales-card">



                                <div class="card-body">
                                    <h5 class="card-title">Sales </h5>

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $data['totalSale'] }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <div class="col-lg-16">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card recent-sales overflow-auto">


                                        <div class="card-body">
                                            <h5 class="card-title">Orders</span></h5>
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Customer</th>
                                                        <th scope="col">button</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @dd($data['orders']) --}}
                                                    @if (isset($data['orders'][0]))
                                                    @php
                                                        $orders = $data['orders'];
                                                    @endphp
                                                        @foreach ($orders as $order)
                                                        {{-- @dd($orders) --}}
                                                            <tr>
                                                                <th scope="row"><a
                                                                        href="{{ route('vendor.order_item', $order->id) }}">#{{ $order->id }}</a>
                                                                </th>
                                                                <td>{{ $order->user->name }}</td>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('vendor.order_item', $order->id) }}"
                                                                        class="btn btn-success btn-sm">Order Items</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>

                                        </div>

                                    </div>
                                </div><!-- End Recent Sales -->



                            </div>
                        </div><!-- End Left side columns -->

                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body pb-0">
                                    <h5 class="card-title">Top Selling <span>| Today</span></h5>

                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Sold</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data['topProduct'] as $product)
                                                <tr>
                                                    <td><a href="{{ route('vendor.product.details', $product->id) }}"
                                                            class="text-primary fw-bold">{{ $product->name }}</a></td>
                                                    <td class="fw-bold">{{ $product->sale }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div><!-- End Top Selling -->

                    </div>
                </div><!-- End Left side columns -->


            </div>
        </section>

    </main><!-- End #main -->
@endsection
