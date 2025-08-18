<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Trait\ApiResponse;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CreateCategory(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:50|unique:categories,name',
            'slug' => 'required|max:50|unique:categories,name|regex:/^\S+$/u',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/categories', 'public'); // يخزن في storage/app/public/images
        }

        $validation['image'] = $path;

        Category::create($validation);
        return ApiResponse::success(['data' => 'category created successfully']);
    }

    public function GetCategories(){
        $categories = Category::all();
        return ApiResponse::success(['categories' => $categories]);
    }
}
