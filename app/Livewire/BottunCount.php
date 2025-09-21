<?php

namespace App\Livewire;

use Livewire\Component;

class BottunCount extends Component
{
    protected $listeners = ['wishList' => 'render'];

    public function render()
    {
        return view('livewire.bottun-count');
    }
}
