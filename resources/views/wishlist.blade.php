@extends('layouts.header_tages')
@section('data')
    <x-header :categories="$data['categories']" />
    <main>
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Wishlist<span>Shop</span></h1>
            </div><!-- End .container -->
        </div>
        <div class="mb-5"></div>
        <div class="page-content">
            <div class="container">
                <table class="table table-wishlist table-mobile">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Stock Status</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    {{-- @dd($data['wishList'][0]) --}}
                    <tbody>
                        @foreach ($data['wishList'] as $wishList)
                            @if ($wishList->product->product_details[0]->stock <= 0 || $wishList->product->product_details[0]->status === 'unavailable')
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="{{ asset('storage/' . $wishList->product->product_details[0]->images[0]->path) }}"
                                                        alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a
                                                    href="{{ route('product', $wishList->product->product_details[0]->product->id) }}">{{ $wishList->product->product_details[0]->product->name }}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{ $wishList->product->product_details[0]->price }} EGP</td>
                                    <td class="stock-col"><span class="out-of-stock">Out of stock</span></td>
                                    <td class="action-col">
                                        <button class="btn btn-block btn-outline-primary-2 disabled">Out of Stock</button>
                                    </td>
                                    <td class="remove-col">
                                        <form action="{{ route('delete.wishlist', $wishList->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn-remove">
                                                <i class="icon-close"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="{{ route('product', $wishList->product->product_details[0]->product->id) }}">
                                                    <img src="{{ asset('storage/' . $wishList->product->product_details[0]->images[0]->path) }}"
                                                        alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a
                                                    href="{{ route('product', $wishList->product->product_details[0]->product->id) }}">{{ $wishList->product->product_details[0]->product->name }}</a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col">{{ $wishList->product->product_details[0]->price }} EGP</td>
                                    <td class="stock-col"><span class="in-stock">In stock</span></td>

                                    <td class="remove-col">
                                        <form action="{{ route('delete.wishlist', $wishList->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn-remove">
                                                <i class="icon-close"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach


                    </tbody>
                </table><!-- End .table table-wishlist -->
                <div class="wishlist-share">
                    <div class="social-icons social-icons-sm mb-2">
                        <label class="social-label">Share on:</label>
                        <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                class="icon-facebook-f"></i></a>
                        <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                class="icon-instagram"></i></a>
                        <a href="#" class="social-icon" title="Youtube" target="_blank"><i
                                class="icon-youtube"></i></a>
                        <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                class="icon-pinterest"></i></a>
                    </div><!-- End .soial-icons -->
                </div><!-- End .wishlist-share -->
            </div><!-- End .container -->
        </div>
    </main>
@endsection
