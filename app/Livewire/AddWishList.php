<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wish_List;
use Illuminate\Support\Facades\Auth;

class AddWishList extends Component
{
    public $product;


    public function add($id)
    {
        Wish_List::create([
            'user_id' => Auth::id(),
            'product_id' => $id
        ]);
        $this->dispatch('wishList');
        $this->render();
    }

    public function remove($id){
        $wishList = Wish_List::find($id);
        if(isset($wishList)){
            $wishList->delete();
        }
        $this->dispatch('wishList');
        $this->render();
    }
    public function render()
    {
        return view('livewire.add-wish-list');
    }
}
