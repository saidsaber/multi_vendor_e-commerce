<div class="card shadow-sm rounded-3">
    <div class="card-header">
        <h5 class="mb-0 fw-bold">
            {{ isset($address) ? 'Edit Address' : 'Add New Address' }}
        </h5>
    </div>

    <div class="card-body">
        <form action="{{ route('adresses.post.create') }}" method="POST" novalidate>
            @csrf
            {{-- City --}}
            <div class="mb-3">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control @error('city') is-invalid @enderror"
                    value="{{ old('city', $address->city ?? '') }}" required>
                @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Street --}}
            <div class="mb-3">
                <label class="form-label">Street</label>
                <input type="text" name="street" class="form-control @error('street') is-invalid @enderror"
                    value="{{ old('street', $address->street ?? '') }}" required>
                @error('street')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Address (extra details) --}}
            <div class="mb-3">
                <label class="form-label">Address Details</label>
                <textarea name="adress" rows="2" class="form-control @error('adress') is-invalid @enderror" required>{{ old('adress', $address->adress ?? '') }}</textarea>
                @error('adress')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Phone --}}
            <div class="mb-3">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone', $address->phone ?? '') }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn btn-primary">
                {{ isset($address) ? 'Update Address' : 'Save Address' }}
            </button>
        </form>
    </div>
</div>
