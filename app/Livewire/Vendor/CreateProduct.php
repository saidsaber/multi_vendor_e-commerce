<?php

namespace App\Livewire\Vendor;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateProduct extends Component
{

    public $productName;
    public $description;
    public $category;
    public $size;
    public $color;
    public $hex_color;


    protected $rules = [
        'productName' => 'required|string|max:255',
        'description' => 'required|string|max:500',
        'category' => 'required|exists:categories,id',
        'size'        => 'required|string',
        'color'       => 'required|string',
    ];
    public $step = 1;


    public function product()
    {
        $this->validate([
            'productName' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'category' => 'required|exists:categories,id'
        ]);
        $this->step++;
    }

    public function sizeStep()
    {
        $this->validate([
            'size'        => 'required|string',
        ]);
        $this->step++;
    }
    public function save()
    {
        $this->validate([
            'color'       => 'required|string',
        ]);
        // _____________________Create Product____________________________
        $product = Product::create([
            'name' => $this->productName,
            'description' => $this->description,
            'category_id' => $this->category,
            'store_id' => Auth::guard('vendor')->user()->stores[0]['id']
        ]);
        // _____________________Create Sizes____________________________
        $sizeArray = explode(',', $this->size);
        foreach ($sizeArray as $size) {
            Size::create(['name' => $size, 'product_id' => $product->id]);
        }
        // _____________________Create Colors____________________________
        $colors = explode(',', $this->color);
        $hex_colors = explode(',', $this->hex_color);
        $data = [];
        for ($i = 0; $i < count($colors); $i++) {
            $data[$i] = ['color' => $colors[$i], 'hex_code' => $hex_colors[$i], 'product_id' => $product->id];
        }
        foreach ($data as $d) {
            Color::create($d);
        }
        $this->step = 1;
    }
    public function render()
    {
        if ($this->step == 1) {
            $categories = Category::all();
            return view('livewire.vendor.create-product', ['categories' => $categories]);
        }
        return view('livewire.vendor.create-product');
    }
}
