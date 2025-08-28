<div>
    {{-- @dd($product) --}}
    <x-header />
    <div>
        <main class="main">
            <div class="page-content">
                @if (session()->has('error'))
                    <div class="alert alert-danger" style="text-align: center">
                        {{ session('error') }}
                    </div>
                    <br>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    <br>
                @endif
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom"
                                                src="{{ asset('storage/' . $product->images[0]->path) }}"
                                                data-zoom-image="{{ asset('storage/' . $product->images[0]->path) }}"
                                                alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->
                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            @foreach ($product->images as $image)
                                                <a class="product-gallery-item active" href="#"
                                                    data-image="{{ asset('storage/' . $image->path) }}"
                                                    data-zoom-image="{{ asset('storage/' . $image->path) }}">
                                                    <img src="{{ asset('storage/' . $image->path) }}"
                                                        alt="product side">
                                                </a>
                                            @endforeach
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">{{ $product->product->name }}</h1>
                                    <!-- End .product-title -->

                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val"
                                                style="width: {{ isset($product->product->reviews[0]) ? $product->product->reviews[0]->rating * 20 : 0 }}%;">
                                            </div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <a class="ratings-text" href="#product-review-link" id="review-link">(
                                            {{ count($product->product->reviews) }} Reviews
                                            )</a>
                                    </div><!-- End .rating-container -->

                                    <div class="product-price">
                                        {{ $product->price }} EGP
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p>{{ $product->product->description }}</p>
                                    </div><!-- End .product-content -->


                                    {{-- Colors --}}
                                    @if ($product->color)
                                        <div class="details-filter-row details-row-size">
                                            <label>Color:</label>
                                            <div class="product-nav product-nav-thumbs">
                                                @foreach ($product->product->colors as $color)
                                                    <label class="product-nav-item" style="cursor:pointer;">
                                                        <input type="radio" name="color_id"
                                                            value="{{ $color->id }}" class="d-none"
                                                            wire:model="color" wire:change="change()">
                                                        <span class="color-circle"
                                                            style="background:{{ $color->hex_code }};">
                                                        </span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif

                                    {{-- Sizes --}}
                                    @if ($product->size)
                                        <div class="details-filter-row details-row-size">
                                            <label>Size:</label>
                                            <div class="product-nav product-nav-thumbs">
                                                @foreach ($product->product->sizes as $size)
                                                    <label class="product-nav-item size-label">
                                                        <input type="radio" name="size_id"
                                                            value="{{ $size->id }}" class="d-none"
                                                            wire:model="size" wire:change="change()">
                                                        <span class="size-box">{{ $size->name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    @if (!isset($product->cartForUser))
                                        <form wire:submit.prevent="addToCart">
                                            {{-- Quantity --}}
                                            <div class="details-filter-row details-row-size">
                                                <label for="qty">Qty:</label>
                                                <div class="product-details-quantity">
                                                    <input type="number" id="qty" name="quantity"
                                                        class="form-control" value="0" min="1"
                                                        max="10" step="1" wire:model="quantity">
                                                </div>
                                            </div>

                                            {{-- Submit --}}
                                            <div class="product-details-action">
                                                <div class="btn-group">
                                                    <button type="submit"
                                                        class="btn-product btn-cart btn-outline-primary">
                                                        add to cart
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <form wire:submit.prevent="delete">
                                            <div class="product-details-action">
                                                <div class="btn-group">
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete From Cart
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif

                                    {{-- @dd($product) --}}

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            <a
                                                href="{{ route('category.products', $product->product->category->id) }}">{{ $product->product->category->name }}</a>
                                        </div><!-- End .product-cat -->

                                        <div class="social-icons social-icons-sm">
                                            <span class="social-label">Share:</span>
                                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                                    class="icon-facebook-f"></i></a>
                                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                                    class="icon-twitter"></i></a>
                                            <a href="#" class="social-icon" title="Instagram"
                                                target="_blank"><i class="icon-instagram"></i></a>
                                            <a href="#" class="social-icon" title="Pinterest"
                                                target="_blank"><i class="icon-pinterest"></i></a>
                                        </div>
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->


                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab"
                                    href="#product-desc-tab" role="tab" aria-controls="product-desc-tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab"
                                    href="#product-review-tab" role="tab" aria-controls="product-review-tab"
                                    aria-selected="false">Reviews ({{ count($product->product->reviews) }})</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel"
                                aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <p>
                                        {{ $product->product->description }}
                                    </p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel"
                                aria-labelledby="product-review-link">

                                @if (isset($product->product->reviews[0]))
                                    <div class="reviews">
                                        <h3>Reviews ({{ count($product->product->reviews) }})</h3>

                                        @foreach ($product->product->reviews as $review)
                                            <div class="review mb-4">
                                                <div class="row no-gutters">
                                                    <div class="col-auto pe-3">
                                                        {{-- اسم المستخدم --}}
                                                        <h4>
                                                            <a href="#">
                                                                {{ $review->user->name ?? 'Anonymous' }}
                                                            </a>
                                                        </h4>

                                                        {{-- التقييم بالنجوم --}}
                                                        <div class="ratings-container">
                                                            <div class="ratings">
                                                                <div class="ratings-val"
                                                                    style="width: {{ $review->rating * 20 }}%;"></div>
                                                            </div>
                                                        </div>

                                                        {{-- التاريخ --}}
                                                        <span class="review-date">
                                                            {{ $review->created_at->diffForHumans() }}
                                                        </span>
                                                    </div><!-- End .col -->

                                                    <div class="col">
                                                        {{-- عنوان الريفيو (لو عندك حقل title) --}}
                                                        @if (!empty($review->title))
                                                            <h4>{{ $review->title }}</h4>
                                                        @endif

                                                        {{-- محتوى الريفيو --}}
                                                        <div class="review-content">
                                                            <p>{{ $review->comment }}</p>
                                                        </div>
                                                    </div><!-- End .col -->
                                                </div><!-- End .row -->
                                            </div><!-- End .review -->
                                        @endforeach
                                    </div>
                                @endif

                                {{-- <div class="review">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <h4><a href="#">John Doe</a></h4>
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div>
                                                    <!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                            </div><!-- End .rating-container -->
                                            <span class="review-date">5 days ago</span>
                                        </div><!-- End .col -->
                                        <div class="col">
                                            <h4>Very good</h4>

                                            <div class="review-content">
                                                <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam laborum
                                                    blanditiis
                                                    laudantium iste amet. Cum non voluptate eos enim, ab cumque nam,
                                                    modi,
                                                    quas iure illum repellendus, blanditiis perspiciatis beatae!</p>
                                            </div><!-- End .review-content -->

                                            <div class="review-action">
                                                <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                                <a href="#"><i class="icon-thumbs-down"></i>Unhelpful
                                                    (0)</a>
                                            </div><!-- End .review-action -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .row -->
                                </div><!-- End .review --> --}}
                            </div><!-- End .reviews -->
                        </div><!-- .End .tab-pane -->
                    </div><!-- End .tab-content -->
                </div><!-- End .product-details-tab -->

                {{-- <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow owl-loaded owl-drag"
                    data-toggle="owl"
                    data-owl-options="{
                            &quot;nav&quot;: false, 
                            &quot;dots&quot;: true,
                            &quot;margin&quot;: 20,
                            &quot;loop&quot;: false,
                            &quot;responsive&quot;: {
                                &quot;0&quot;: {
                                    &quot;items&quot;:1
                                },
                                &quot;480&quot;: {
                                    &quot;items&quot;:2
                                },
                                &quot;768&quot;: {
                                    &quot;items&quot;:3
                                },
                                &quot;992&quot;: {
                                    &quot;items&quot;:4
                                },
                                &quot;1200&quot;: {
                                    &quot;items&quot;:4,
                                    &quot;nav&quot;: true,
                                    &quot;dots&quot;: false
                                }
                            }
                        }">
                    <!-- End .product -->

                    <!-- End .product -->

                    <!-- End .product -->

                    <!-- End .product -->

                    <!-- End .product -->
                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                            style="transform: translate3d(0px, 0px, 0px); transition: all; width: 1485px;">
                            <div class="owl-item active" style="width: 277px; margin-right: 20px;">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a href="product.html">
                                            <img src="{{ asset('assets/images/products/product-4.jpg') }}"
                                                alt="Product image" class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                                class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                    wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare"
                                                title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to
                                                    cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Women</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Brown paperbag waist
                                                <br>pencil
                                                skirt</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $60.00
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 20%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 2 Reviews )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-nav product-nav-thumbs">
                                            <a href="#" class="active">
                                                <img src="assets/images/products/product-4-thumb.jpg"
                                                    alt="product desc">
                                            </a>
                                            <a href="#">
                                                <img src="assets/images/products/product-4-2-thumb.jpg"
                                                    alt="product desc">
                                            </a>

                                            <a href="#">
                                                <img src="assets/images/products/product-4-3-thumb.jpg"
                                                    alt="product desc">
                                            </a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div>
                            </div>
                            <div class="owl-item active" style="width: 277px; margin-right: 20px;">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-out">Out of Stock</span>
                                        <a href="product.html">
                                            <img src="assets/images/products/product-6.jpg" alt="Product image"
                                                class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                                class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                    wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare"
                                                title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to
                                                    cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Jackets</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Khaki utility boiler
                                                jumpsuit</a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="out-price">$120.00</span>
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 6 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div>
                            </div>
                            <div class="owl-item active" style="width: 277px; margin-right: 20px;">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <span class="product-label label-top">Top</span>
                                        <a href="product.html">
                                            <img src="assets/images/products/product-11.jpg" alt="Product image"
                                                class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                                class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                    wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare"
                                                title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to
                                                    cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Shoes</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Light brown studded Wide
                                                fit
                                                wedges</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $110.00
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 1 Reviews )</span>
                                        </div><!-- End .rating-container -->

                                        <div class="product-nav product-nav-thumbs">
                                            <a href="#" class="active">
                                                <img src="assets/images/products/product-11-thumb.jpg"
                                                    alt="product desc">
                                            </a>
                                            <a href="#">
                                                <img src="assets/images/products/product-11-2-thumb.jpg"
                                                    alt="product desc">
                                            </a>

                                            <a href="#">
                                                <img src="assets/images/products/product-11-3-thumb.jpg"
                                                    alt="product desc">
                                            </a>
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div>
                            </div>
                            <div class="owl-item active" style="width: 277px; margin-right: 20px;">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/products/product-10.jpg" alt="Product image"
                                                class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                                class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                    wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare"
                                                title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to
                                                    cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Jumpers</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Yellow button front tea
                                                top</a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $56.00
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 0%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 0 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div>
                            </div>
                            <div class="owl-item" style="width: 277px; margin-right: 20px;">
                                <div class="product product-7 text-center">
                                    <figure class="product-media">
                                        <a href="product.html">
                                            <img src="assets/images/products/product-7.jpg" alt="Product image"
                                                class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#"
                                                class="btn-product-icon btn-wishlist btn-expandable"><span>add to
                                                    wishlist</span></a>
                                            <a href="popup/quickView.html" class="btn-product-icon btn-quickview"
                                                title="Quick view"><span>Quick view</span></a>
                                            <a href="#" class="btn-product-icon btn-compare"
                                                title="Compare"><span>Compare</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-cart"><span>add to
                                                    cart</span></a>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Jeans</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="product.html">Blue utility pinafore
                                                denim
                                                dress</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            $76.00
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 20%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 2 Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev disabled"><i
                                class="icon-angle-left"></i></button><button type="button" role="presentation"
                            class="owl-next"><i class="icon-angle-right"></i></button></div>
                    <div class="owl-dots disabled"><button role="button"
                            class="owl-dot active"><span></span></button><button role="button"
                            class="owl-dot"><span></span></button></div>
                </div><!-- End .owl-carousel --> --}}
            </div><!-- End .container -->
    </div><!-- End .page-content -->
    </main>
</div>

</div>
