<?php

namespace App\View\Components\vendor;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidebar extends Component
{
    /**
     * Create a new component instance.
     */

    public $active;
    public function __construct($isactive = 'dashboard')
    {
        $this->active = $isactive;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.vendor.sidebar');
    }
}
