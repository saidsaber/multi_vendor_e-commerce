<div>

    <hr>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
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
                <th scope="col">Btns</th>
            </tr>
        </thead>
        <tbody>

            {{-- @dd($products) --}}
            @if (isset($products))
                {{-- @dd($products) --}}
                @foreach ($products as $product)
                    <tr class="row-danger">
                        <td><img src="{{ asset('storage/' . $product->images[0]->path) }}" alt=""></td>
                        <td>{{ $product->product->name }}</td>
                        <td>
                            {{ $product->size == null ? 'null' : $product->size->name }}
                        </td>
                        <td>
                            {{ $product->color == null ? 'null' : $product->color->color }}
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->status }}</td>
                        <td>
                            <button type="button" class="btn btn-danger"
                                wire:click="deleteProductDetail({{ $product->id }})">
                                Delete
                            </button>

                            {{-- <input type="hidden" wire:change="product_detail_id" value="{{ $product->id }}"> --}}
                            <div wire:init="$set('product_detail_id', {{ $product->id }})" style="display: inline-block">
                                <input type="file" id="upload" wire:model="image" hidden>
                                <button type="button" class="btn btn-primary"
                                    onclick="document.getElementById('upload').click()">
                                    Upload Image
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
