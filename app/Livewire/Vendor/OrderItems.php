<?php

namespace App\Livewire\Vendor;

use App\Models\Order;
use App\Models\Order_Item;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class OrderItems extends Component
{
    use AuthorizesRequests;

    public $id;
    public $order;
    public $action = [];
    public $filter = 'all';



    public function filterBy($filter)
    {
        $this->filter = $filter;
        $this->mount();
    }
    public function status($id, $status)
    {
        if (in_array($status, ['unaccept', 'panding', 'paid', 'shipping', 'deliverd'])) {
            $this->action[$id] = $status;
        }
        return;
    }

    public function updateStatus($id)
    {
        if (!isset($this->action[$id])) {
            return;
        }
        $orderItem = Order_Item::findOrFail($id);
        $orderItem->update(['status' => $this->action[$id]]);
        session()->flash('update', 'Update Status successfuly');
        $this->mount();
    }
    public function mount()
    {
        $q = Order_Item::with([
            'order',
            'vendorOrder',
            'order.user:id,name',
            'product_detail:id,product_id,price,color_id,size_id',
            'product_detail.images',
            'product_detail.color',
            'product_detail.size',
            'product_detail.product:id,name,store_id'
        ])
            ->whereHas('vendorOrder', function ($query) {
                $query->where('store_id', Auth::guard('vendor')->user()->store->id);
            })
            ->where('order_id', $this->id);

        if ($this->filter !== 'all') {
            $q->where('status', '=', $this->filter);
        }
        $this->order = $q->get();
        if ($this->order->first() != null) {
            $this->authorizeForUser(auth('vendor')->user(), 'view', $this->order->first()->vendorOrder);
        }
    }
    public function render()
    {
        return view('livewire.vendor.order-items');
    }
}
