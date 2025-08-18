<?php

namespace App\Livewire\Vendor;

use App\Models\Product_Detail;
use Livewire\Component;

class ProductDetails extends Component
{
    public $id;
    protected $listeners = ['productAdded' => 'ProductDetails'];
    public $products;
    public function mount($id)
    {
        $this->id = $id;
        $this->ProductDetails();
    }

    public function ProductDetails(){
        $this->products = Product_Detail::with( 'color', 'images', 'product', 'size')->where('product_id' , $this->id)->get();
    }
    public function render()
    {
        return view('livewire.vendor.product-details' );
    }
}
