<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_Detail;
use App\Models\Wish_List;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class WishListController extends Controller
{

    public function index(){
        $data = [
            'categories' => [],
            'cart' => Cart::where('user_id' , Auth::id())->get(),
            'wishList' => Wish_List::with('product' , 'product.product_details.product' ,'product.product_details.size', 'product.product_details.color', 'product.product_details.images')->where('user_id' , Auth::id())->get(),
            'products' => Product::with('product_details', 'product_details.size', 'product_details.color', 'product_details.images', 'category', 'colors')->whereHas('product_details')->get(),
        ];
        // $Wish_List = Wish_List::where('user_id' , Auth::id())->get();
        return view('wishlist' , ['data' => $data]);
    }
    public function addToWishList(Product $product){
        Wish_List::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id
        ]);
        return redirect()->back();
    }

    public function deleteWishlist(Wish_List $wish_List){
        $wish_List->delete();
        return redirect()->back();
    }
}
