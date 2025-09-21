<?php

namespace App\Livewire\Vendor;

use App\Models\Product_Review;
use Livewire\Component;
use App\Models\Wish_List;
use Illuminate\Support\Facades\Auth;

class ProductReviews extends Component
{
    public $data;

    public function mount()
    {

        $this->data = Product_Review::with('user', 'product')
            ->whereHas('product', function ($q) {
                $q->where('store_id', Auth::guard('vendor')->user()->store->id);
            })
            ->get();

        // dd($this->data);
    }
    public function render()
    {
        return view('livewire.vendor.product-reviews');
    }
}
