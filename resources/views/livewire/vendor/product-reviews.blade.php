<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <table class="table table-hover align-middle">
        @php
            $i = 1;
        @endphp
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Customer</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $d->product->name }}</td>
                    <td>{{ $d->user->name }}</td>
                    <td>

                        <i
                            class=" {{ $d->rating >= 1 ? 'fa-solid fa-star text-warning' : 'fa-regular fa-star text-muted' }}"></i>
                        <i
                            class=" {{ $d->rating >= 2 ? 'fa-solid fa-star text-warning' : 'fa-regular fa-star text-muted' }}"></i>
                        <i
                            class=" {{ $d->rating >= 3 ? 'fa-solid fa-star text-warning' : 'fa-regular fa-star text-muted' }}"></i>
                        <i
                            class=" {{ $d->rating >= 4 ? 'fa-solid fa-star text-warning' : 'fa-regular fa-star text-muted' }}"></i>
                        <i
                            class=" {{ $d->rating >= 5 ? 'fa-solid fa-star text-warning' : 'fa-regular fa-star text-muted' }}"></i>

                    </td>
                    <td>{{ $d->comment }}</td>
                    <td>{{ $d->created_at }}</td>
                    <td>
                        <button class="btn btn-sm btn-danger" wire:click="delete({{ $d->id }})">
                            <i class="fa-solid fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
