<?php

namespace App\Livewire\Vendor;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderItems extends Component
{
    public $id;
    public $order;
    public $action;

    public function updateStatus(){
        $this->order->update(['status' => $this->action]);
        $this->mount();
    }
    public function mount()
    {
        $this->order = Order::with([
            'user:id,name',
            'order_items.product_detail',
            'order_items.product_detail.images',
            'order_items.product_detail.product:id,name'
        ])->whereHas('order_items.product_detail.product', function ($query) {
            $query->where('store_id', Auth::guard('vendor')->user()->store->id);
        })->where('id', $this->id)->where('status' , '!=' , 'cancelled')->first();
        $this->action = $this->order->status;
    }
    public function render()
    {
        return view('livewire.vendor.order-items');
    }
}
