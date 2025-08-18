<div>
    @if (!empty($data))
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <br>
                            @if (session()->has('exist'))
                                <div class="alert alert-danger">
                                    {{ session('exist') }}
                                </div>
                            @endif
                            <form id="productForm" wire:submit.prevent="saveProductDetails">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="color" class="form-label">اللون</label>
                                            <select id="color" name="color" class="form-select"
                                                wire:model="color">
                                                <option value="">Select Color</option>
                                                @foreach ($data['color'] as $color)
                                                    <option value="{{ $color->id }}">{{ $color->color }}</option>
                                                @endforeach
                                            </select>
                                            @error('color')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="size" class="form-label">الحجم</label>
                                            <select id="size" name="size" class="form-select" wire:model="size">
                                                <option value="">Select Size</option>
                                                @foreach ($data['size'] as $size)
                                                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('size')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="price" class="form-label">السعر</label>
                                            <div class="input-group">
                                                <input type="number" id="price" name="price" class="form-control"
                                                    placeholder="0.00" min="0" step="0.01" wire:model="price">
                                                <span class="input-group-text">ر.س</span>
                                            </div>
                                            @error('price')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="stock" class="form-label">المخزون</label>
                                            <input type="number" id="stock" name="stock" class="form-control"
                                                placeholder="الكمية المتوفرة" min="0" wire:model="stock">
                                        </div>
                                        @error('stock')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <input class="form-control" type="file" wire:model="image">
                                    </div>
                                    @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-check2 me-1"></i>
                                        حفظ المنتج
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
