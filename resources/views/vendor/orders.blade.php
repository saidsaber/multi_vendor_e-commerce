@extends('layouts.admin.header_tags')

@section('body')
    <x-admin.header />
    <x-vendor.sidebar isactive='order' />
    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
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
                                            @if (isset($orders[0]))
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <th scope="row"><a href="{{ route('vendor.order_item' , $order->id) }}">#{{ $order->id }}</a></th>
                                                        <td>{{ $order->user->name }}</td>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('vendor.order_item' , $order->id) }}" class="btn btn-success btn-sm">Order Items</a>
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


            </div>
        </section>

    </main><!-- End #main -->
@endsection
