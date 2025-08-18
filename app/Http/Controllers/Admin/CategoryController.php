<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->back();
    }

    public function update(Category $category)
    {
        // dd($category);
        return view('admin.updateCategory', ['category' => $category]);
    }

    public function edit(Request $request, Category $category)
    {
        $validate = $request->validate([
            'name' => 'max:50|unique:categories,name,' . $category->id,
            'slug' => 'max:50|unique:categories,slug,' . $category->id . '|regex:/^\S+$/u',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);

        if ($request->hasFile('image')) {
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            $validate['image'] = $request->file('image')->store('images/categories', 'public');
        }

        $category->update($validate);

        return back();
    }

    public function create(Request $request)
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
        return redirect()->back();
    }
}
