<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $store = Store::where('user_id' , Auth::guard('vendor')->user()->id)->first();
        // dd(Auth::guard('vendor')->user()->id);
        $products = Product::with('product_details')->where('store_id' , $store->id)->get();
        return view('vendor.products' , ['products' => $products]);
    }
}
