<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name' , 'description' , 'store_id', 'category_id'];
    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function product_reviews(){
        return $this->hasMany(Product_Review::class);
    }

    public function product_details(){
        return $this->hasMany(Product_Detail::class);
    }

    public function colors(){
        return $this->hasMany(color::class);
    }

    public function sizes(){
        return $this->hasMany(size::class);
    }

}
