<?php

namespace App\Livewire\Vendor;

use App\Models\Order;
use App\Models\Order_Item;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderItems extends Component
{
    public $id;
    public $order;
    public $action;

    public function updateStatus()
    {
        $this->order[0]->order->update(['status' => $this->action]);
        $this->mount();
    }
    public function mount()
    {
        $this->order = Order_Item::with([
            'order',
            'order.user:id,name',
            'product_detail:id,product_id,price',
            'product_detail.images',
            'product_detail.product:id,name,store_id'
        ])
            ->whereHas('product_detail.product', function ($query) {
                $query->where('store_id', Auth::guard('vendor')->user()->store->id);
            })
            ->whereHas('order', function ($query) {
                $query->where('status', '!=', 'cancelled');
            })
            ->where('order_id', $this->id)
            ->get();
            $this->action = $this->order[0]->order->status;
            // dd($this->order);
    }
    public function render()
    {
        return view('livewire.vendor.order-items');
    }
}
