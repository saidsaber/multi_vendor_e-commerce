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
            <th>Status</th>
            <th>Quantity</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>
    {{-- @dd($orders) --}}
    <tbody>
        @foreach ($orders->order_items as $order)
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
                <td>{{ $order->status }}</td>
                <td class="quantity-col">
                    <p style="text-align: center">{{ $order->quantaty }}</p>
                </td>
                <td class="total-col">{{ $order->quantaty * $order->price }} EGP</td>
                @if ($order->status == 'panding')
                    <td>
                        <form action="{{ route('order.cancell', $order->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Cancell</button>
                        </form>
                    </td>
                @endif
                {{-- @dd($order->refund_requests->first()->status); --}}
                @if (isset($order->refund_requests[0]))
                    <td>
                        <p class="btn btn-secondary">refund request status : {{ $order->refund_requests[0]->status }}</p>
                    </td>
                @endif
                @if ($order->status === 'deliverd' && !isset($order->refund_requests[0]))
                    <td>
                        <a href="{{ route('reviews.index', $order->product_detail->product_id) }}"
                            class="btn btn-secondary">Review</a>
                        <br>
                        <a href="{{ route('returns.create', $order->id) }}" class="btn btn-secondary">refund</a>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@if ($orders->status === 'deliverd')
    <div>
        <a href="{{ route('returns.create', $orders->id) }}" class="btn btn-primary">Refund</a>
    </div>
@endif
