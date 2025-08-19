<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Product_Detail;
use Illuminate\Support\Facades\Auth;

class OneProduct extends Component
{
    public $product;
    public $id;
    public $color;
    public $size;
    public $quantity;
    public function addToCart()
    {
        $data = [
            'product_detail_id' => $this->id,
            'quantaty' =>  $this->quantity,
            'user_id' => Auth::id(),
        ];
        if ($this->quantity < 1 || $this->quantity == null) {
            session()->flash('error', 'please write a quantity');
            return;
        }
        if (!Auth::guard('web')->check()) {
            session()->flash('error', 'please login first');
            return;
        }
        Cart::create($data);
        session()->flash('success', 'added to cart successfully');
        return;
    }

    public function change()
    {
        if ($this->size != 0 && $this->color != 0) {
            $this->product = Product_Detail::with('size', 'color', 'images', 'product', 'product.colors', 'product.sizes')->where('color_id', $this->color)->where('size_id', $this->size)->first();
        } elseif ($this->color != 0) {
            $this->product = Product_Detail::with('size', 'color', 'images', 'product', 'product.colors', 'product.sizes')->where('color_id', $this->color)->first();
        } elseif ($this->size != 0) {
            $this->product = Product_Detail::with('size', 'color', 'images', 'product', 'product.colors', 'product.sizes')->where('size_id', $this->size)->first();
        }
        return to_route('product', [$this->product->id]);
    }
    public function mount()
    {
        $this->product = Product_Detail::with([
            'size',
            'color',
            'images',
            'product',
            'product.colors',
            'product.sizes',
            'cartForUser'
        ])->where('id', $this->id)->first();
        $this->color = $this->product->color_id;
        $this->size = $this->product->size_id;
        // dd($this->product);
    }
    public function render()
    {
        return view('livewire.one-product');
    }
}
