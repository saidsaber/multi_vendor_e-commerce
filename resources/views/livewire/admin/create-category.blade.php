<div class="card">
    <div class="card-body">
        <h5 class="card-title">Create Category</h5>

        <!-- General Form Elements -->
        <form action="{{ route('admin.post.create.category') }}" method="post" wire:submit.prevent="CreateCategory">
            @csrf
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Category
                    Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" wire:model="name" value="{{ old('name') }}">
                </div>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Category
                    Slug</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="slug" wire:model="slug" value="{{ old('slug') }}">
                </div>
                @error('slug')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>
            <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Category
                    Logo</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" wire:model="image" name="image">
                </div>
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit
                        Form</button>
                </div>
            </div>
        </form>

    </div>
</div>
