   <div>
       {{-- @dd($addresses) --}}
       <x-header />
       <main>
           <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
               <div class="container">
                   <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
               </div><!-- End .container -->
           </div>
           <div class="mb-5"></div>
           <div class="page-content">
               <div class="cart">
                   <div class="container">
                       @if (session('success'))
                           <div class="alert alert-success">
                               {{ session('success') }}
                           </div>
                       @endif
                       @if (session('error'))
                           <div class="alert alert-danger">
                               {{ session('error') }}
                           </div>
                       @endif
                       <div>
                           @if (isset($carts[0]))
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
                                                                   <button type="button"
                                                                       class="btn btn-decrement btn-spinner"
                                                                       style="min-width: 26px"
                                                                       wire:click="decrement({{ $cart->id }})">
                                                                       <i class="icon-minus"></i>
                                                                   </button>
                                                               </div>

                                                               <!-- الحقل -->
                                                               <input type="text" class="form-control text-center"
                                                                   value="{{ $cart->quantaty }}" readonly>

                                                               <!-- زرار الزيادة -->
                                                               <div class="input-group-append">
                                                                   <button type="button"
                                                                       class="btn btn-increment btn-spinner"
                                                                       style="min-width: 26px"
                                                                       wire:click="increment({{ $cart->id }})">
                                                                       <i class="icon-plus"></i>
                                                                   </button>
                                                               </div>
                                                           </div>
                                                       </td>

                                                       <td class="total-col">
                                                           {{ $cart->productDetail->price * $cart->quantaty }} EGP</td>
                                                       <td class="remove-col"><button class="btn-remove"
                                                               wire:click="remove({{ $cart->id }})"><i
                                                                   class="icon-close"></i></button>
                                                       </td>
                                                   </tr>
                                                   @php
                                                       $totalPrice += $cart->productDetail->price * $cart->quantaty;
                                                   @endphp
                                               @endforeach
                                           </tbody>
                                       </table><!-- End .table table-wishlist -->


                                   </div><!-- End .col-lg-9 -->
                                   <aside class="col-lg-3">
                                       <a href="{{ route('orders') }}"
                                           class="btn btn-outline-dark-2 btn-block mb-3"><span>MY ORDERS</span></a>
                                       @if (!empty($carts[0]))
                                           <div class="col-lg-13">
                                               <div class="card p-4 shadow-sm">
                                                   <h5 class="mb-3">Order Summary</h5>


                                                   <div class="d-flex justify-content-between mb-2">
                                                       <span>Subtotal:</span>
                                                       <strong>{{ $totalPrice }} EGP</strong>
                                                   </div>


                                                   <div class="d-flex justify-content-between mb-2">
                                                       <span>Shipping:</span>
                                                       <strong>50 EGP</strong>
                                                   </div>

                                                   <hr>


                                                   <div class="d-flex justify-content-between mb-3">
                                                       <span>Total:</span>
                                                       <strong class="text-success">{{ $totalPrice + 50 }} EGP</strong>
                                                   </div>


                                                   <form action="{{ route('order.create') }}" method="POST">
                                                       @csrf

                                                       <div class="mb-3">
                                                           <label for="address" class="form-label">Choose
                                                               Address</label>
                                                           <select name="address_id" id="address" class="form-select"
                                                               required="">

                                                               @if (!empty($addresses))
                                                                   @foreach ($addresses as $address)
                                                                       <option value="{{ $address->id }}">
                                                                           {{ $address->id . ' - ' . $address->city }}
                                                                       </option>
                                                                   @endforeach
                                                               @endif
                                                           </select>
                                                       </div>


                                                       <div class="mb-3">
                                                           <label class="form-label">Payment Method</label>
                                                           <div class="form-check">
                                                               <input class="form-check-input" type="radio"
                                                                   name="payment_method" value="cod" id="cod"
                                                                   checked="">
                                                               <label class="form-check-label" for="cod">Cash on
                                                                   Delivery</label>
                                                           </div>
                                                           <div class="form-check">
                                                               <input class="form-check-input" type="radio"
                                                                   name="payment_method" value="visa" id="visa">
                                                               <label class="form-check-label" for="visa">Visa /
                                                                   MasterCard</label>
                                                           </div>
                                                       </div>


                                                       <button type="submit" class="btn btn-primary w-100">
                                                           Place Order
                                                       </button>
                                                   </form>
                                               </div>
                                           </div>
                                       @endif
                                       {{-- <a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>MY ORDERS</span></a> --}}
                                   </aside><!-- End .col-lg-3 -->
                               </div><!-- End .row -->
                           @else
                               <div class="alert alert-warning text-center mt-3" role="alert">
                                   <i class="fas fa-shopping-cart"></i> لا يوجد منتجات في السلة
                               </div>
                           @endif
                       </div>
                   </div><!-- End .container -->
               </div><!-- End .cart -->
           </div>
       </main>
   </div>
