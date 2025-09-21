<?php

namespace App\Livewire\Vendor;

use Livewire\Component;
use App\Models\Refund_Request;
use Illuminate\Support\Facades\Auth;

class RefundRequest extends Component
{
    public $refunds;
    public $filter = 'pending';

    public function filterBy($data){
        $this->filter = $data;
        $this->mount();
    }

    public function updateStatus($id , $value){
        Refund_Request::find($id)->update(['status' => $value]);
        $this->mount();
    }
    public function mount()
    {
        $q = Refund_Request::with([
            'user',
            'orderItem',
            'product_detail',
            'product_detail.images',
            'product_detail.product'
        ])->wherehas('product_detail.product' , function($query){
            $query->where('store_id' , Auth::guard('vendor')->user()->store->id);
        });

        if($this->filter != 'all'){
            $q->where('status' , '=' , 'pending');  
        }
        $this->refunds = $q->get();
    }
    public function render()
    {
        return view('livewire.vendor.refund-request');
    }
}
