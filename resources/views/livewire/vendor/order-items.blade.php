<div>
    {{-- @dd($order) --}}
    @if (session('update'))
        <div class="alert alert-success">
            {{ session('update') }}
        </div>
    @endif
    <nav class="my-4">
        <ul class="nav nav-pills justify-content-center gap-3 flex-wrap">
            <li class="nav-item">
                <a class="nav-link @if ($filter === 'all') active @endif" wire:click.prevent="filterBy('all')"
                    href="#">All</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if ($filter === 'unaccept') active @endif"
                    wire:click.prevent="filterBy('unaccept')" href="#">Unaccept</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if ($filter === 'panding') active @endif"
                    wire:click.prevent="filterBy('panding')" href="#">Panding</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if ($filter === 'paid') active @endif"
                    wire:click.prevent="filterBy('paid')" href="#">Paid</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if ($filter === 'shipping') active @endif"
                    wire:click.prevent="filterBy('shipping')" href="#">Shipping</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if ($filter === 'deliverd') active @endif"
                    wire:click.prevent="filterBy('deliverd')" href="#">Deliverd</a>
            </li>
        </ul>
    </nav>


    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle text-center mb-0">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Color</th>
                    <th scope="col">Size</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col" style="min-width: 180px;">Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalPrice = 0;
                @endphp
                @foreach ($order as $item)
                    @php
                        $totalPrice += $item->product_detail->price * $item->quantaty;
                    @endphp
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $item->product_detail->images[0]->path) }}"
                                alt="Product Image" class="img-thumbnail rounded"
                                style="width: 60px; height: 60px; object-fit: cover;">
                        </td>
                        <td class="fw-semibold">{{ $item->product_detail->product->name }}</td>
                        <td>
                            {{ $item->product_detail->color->color ?? 'N/A' }}
                        </td>
                        <td>
                            {{ $item->product_detail->size->name ?? 'N/A' }}
                        </td>
                        <td class="text-primary fw-bold">{{ number_format($item->product_detail->price, 2) }} EGP</td>
                        <td>{{ $item->quantaty }}</td>
                        <td class="text-success fw-bold">
                            {{ number_format($item->product_detail->price * $item->quantaty, 2) }} EGP</td>
                        <td>
                            <form class="d-flex gap-2" wire:submit.prevent="updateStatus({{ $item->id }})">
                                <select name="action" class="form-select w-auto"
                                    wire:change="status({{ $item->id }}, $event.target.value)">
                                    <option value="unaccept" {{ $item->status == 'unaccept' ? 'selected' : null }}>
                                        unaccept
                                    </option>
                                    <option value="panding" {{ $item->status == 'panding' ? 'selected' : null }}>
                                        panding
                                    </option>
                                    <option value="paid" {{ $item->status == 'paid' ? 'selected' : null }}>paid
                                    </option>
                                    <option value="shipping" {{ $item->status == 'shipping' ? 'selected' : null }}>
                                        shipping
                                    </option>
                                    <option value="deliverd" {{ $item->status == 'deliverd' ? 'selected' : null }}>
                                        deliverd
                                    </option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                <tr class="table-secondary">
                    <td colspan="8" class="text-end fw-bold fs-5">
                        Grand Total: <span class="text-success">{{ number_format($totalPrice, 2) }} EGP</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
