<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CreateProductController extends Controller
{
    public function createProduct(Request $request){
        $data = $request->validate(
            [
                'name' =>"required|max:255",
                'description' =>"required"
            ]
        );
        // dd(auth()->user()->stores->first()->id);
        $data['store_id'] = auth()->user()->stores->first()->id;
        $data['category_id'] = 1;
        $Product = Product::create($data);
        return redirect("vendor/create/color/$Product->id");
    }
}
