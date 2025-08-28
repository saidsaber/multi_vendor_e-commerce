@props(['products'])
<div class="container for-you">
    <hr>k
    {{-- <div class="heading heading-flex mb-3">
        <div class="heading-left">
            <h2 class="title">Recommendation For You</h2><!-- End .title -->
        </div><!-- End .heading-left -->

        <div class="heading-right">
            <a href="#" class="title-link">View All Recommendadion <i class="icon-long-arrow-right"></i></a>
        </div><!-- End .heading-right -->
    </div><!-- End .heading --> --}}

    <div class="products">
        <div class="row justify-content-center">
            @if (!empty($products))
                @foreach ($products as $product)
                    {{-- @dd($product)reviews --}}
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="product product-2">
                            <figure class="product-media">
                                {{-- <span class="product-label label-circle label-sale">Sale</span> --}}
                                <a href="{{ route('product', ['id' => $product->product_details[0]->id]) }}">
                                    <img src="{{ asset('storage/' . $product->product_details[0]->images[0]->path) }}"
                                        alt="Product image" class="product-image" style="width: 228px ; height: 228px;">
                                </a>
                                {{-- @dd($product) --}}
                                <div class="product-action-vertical">
                                    @if (isset($product->wishList))
                                        <form action="{{ route('delete.wishlist', $product->wishList->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0 border-0 bg-transparent"
                                                title="إزالة من المفضلة">
                                                <i class="fa-solid fa-heart" style="font-size:24px; color:#3399ff;"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('add.wishlist', $product->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0 border-0 bg-transparent"
                                                title="إضافة للمفضلة">
                                                <i class="fa-regular fa-heart"
                                                    style="font-size:24px; color:#3399ff;"></i>
                                            </button>
                                        </form>
                                    @endif
                                    {{-- <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a> --}}
                                </div><!-- End .product-action -->

                                <div class="product-action">
                                    {{-- <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add
                                            to cart</span></a> --}}
                                    <a href="{{ route('product', ['id' => $product->product_details[0]->id]) }}"
                                        class="btn-product btn" title="Quick view"><span>quick view</span></a>
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->

                            <div class="product-body">
                                <div class="product-cat">
                                    <a
                                        href="{{ route('category.products', $product->category->id) }}">{{ $product->category->name }}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a
                                        href="{{ route('product', ['id' => $product->product_details[0]->id]) }}">
                                        {{ $product->name }} </a></h3>
                                <!-- End .product-title -->
                                <div class="product-price">
                                    <span class="new-price">{{ $product->product_details[0]->price }} EGP</span>
                                    {{-- <span class="old-price">Was $349.99</span> --}}
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val"
                                            style="width: {{ isset($product->reviews[0]) ? $product->reviews[0]->rating * 20 : 0 }}%;">
                                        </div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( {{ count($product->reviews) }} Reviews )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-nav product-nav-dots">
                                    @foreach ($product->colors as $color)
                                        <a href="#" class="active"
                                            style="background: {{ $color->hex_code }};"><span
                                                class="sr-only">{{ $color->color }}</span></a>
                                    @endforeach
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                    </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                @endforeach
            @endif

        </div><!-- End .row -->
    </div><!-- End .products -->
</div><!-- End .container -->
