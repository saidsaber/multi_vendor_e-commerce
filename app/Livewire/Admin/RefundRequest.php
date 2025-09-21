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
            'orderItem',
            'product_detail',
            'product_detail.images',
            'product_detail.product'
        ])->where('status', '=', 'rejected')->get();
    }
    public function render()
    {
        return view('livewire.admin.refund-request');
    }
}
