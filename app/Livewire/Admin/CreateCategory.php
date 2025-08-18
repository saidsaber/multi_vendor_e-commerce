<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;
    protected $rules = [
        'name'  => 'required|string|max:255',
        'slug'  => 'required|string|max:255|unique:categories,slug',
        'image' => 'required|image'
    ];
    public function CreateCategory()
    {
        $this->validate();
        $path = $this->image->store('categories', 'public');
        Category::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'image' => $path
        ]);
        return to_route('admin.category');
    }
    public function render()
    {
        return view('livewire.admin.create-category');
    }
}
