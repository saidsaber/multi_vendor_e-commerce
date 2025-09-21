<?php

namespace App\Livewire\Vendor;

use App\Models\Image;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product_Detail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductDetails extends Component
{
    use WithFileUploads;
    use AuthorizesRequests;
    public $id;
    protected $listeners = ['productAdded' => 'ProductDetails'];
    public $products;
    public $image;
    public $product_detail_id;
    public function uploadImage($id)
    {
        if (isset($this->image)) {
            $path = $this->image->store('images', 'public');
            Image::create([
                'product_detail_id' => $id,
                'path' => $path,
            ]);

            session()->flash('success', 'Image uploaded successfully: ' . $path);
        }else{
            session()->flash('error', 'please select file');
        }
        return;
    }

    public function deleteProductDetail($id)
    {
        // dd($id);
        $product = Product_Detail::with('images')->find($id);
        if ($product) {
            foreach ($product->images as $image) {
                if (Storage::disk('public')->exists($image->path)) {
                    Storage::disk('public')->delete($image->path);
                }
            }

            $product->images()->delete();

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
        $this->authorizeForUser(auth('vendor')->user(), 'view', $this->products);
    }

    public function ProductDetails()
    {
        $this->products = Product::with('product_details', 'product_details.color', 'product_details.images', 'product_details.size')->where('id', $this->id)->first();
    }

    public function render()
    {
        return view('livewire.vendor.product-details');
    }
}
