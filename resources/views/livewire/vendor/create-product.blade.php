<div>
    @if ($step == 1)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create Post</h5>

                <div class="col-12">
                    <input type="text" class="form-control" name="name" placeholder="Product Name"
                        wire:model="productName">
                    @error('productName')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <select class="form-select" aria-label="Default select example" wire:model="category">
                            <option selected>Open this select menu</option>
                            {{-- @dd($categories) --}}
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-floating">
                    <textarea class="form-control" placeholder="Description" name="description" id="floatingTextarea" style="height: 100px;"
                        wire:model="description"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="floatingTextarea">Description</label>
                </div>
                <div class="text-center">
                    <button type="button" class="btn btn-primary" wire:click="product">Submit </button>

                </div>
            </div>
        </div>
    @elseif($step == 2)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create size</h5>
                {{ $productName }}
                <div class="col-12">
                    <label for="sizes" class="form-label">
                        Enter sizes (separate each size with a comma ",")
                    </label>
                    <input type="text" class="form-control" name="size" placeholder="Example: S, M, L, XL"
                        wire:model="size">
                    @error('size')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <br>
                <div class="text-center">
                    <button type="button" class="btn btn-primary" wire:click="sizeStep">Submit </button>

                </div>
            </div>
        </div>
    @elseif($step == 3)
    {{ $productName }}
    {{ $description }}
    {{ $category }}
    {{ $size }}
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create color (separate each color with a comma ",")</h5>
                {{ $productName }}
                <div class="col-12">
                    <div>
                        <input type="text" class="form-control" name="color" placeholder="Example: red,green,blue"
                            wire:model="color">
                        @error('color')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <br>
                    <div>
                        <input type="text" class="form-control" name="hex_color"
                            placeholder="Example: 00f , fff, f43" wire:model="hex_color">
                        @error('hex_color')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <br>
                <div class="text-center">
                    <button type="button" class="btn btn-primary" wire:click="save">Submit </button>

                </div>
            </div>
        </div>
    @endif
</div>
