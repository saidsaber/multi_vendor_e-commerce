<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public $data = [];
    public function __invoke()
    {
        $this->data = [
            'categories' => Category::all(),
            'products' => Product::with('product_details', 'product_details.size', 'product_details.color', 'product_details.images', 'category' , 'colors')->whereHas('product_details')->get(),
        ];
        return view('index', ['data' => $this->data]);
    }
}
