<div>

    <hr>
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Size</th>
                <th scope="col">Color</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd($products) --}}
            @if (isset($products))
            {{-- @dd($products) --}}
                @foreach ($products as $product)
                    <tr class="row-danger">
                        <td><img src="{{ asset('storage/'.$product->images[0]->path) }}" alt=""></td>
                        <td>{{ $product->product->name }}</td>
                        <td>{{ $product->size->name }}</td>
                        <td>{{ $product->color->color }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->status }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
