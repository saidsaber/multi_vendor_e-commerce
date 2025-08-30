<?php

namespace App\Livewire\Vendor;

use Livewire\Component;
use App\Models\Refund_Request;
use Illuminate\Support\Facades\Auth;

class RefundRequest extends Component
{
    public $refunds;

    public function updateStatus($id , $value){
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
        ])->wherehas('product_detail.product' , function($query){
            $query->where('store_id' , Auth::guard('vendor')->user()->store->id);
        })->where('status' , '=' , 'pending')->get();
    }
    public function render()
    {
        return view('livewire.vendor.refund-request');
    }
}
