<div>
    @if (isset($carts))
        {{-- @dd($carts) --}}
        <div class="row">
            <div class="col-lg-9">
                <table class="table table-cart table-mobile">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $totalPrice = 0;
                        @endphp
                        @foreach ($carts as $cart)
                            <tr>
                                <td class="product-col">
                                    <div class="product">
                                        <figure class="product-media">
                                            <a href="#">
                                                <img src="{{ asset('storage/' . $cart->productDetail->images[0]->path) }}"
                                                    alt="Product image">
                                            </a>
                                        </figure>

                                        <h3 class="product-title">
                                            <a
                                                href="{{ route('product', [$cart->product_detail_id]) }}">{{ $cart->productDetail->product->name }}</a>
                                        </h3><!-- End .product-title -->
                                    </div><!-- End .product -->
                                </td>
                                <td class="price-col">{{ $cart->productDetail->price }} EGP</td>
                                <td class="quantity-col">
                                    <div class="input-group input-spinner">
                                        <!-- زرار النقصان -->
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-decrement btn-spinner"
                                                style="min-width: 26px" wire:click="decrement({{ $cart->id }})">
                                                <i class="icon-minus"></i>
                                            </button>
                                        </div>

                                        <!-- الحقل -->
                                        <input type="text" class="form-control text-center"
                                            value="{{ $cart->quantaty }}" readonly>

                                        <!-- زرار الزيادة -->
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-increment btn-spinner"
                                                style="min-width: 26px" wire:click="increment({{ $cart->id }})">
                                                <i class="icon-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>

                                <td class="total-col">{{ $cart->productDetail->price * $cart->quantaty }} EGP</td>
                                <td class="remove-col"><button class="btn-remove" wire:click="remove({{ $cart->id }})"><i class="icon-close"></i></button>
                                </td>
                            </tr>
                            @php
                                $totalPrice += $cart->productDetail->price * $cart->quantaty;
                            @endphp
                        @endforeach
                    </tbody>
                </table><!-- End .table table-wishlist -->

                <div class="cart-bottom">
                    <div class="cart-discount">
                        <form action="#">
                            <div class="input-group">
                                <input type="text" class="form-control" required="" placeholder="coupon code">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary-2" type="submit"><i
                                            class="icon-long-arrow-right"></i></button>
                                </div><!-- .End .input-group-append -->
                            </div><!-- End .input-group -->
                        </form>
                    </div><!-- End .cart-discount -->
                </div><!-- End .cart-bottom -->
            </div><!-- End .col-lg-9 -->
            <aside class="col-lg-3">
                <div class="summary summary-cart">
                    <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                    <table class="table table-summary">
                        <tbody>
                            <tr class="summary-subtotal">
                                <td>Subtotal:</td>
                                <td>{{ $totalPrice }} EGP</td>
                            </tr><!-- End .summary-subtotal -->
                            <tr class="summary-shipping">
                                <td>Shipping:</td>
                                <td>&nbsp;</td>
                            </tr>

                            <tr class="summary-shipping-row">
                                <td>
                                    <div class="custom-control custom-radio">
                                        <label class="custom-control-label" for="free-shipping">Free
                                            Shipping</label>
                                    </div><!-- End .custom-control -->
                                </td>
                                <td>50 EGP</td>
                            </tr><!-- End .summary-shipping-row -->

                            <tr class="summary-shipping-estimate">
                                <td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a>
                                </td>
                                <td>&nbsp;</td>
                            </tr><!-- End .summary-shipping-estimate -->

                            <tr class="summary-total">
                                <td>Total:</td>
                                <td>{{ $totalPrice + 50}} EGP</td>
                            </tr><!-- End .summary-total -->
                        </tbody>
                    </table><!-- End .table table-summary -->

                    <a href="{{ route('checkout') }}" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO
                        CHECKOUT</a>
                </div><!-- End .summary -->

                <a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE
                        SHOPPING</span><i class="icon-refresh"></i></a>
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    @endif
</div>
