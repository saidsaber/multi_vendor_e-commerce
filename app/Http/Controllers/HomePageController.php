<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wish_List;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public $data = [];
    public function __invoke()
    {
        $this->data = [
            'categories' => Category::all(),
            'cart' => Cart::where('user_id' , Auth::id())->get(),
            'wishList' => Wish_List::where('user_id' , Auth::id())->get(),
            'products' => Product::with('reviews','wishList','product_details', 'product_details.size', 'product_details.color', 'product_details.images', 'category', 'colors')->whereHas('product_details')->get(),
        ];
        // dd($this->data);
        return view('index', ['data' => $this->data]);
    }
}
