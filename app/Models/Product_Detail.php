<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Detail extends Model
{
    protected $table = 'product_details';
    protected $fillable = ['product_id', 'size_id', 'color_id', 'price', 'stock', 'status'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_detail_id');
    }
}
