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
                @foreach ($products->product_details as $product)
                    {{-- @dd($product->images->first()->path) --}}
                    <tr class="row-danger">
                        
                        <td><img src="{{ asset('storage/' . $product->images->first()->path) }}" alt=""></td>
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
                            <div style="display: inline-block">
                                <input type="file" id="upload" wire:model="image" hidden>

                                <button type="button" class="btn btn-primary"
                                    onclick="document.getElementById('upload').click()">
                                    اختر صورة
                                </button>

                                <button type="button" class="btn btn-success"
                                    wire:click="uploadImage({{ $product->id }})">
                                    رفع الصورة
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
