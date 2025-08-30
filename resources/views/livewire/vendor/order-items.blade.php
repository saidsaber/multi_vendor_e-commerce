<div>
    {{-- @dd($order) --}}
    <table class="table table-bordered table-striped text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($order->order_items as $item)
                <tr>
                    <td><img src="{{ asset('storage/' . $item->product_detail->images[0]->path) }}" class="img-thumbnail" alt="Product" style="width:50px"></td>
                    <td>{{ $item->product_detail->product->name }}</td>
                    <td>{{ $item->product_detail->price }} EGP</td>
                    <td>{{ $item->quantaty}}</td>
                    <td>{{ $item->product_detail->price * $item->quantaty}} EGP</td>
                </tr>
            @endforeach


            <tr>
                <td colspan="5">
                    <div class="d-flex justify-content-between align-items-center">
                        <form action="/action" method="POST" class="d-flex gap-2" wire:submit.prevent="updateStatus">
                            <select name="action" class="form-select w-auto" wire:model="action">
                                <option value="panding" >panding</option>
                                <option value="paid" >paid</option>
                                <option value="shipping">shipping</option>
                                <option value="deliverd">deliverd</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                        </form>

                        <h5 class="mb-0">Grand Total: <span class="text-success">{{ $order->total }} EGP</span>
                        </h5>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
