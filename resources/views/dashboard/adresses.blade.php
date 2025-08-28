<div class="card shadow-sm rounded-3">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">📍 My Addresses</h5>
        <a href="{{ route('adresses.create') }}" class="btn btn-sm btn-primary">
            + Add Address
        </a>
    </div>

    <div class="card-body">
        @forelse($adresses as $address)
            <div class="border rounded p-3 mb-2">
                <h6 class="fw-bold">{{ $address->title }}</h6>
                <p class="mb-1 text-muted">{{ $address->street }},
                    {{ $address->city }}</p>
                <p class="mb-1"><strong>Phone:</strong> {{ $address->phone }}</p>

                <div>
                    <form action="{{ route('adresses.delete', $address->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-muted">No addresses found. Add one to get started.</p>
        @endforelse
    </div>
</div>
