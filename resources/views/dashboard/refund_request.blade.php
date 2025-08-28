{{-- @dd($order) --}}
<div class="container mt-5">
    <h2>Return Product for Order #{{ $order->id }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('returns.store', $order->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="product_id" class="form-label">Select Product:</label>
            <select name="product_id" id="product_id" class="form-select" required>
                @foreach ($order->order_items as $product)
                    <option value="{{ $product->product_detail->id }}">{{ $product->product_detail->product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="reason" class="form-label">Reason for return:</label>
            <textarea name="reason" id="reason" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Return Request</button>
    </form>
</div>
