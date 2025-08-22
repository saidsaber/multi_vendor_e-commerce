<?php

namespace App\Livewire\Vendor;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product_Detail;
use Illuminate\Support\Facades\Storage;

class ProductDetails extends Component
{
    use WithFileUploads;
    public $id;
    protected $listeners = ['productAdded' => 'ProductDetails'];
    public $products;
    public $image ;
    public $product_detail_id ;
    public function updatedImage()
    {

        $path = $this->image->store('images', 'public');
        Image::create([
            'product_detail_id' => $this->product_detail_id,
            'path' => $path,
        ]);

        session()->flash('success', 'Image uploaded successfully: ' . $path);
    }

    public function deleteProductDetail($id)
    {
        $product = Product_Detail::with('images')->find($id);
        if ($product) {
            // حذف الصور من الملفات
            foreach ($product->images as $image) {
                if (Storage::disk('public')->exists($image->path)) {
                    Storage::disk('public')->delete($image->path);
                }
            }

            $product->images()->delete();
            // dd($product->images[0]);

            $product->delete();

            session()->flash('success', 'Product detail and images deleted successfully.');
        } else {
            session()->flash('error', 'Product detail not found.');
        }
        $this->mount($this->id);
    }
    public function mount($id)
    {
        $this->id = $id;
        $this->ProductDetails();
    }

    public function ProductDetails()
    {
        $this->products = Product_Detail::with('color', 'images', 'product', 'size')->where('product_id', $this->id)->get();
    }
    public function render()
    {
        return view('livewire.vendor.product-details');
    }
}
