<div class="container mt-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('returns.store', $order_Item->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <p>{{ $order_Item->product_detail->product->name }}</p>
        </div>

        <div class="mb-3">
            <label for="reason" class="form-label">Reason for return:</label>
            <textarea name="reason" id="reason" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Return Request</button>
    </form>
</div>
