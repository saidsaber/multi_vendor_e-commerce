<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Product_Detail;
use Illuminate\Support\Facades\Auth;

class OneProduct extends Component
{
    public $product;
    public $cart;
    public $id;
    public $product_detail_id;
    public $color;
    public $size;
    public $quantity = 1;
    public function addToCart()
    {
        $productDetail = Product_Detail::find($this->product_detail_id);
        if (!$productDetail) {
            session()->flash('error', 'This product does not exist');
            return;
        }

        $data = [
            'product_detail_id' => $this->product_detail_id,
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
        $this->dispatch('wishList');
        $this->mount();
    }

    public function delete()
    {
        Cart::where('user_id', Auth::id())->where('product_detail_id', $this->product_detail_id)->delete();
        $this->dispatch('wishList');
        $this->mount();
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
        $this->setDate();
    }


    public function setDate()
    {
        if (!empty($this->product)) {
            $this->color = $this->product->color_id;
            $this->size = $this->product->size_id;
            $this->product_detail_id = $this->product->id;
        } else {
            abort(404);
        }
    }
    public function mount()
    {
        $this->cart = Cart::where('user_id', Auth::id())->get();
        // $this->product

        $this->product = Product_Detail::with([
            'size',
            'color',
            'images',
            'product',
            'product.category',
            'product.reviews',
            'product.reviews.user',
            'product.colors',
            'product.sizes',
            'cartForUser'
        ])->whereHas('product', function ($query) {
            $query->where('id', $this->id);
        })->first();
        $this->setDate();
    }
    public function render()
    {
        return view('livewire.one-product');
    }
}
