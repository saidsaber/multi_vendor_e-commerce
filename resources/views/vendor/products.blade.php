@extends('layouts.admin.header_tags')

@section('body')
    <x-admin.header />
    <!-- ======= Header ======= -->

    <!-- ======= Sidebar ======= -->

    <x-vendor.sidebar isactive='product' />
    <main id="main" class="main">

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-16">
                    <div class="row">

                        <!-- Top Selling -->
                        <div class="col-12">
                            <div class="card top-selling overflow-auto">


                                <br>
                                <br>

                                <div class="card-body pb-0">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="card-title">Products</span></h5>
                                        <a href="{{ route('vendor.create.product') }}" class="btn btn-primary">
                                            <i class="bi bi-plus-lg"></i> Create Product
                                        </a>
                                    </div>

                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Sold</th>
                                                <th scope="col">Buttons</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($products))
                                                @foreach ($products as $product)
                                                    {{-- @dd(isset($product->product_details[0]->id)) --}}
                                                    <tr class="row-danger">
                                                        <td>
                                                            <a href="{{ route('vendor.product.details' , ['id' => $product->id]) }}" class="text-primary fw-bold">
                                                                {{ $product->name }}
                                                            </a>
                                                        </td>
                                                        <td class="fw-bold">{{ $product->sale }}</td>
                                                        <td>
                                                            @if (isset($product->product_details[0]->id))
                                                                <a href="{{ route('vendor.product.details' , ['id' => $product->id]) }}" class="btn btn-success">completion</a>
                                                            @else
                                                                <a href="{{ route('vendor.product.details' , ['id' => $product->id]) }}"
                                                                     class="btn btn-danger">Modify</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
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
