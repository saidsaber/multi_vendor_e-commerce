<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ReviewController extends Controller
{

    public function index(Product $product)
    {
        $reviews = $product->reviews()->with('user')->latest()->get();
        $page = 'reviews';
        return view('dashboard', compact('product','page', 'reviews'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $product->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Your review has been submitted');
    }
}
