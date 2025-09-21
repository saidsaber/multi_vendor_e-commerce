<div>
    <nav class="my-4">
        <ul class="nav nav-pills justify-content-center gap-3 flex-wrap">
            <li class="nav-item">
                <a class="nav-link @if ($filter === 'pending') active @endif"
                    wire:click.prevent="filterBy('pending')" href="#">pending</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if ($filter === 'all') active @endif" wire:click.prevent="filterBy('all')"
                    href="#">all</a>
            </li>
        </ul>
    </nav>
    <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>الصورة</th>
                <th>اسم المستخدم</th>
                <th>اسم المنتج</th>
                <th>الكمية</th>
                <th>السبب</th>
                <th>الحالة</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($refunds[0]))
                @foreach ($refunds as $refund)
                    <tr>
                        <td><img src="{{ asset('storage/' . $refund->product_detail->images[0]->path) }}"
                                style="width:75px" class="img-thumbnail" alt="product"></td>
                        <td>{{ $refund->user->name }}</td>
                        <td>{{ $refund->product_detail->product->name }}</td>
                        <td>3</td>
                        <td>{{ $refund->reason }}</td>
                        <td>
                            @if ($filter == 'pending')
                                <select class="form-select"
                                    wire:change="updateStatus({{ $refund->id }}, $event.target.value)">
                                    <option value="pending" {{ $refund->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="approved"{{ $refund->status == 'approved' ? 'selected' : '' }}>
                                        Approved
                                    </option>
                                    <option value="rejected" {{ $refund->status == 'rejected' ? 'selected' : '' }}>
                                        Rejected
                                    </option>
                                </select>
                            @else
                                <p>{{ $refund->status }}</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
