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
    {{-- @dd($orders) --}}
    @foreach ($orders->order_items as $order)
        <tbody>
            <!--[if BLOCK]><![endif]-->
            <tr>
                <td class="product-col">
                    <div class="product">
                        <figure class="product-media">
                            <a href="#">
                                <img src="{{ asset('storage/' . $order->product_detail->images[0]->path) }}"
                                    alt="Product image">
                            </a>
                        </figure>

                        <h3 class="product-title">
                            <a
                                href="{{ route('product', $order->product_detail->id) }}">{{ $order->product_detail->product->name }}</a>
                        </h3><!-- End .product-title -->
                    </div><!-- End .product -->
                </td>
                <td class="price-col">{{ $order->product_detail->price }} EGP</td>
                <td class="quantity-col">
                    <p style="text-align: center">{{ $order->quantaty }}</p>
                </td>

                <td class="total-col">{{ $order->quantaty * $order->price }} EGP</td>

                @if ($orders->status === 'deliverd')
                    <td>
                        <a href="{{ route('reviews.index' ,$order->product_detail->product_id )}}" class="btn btn-secondary">Review</a>
                    </td>
                @endif
            </tr>
        </tbody>
    @endforeach
</table>
@if ($orders->status === 'panding' || $orders->status === 'paid')
    <div>
        <form action="{{ route('order.cancell', $orders->id) }}" method="POST"
            style="display: grid; align-items: center; justify-content: center;">
            @csrf
            <input type="submit" value="Cancel"
                style="
    background: red;
    outline: none;
    border: none;
    padding: 8px;
    width: 50vw;
    border-radius: 8px;
">
        </form>
    </div>
@endif
@if ($orders->status === 'deliverd')
    <div>
        <a href="{{ route('returns.create' , $orders->id) }}" class="btn btn-primary">Refund</a>
    </div>
@endif
