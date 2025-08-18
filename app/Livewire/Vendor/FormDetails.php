<?php

namespace App\Livewire\Vendor;

use App\Models\Size;
use App\Models\Color;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product_Detail;
use Illuminate\Support\Facades\DB;

class FormDetails extends Component
{
    use WithFileUploads;

    public $size;
    public $color;
    public $stock;
    public $price;
    public $image;
    public $id;
    public $data = [];



    public function saveProductDetails()
    {
        $this->validate([
            'color' => 'required|exists:colors,id',
            'size'  => 'required|exists:sizes,id',
            'price'    => 'required|numeric|min:0',
            'stock'    => 'required|integer|min:0',
            'image'    => 'required|image|max:10240', // 10MB
        ]);
        $productDetail = Product_Detail::where('color_id', $this->color)->where('size_id', $this->size)->where('product_id', $this->id)->first();
        if ($productDetail !== null) {
            session()->flash('exist', 'this product is exist');
            return;
        }
        $imagePath = $this->image->store('products', 'public');
        DB::transaction(function () use ($imagePath) {
            $productDetail = Product_Detail::create([
                'product_id' => $this->id,
                'color_id'   => $this->color,
                'size_id'    => $this->size,
                'price'      => $this->price,
                'stock'      => $this->stock
            ]);

            Image::create([
                'path'              => $imagePath,
                'product_detail_id' => $productDetail->id,
            ]);
        });
        $this->dispatch('productAdded');
    }
    public function mount($id)
    {
        $this->id = $id;
        $this->GetData();
    }

    public function GetData()
    {
        $this->data = [
            'color' => Color::where('product_id', $this->id)->get(),
            'size' => Size::where('product_id', $this->id)->get(),
        ];
    }
    public function render()
    {
        return view('livewire.vendor.form-details');
    }
}
