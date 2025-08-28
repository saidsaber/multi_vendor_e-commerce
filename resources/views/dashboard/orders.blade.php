@foreach ($orders as $order)
    <div class=" alert-secondary shadow-sm rounded-3 p-3" role="alert">
        <div class="d-flex justify-content-between align-items-center">

            <div class="me-4">
                <span class="fw-semibold text-muted">Total Price:</span>
                <span class="fw-bold text-success">{{ number_format($order->total, 2) }}
                    EGP</span>
            </div>

            <div class="me-4">
                <span class="fw-semibold text-muted">PayMent Status:</span>
                <span class="fw-bold  text-secondary ">
                    {{ ucfirst($order->payment_status) }}
                </span>
            </div>
            <div class="me-4">
                <span class="fw-semibold text-muted">Status:</span>
                <span class="fw-bold  text-secondary ">
                    {{ ucfirst($order->status) }}
                </span>
            </div>

            <div>
                <a href="{{ route('order', $order->id) }}" class="btn btn-link p-0">
                    Order Details
                </a>
                {{-- <span class="fw-semibold text-muted">Order Details</span> --}}
            </div>

        </div>
    </div>
    <br>
@endforeach
