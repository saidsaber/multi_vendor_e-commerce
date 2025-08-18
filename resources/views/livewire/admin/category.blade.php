<div>
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col">image</th>
                <th scope="col">category</th>
                <th scope="col">btns</th>
            </tr>
        </thead>
        <tbody>
            @if (isset($categories))
                @foreach ($categories as $category)
                    <tr>
                        <th scope="row"><img src="{{ asset('storage/' . $category->image) }}" alt=""
                                style="    width: 70px; height: 80px;"></th>
                        <th scope="row">{{ $category->name }}</th>
                        <th scope="row">
                            <li class="list-group-item d-flex justify-content-between align-items-center">

                                <div>
                                    <!-- زر التعديل -->
                                    <a href="{{ route('admin.update.category', ['category' => $category->id]) }}"
                                        class="btn btn-sm btn-primary">
                                        Update
                                    </a>
                                    <input type="button" value="Delete" class="btn btn-sm btn-danger"
                                        wire:click="categoryDelete({{ $category->id }})">
                                </div>
                            </li>
                        </th>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

</div>
