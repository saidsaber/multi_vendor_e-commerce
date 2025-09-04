<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Search extends Component
{

    public string $query = '';
    public $results = [];

    public function updatedQuery($value)
    {
        $this->results = strlen($value) > 1
            ? Product::where('name', 'like', "%{$value}%")->limit(5)->get()
            : [];

    }
    public function render()
    {
        return view('livewire.search');
    }
}
