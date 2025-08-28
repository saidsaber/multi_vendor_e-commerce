<?php

namespace App\Livewire;

use App\Models\Adress;
use Livewire\Component;
use App\Models\Cart as shop;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $carts;
    public $addresses;
    public $quantaty ;

    public function mount()
    {
        $this->carts = shop::with([
            'productDetail',
            'productDetail.size',
            'productDetail.color',
            'productDetail.images',
            'productDetail.product',
            'productDetail.product.colors',
            'productDetail.product.sizes',
            ])->where('user_id', Auth::id())->get();
        $this->addresses = Adress::where('user_id' ,Auth::id() )->get();
    }

    public function increment($cartId){
        foreach($this->carts as $cart){
            if($cart->id === $cartId){
                $cart->update(['quantaty' => ++$cart->quantaty]);
                $this->mount();
            }
        }
    }
    public function decrement($cartId){
        foreach($this->carts as $cart){
            if($cart->id === $cartId){
                $cart->update(['quantaty' => --$cart->quantaty]);
                $this->mount();
            }
        }
    }
    public function remove($cartId){
        foreach($this->carts as $cart){
            if($cart->id === $cartId){
                $cart->delete();
                $this->mount();
            }
        }
    }
    public function render()
    {
        return view('livewire.cart');
    }
}
