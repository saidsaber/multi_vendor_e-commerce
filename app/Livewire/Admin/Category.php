<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category as Cate;

class Category extends Component
{

    public function categoryDelete($id){
        Cate::where('id' , $id)->delete();
    }

    public function render()
    {
        $categories = Cate::all();
        return view('livewire.admin.category' , ['categories' => $categories]);
    }
}
