<div class="container mt-5">
    <h2>Reviews for {{ $product->name }}</h2>

    <!-- الرسائل -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- نموذج التقييم -->
    <form action="{{ route('reviews.store', $product->id) }}" method="POST" class="mb-4">
        @csrf
        <div class="mb-3">
            <label for="rating" class="form-label">Rating:</label>
            <select name="rating" id="rating" class="form-select" required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
        </div>

        <div class="mb-3">
            <label for="comment" class="form-label">Comment:</label>
            <textarea name="comment" id="comment" class="form-control" rows="3" placeholder="Write your review..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Review</button>
    </form>


    <h3>All Reviews:</h3>
    @forelse ($reviews as $review)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $review->user->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    Rating:
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating)
                            <span class="text-warning">&#9733;</span> {{-- نجمة ممتلئة --}}
                        @else
                            <span class="text-secondary">&#9734;</span> {{-- نجمة فارغة --}}
                        @endif
                    @endfor
                </h6>
                <p class="card-text">{{ $review->comment }}</p>
                <small class="text-muted">{{ $review->created_at->format('d M Y') }}</small>
            </div>
        </div>
    @empty
        <p>No reviews yet.</p>
    @endforelse
</div>
