<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Refund_Request;
use Illuminate\Support\Facades\Auth;

class RefundRequest extends Component
{
    public $refunds;

    public function updateStatus($id, $value)
    {
        Refund_Request::find($id)->update(['status' => $value]);
        $this->mount();
    }
    public function mount()
    {
        $this->refunds = Refund_Request::with([
            'user',
            'order',
            'product_detail',
            'product_detail.images',
            'product_detail.product'
        ])->wherehas('product_detail.product', function ($query) {
            $query->where('store_id', Auth::guard('vendor')->user()->store->id);
        })->where('status', '=', 'rejected')->get();
    }
    public function render()
    {
        return view('livewire.admin.refund-request');
    }
}
